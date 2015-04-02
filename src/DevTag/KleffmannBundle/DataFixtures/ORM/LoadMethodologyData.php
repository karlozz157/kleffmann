<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\Methodology;

class LoadMethodologyData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $methodologies = [
            [
                'name' => 'PS',
                'description' => 'PRICE SIMULATION',
            ],
            [
                'name' => 'SAT',
                'description' => 'SATISFACCION',
            ],
            [
                'name' => 'NPS',
                'description' => 'NET PROMOTER SCORE',
            ],
            [
                'name' => 'U&A',
                'description' => 'USOS Y HÁBITOS',
            ],
            [
                'name' => 'IMA',
                'description' => 'IMAGEN',
            ],
            [
                'name' => 'BPTO',
                'description' => 'BRAND PRICE TRADE OFF',
            ],
            [
                'name' => 'BPEM',
                'description' => 'BRAND PRICE ELASTICITY MODEL',
            ],
            [
                'name' => 'BEQ',
                'description' => 'BRAND EQUITY',
            ],
            [
                'name' => 'CPT',
                'description' => 'CONCEPT TEST',
            ],
            [
                'name' => 'PRT',
                'description' => 'PRODUCT TEST',
            ],
            [
                'name' => 'TMA',
                'description' => 'TAMAÑO MERCADO',
            ],
        ];

        foreach ($methodologies as $methodologyItem) {
            $methodology = new Methodology();

            $methodology
                ->setName($methodologyItem['name'])
                ->setDescription($methodologyItem['description'])
            ;

            $manager->persist($methodology);
        }

        $manager->flush();
    }
}
