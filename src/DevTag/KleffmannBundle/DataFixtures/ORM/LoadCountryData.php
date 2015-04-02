<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\Country;

class LoadCountryData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $country = new Country();
        $country->setName('México');
        $country->setExternalId(1);

        $manager->persist($country);
        $manager->flush();
    }
}
