<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DevTag\KleffmannBundle\Repository\CityRepository;
use DevTag\KleffmannBundle\SpreadSheet\CsvParser;
use DevTag\KleffmannBundle\Entity\Interviewer;

class LoadInterviewerData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var CityRepository;
     */
    protected $cityRepository;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->cityRepository = $this->container->get('kleffmann.city.repository');
        $csvParser = new CsvParser(__DIR__ . '/csv/encuestadores.csv');
        $unsaved = 0;

        foreach ($csvParser->getData() as $data) {
            try {
                $interviewer = $this->mapperInterviewer($data);
                $this->loadDefaultValues($interviewer);
                $manager->persist($interviewer);
            } catch (\Exception $ex) {
                $unsaved++;
            }
        }

        echo sprintf("Interviewers unsaved %d \n", $unsaved);
        $manager->flush();
    }

    /**
     * @param Interviewer $interviewer
     */
    protected function loadDefaultValues(Interviewer $interviewer)
    {
        if ($this->isEmpty($interviewer->getEmail())) {
            $interviewer->setEmail('yolo@yolo.com');
        }

        if ($this->isEmpty($interviewer->getName())) {
            $interviewer->setName('yolo');
        }

        if ($this->isEmpty($interviewer->getHomePhone())) {
            $interviewer->setHomePhone('53921740');
        }

        if ($this->isEmpty($interviewer->getOfficePhone())) {
            $interviewer->setOfficePhone('53921740');
        }

        if ($this->isEmpty($interviewer->getCellPhone())) {
            $interviewer->setCellPhone('53921740');
        }

        if ($this->isEmpty($interviewer->getClabe())) {
            $interviewer->setClabe('5364789453921740');
        }

        if ($this->isEmpty($interviewer->getDebitCard())) {
            $interviewer->setDebitCard('5364789453921740');
        }
    }

    /**
     * @param $value
     *
     * @return bool
     */
    protected function isEmpty($value)
    {
        return empty($value);
    }

    /**
     * @param array $data
     *
     * @return Interviewer
     */
    protected function mapperInterviewer(array $data)
    {
        $city = $this->cityRepository->findOneByCityAndState($data['Municipio Origen'], $data['Estado']);
        $state = $city->getState();

        $interviewer = new Interviewer();

        $interviewer
            ->setState($state)
            ->setCity($city)
            ->setEmail($data['Correo electronico'])
            ->setName($data['Nombre'])
            ->setFirstName($data['Apellido Paterno'])
            ->setSecondName($data['Apellido Materno'])
            ->setBirthday(new \DateTime($data['Año Nacimiento']))
            ->setHomeAreaCode('55')
            ->setHomePhone($this->removeSpaces($data['Telefono Casa']))
            ->setOfficeAreaCode('55')
            ->setOfficePhone($this->removeSpaces($data['Oficina']))
            ->setCellAreaCode('55')
            ->setCellPhone($this->removeSpaces($data['Celular']))
            ->setClabe(null)
            ->setDebitCard($this->removeSpaces($data['Numero de Tarjeta']))
            ->setObservation($data['Observaciones']);

        return $interviewer;
    }

    /**
     * @param $text
     *
     * @return mixed
     */
    protected function removeSpaces($text)
    {
        return str_replace(' ', '', $text);
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 11;
    }
}
