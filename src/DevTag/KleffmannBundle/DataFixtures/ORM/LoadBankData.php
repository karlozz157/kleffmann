<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\Bank;

class LoadBankData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $banks = [
            'BANAMEX',
            'BANCO SANTANDER (MEXICO)',
            'HSBC MEXICO',
            'SCOTIABANK INVERLAT',
            'BBVA BANCOMER',
            'BANORTE',
            'BANCO INTERACCIONES',
            'BANCO INBURSA',
            'BANCA MIFEL',
            'BANCO REGIONAL DE MONTERREY',
            'BANCO INVEX',
            'BANCO DEL BAJIO',
            'BANSI',
            'BANCA AFIRME',
            'BANK OF AMERICA MEXICO',
            'BANCO J.P. MORGAN',
            'BANCO VE POR MAS',
            'AMERICAN EXPRESS BANK (MEXICO)',
            'INVESTA BANK',
            'CIBANCO',
            'BANK OF TOKYO-MITSUBISHI UFJ (MEXICO)',
            'BANCO MONEX',
            'DEUTSCHE BANK MEXICO',
            'BANCO AZTECA',
            'BANCO CREDIT SUISSE (MEXICO)',
            'BANCO AUTOFIN MEXICO',
            'BARCLAYS BANK MEXICO',
            'BANCO AHORRO FAMSA',
            'INTERCAM BANCO',
            'ABC CAPITAL',
            'BANCO ACTINVER',
            'BANCO COMPARTAMOS',
            'BANCO MULTIVA',
            'UBS BANK MEXICO',
            'BANCOPPEL',
            'CONSUBANCO',
            'BANCO WAL-MART DE MEXICO ADELANTE',
            'VOLKSWAGEN BANK',
            'BANCO BASE',
            'BANCO PAGATODO',
            'BANCO FORJADORES',
            'BANKAOOL',
            'BANCO INMOBILIARIO MEXICANO',
            'FUNDACION DONDE BANCO',
            'BANCO BANCREA',
            'BANJERCITO',
            'BANSEFI',
            'SOCIEDAD HIPOTECARIA FEDERAL',
        ];

        foreach ($banks as $bankName) {
            $bank = new Bank();
            $bank->setName($bankName);

            $manager->persist($bank);
        }

        $manager->flush();
    }
}
