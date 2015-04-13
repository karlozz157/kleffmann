<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DevTag\KleffmannBundle\SpreadSheet\CsvParser;
use DevTag\KleffmannBundle\Entity\State;
use DevTag\KleffmannBundle\Entity\City;

class LoadCityData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var array $state
     */
    protected $state;

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
        if (isset($this->state['external_id']) && $this->state['external_id'] == $externalId) {
            return $this->state['entity'];
        }

        $this->state['external_id'] = $externalId;
        $this->state['entity'] = $this->container->get('kleffmann.state.repository')->findOneBy(['externalId' => $externalId]);

        return $this->state['entity'];
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
        return 9;
    }
}
