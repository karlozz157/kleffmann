<?php

namespace DevTag\KleffmannBundle\Service;

use DevTag\KleffmannBundle\Repository\InvoiceRepository;
use DevTag\KleffmannBundle\Sms\SmsAdapterAware;
use DevTag\KleffmannBundle\Entity\Invoice;
use DevTag\KleffmannBundle\Entity\Message;

class InvoiceService extends AbstractService
{
    use SmsAdapterAware;

    /**
     * @var InvoiceRepository $invoiceRepository
     */
    protected $invoiceRepository;

    /**
     * @param $fileName
     *
     * @return string
     */
    public function generateFileNameVersion($fileName)
    {
        $fileNameInfo = $this->getFileNameInfo($fileName);
        $lastFileName = $this->invoiceRepository->getLastInvoiceByFileName($fileNameInfo['filename']);
        $lastFileName = !empty($lastFileName) ? $lastFileName[0] : [];
        $newFileName  = $fileNameInfo['filename'];
        $newVersion   = 1;

        if (!empty($lastFileName)) {
            $lastFileNameInfo = $this->getFileNameInfo($lastFileName['file']);
            $newVersion  = ((int) substr($lastFileNameInfo['filename'], -1));
            $newFileName = str_replace('_' . $newVersion, '', $lastFileNameInfo['filename']);
            $newVersion++;
        }

        $newFileName = sprintf('%s_%s', $newFileName, $newVersion);

        return sprintf('%s.%s', $newFileName, $fileNameInfo['extension']);
    }

    /**
     * @param Invoice $invoice
     */
    public function notifyInvoice(Invoice $invoice)
    {
        $file = $this->getFileNameInfo($invoice->getFile());
        $content = sprintf(
            'La factura %s generado/cambiado con el status %s.',
            $file['filename'],
            $invoice->getStatus()
        );

        $message = new Message();
        $message->setTo($invoice->getInterviewer()->getCellPhone());
        $message->setContent(strtoupper($content));

        try {
            $this->smsAdapter->send($message);
        } catch (\Exception $ex) {
            // log the exception
        }
    }

    /**
     * @param string $fileName
     *
     * @return array
     */
    protected function getFileNameInfo($fileName)
    {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileName  = str_replace('.' . $extension, '', $fileName);

        return ['filename' => $fileName, 'extension' => $extension];
    }

    /**
     * @param InvoiceRepository $invoiceRepository
     */
    public function setInvoiceRepository(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }
}
