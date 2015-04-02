<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DevTag\KleffmannBundle\SpreadSheet\CsvParser;
use DevTag\KleffmannBundle\Entity\District;

class LoadDistrictData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $csvParser = new CsvParser(__DIR__ . '/csv/distritos.csv');
        $stateRepository = $this->container->get('kleffmann.state.repository');

        foreach ($csvParser->getData() as $row) {
            $district = new District();

            $district
                ->setName($row['substate_name_D'])
                ->setExternalId($row['id_ddr'])
                ->setState($stateRepository->findOneBy(['externalId' => $row['fk_estado']]));
            ;

            $manager->persist($district);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
