<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DevTag\KleffmannBundle\SpreadSheet\CsvParser;
use DevTag\KleffmannBundle\Entity\State;
use DevTag\KleffmannBundle\Entity\City;

class LoadCityData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var array $state
     */
    protected static $state;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $csvParser = new CsvParser(__DIR__ . '/csv/ciudades.csv');

        foreach ($csvParser->getData() as $row) {
            $city = new City();

            $city
                ->setName($row['n_municipio'])
                ->setExternalId($row['id_municipio'])
                ->setState($this->getStateByExternalId($row['fk_estado']))
            ;

            $manager->persist($city);
        }

        $manager->flush();
    }

    /**
     * @param $externalId
     *
     * @return State
     */
    public function getStateByExternalId($externalId)
    {
        if (self::$state['external_id'] == $externalId) {
            return self::$state['entity'];
        }

        self::$state['external_id'] = $externalId;
        self::$state['entity'] = $this->container->get('kleffmann.state.repository')->findOneBy(['externalId' => $externalId]);

        return self::$state['entity'];
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
