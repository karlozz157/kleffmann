<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DevTag\KleffmannBundle\SpreadSheet\CsvParser;
use DevTag\KleffmannBundle\Entity\State;

class LoadStateData implements FixtureInterface, ContainerAwareInterface
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
        $csvParser = new CsvParser(__DIR__ . '/csv/estados.csv');

        foreach ($csvParser->getData() as $row) {
            $state = new State();

            $state
                ->setName($row['n_estado'])
                ->setExternalId($row['id_estado'])
            ;

            $manager->persist($state);
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
