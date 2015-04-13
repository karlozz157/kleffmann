<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\Customer;

class LoadCustomerData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $customers = [
            'AMSAC',
            'AMIFAC',
            'ARYSTA',
            'BASF',
            'BAYER',
            'BIMEDA',
            'BOEHRINGER',
            'CEVA',
            'CHINOIN',
            'CHEMTURA',
            'CHEMINOVA',
            'DOW',
            'DUPONT',
            'FMC',
            'IASA',
            'INFARVET',
            'MERIAL',
            'MSD',
            'MONSANTO',
            'NOVARTIS',
            'OURO FINO',
            'ZOETIS',
            'PISA',
            'SANFER',
            'SYNGENTA',
            'SYVA',
            'VALENT',
            'VETOQUINOL',
            'VIRBAC',
        ];

        foreach ($customers as $customerName) {
            $customer = new Customer();
            $customer->setName($customerName);

            $manager->persist($customer);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
