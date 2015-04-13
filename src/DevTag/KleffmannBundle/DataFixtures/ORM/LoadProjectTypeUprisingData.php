<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\ProjectTypeUprising;
use DevTag\KleffmannBundle\Entity\ProjectType;

class LoadProjectTypeUprisingData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $projectTypeUprisings = [
            [
                'name' => 'F2F',
                'description' => 'CARA A CARA'
            ],
            [
                'name' => 'CATI',
                'description' => 'TELEFÓNICO'
            ],
            [
                'name' => 'IDI',
                'description' => 'ENTREVISTA A PROFUNDIDADA'
            ],
            [
                'name' => 'FG',
                'description' => 'SESIÓN DE GRUPO'
            ],
            [
                'name' => 'SHO',
                'description' => 'SHOPPER'
            ],
        ];

        foreach ($projectTypeUprisings as $projectTypeUprisingItem) {
            $projectTypeUprising = new ProjectTypeUprising();

            $projectTypeUprising
                ->setName($projectTypeUprisingItem['name'])
                ->setDescription($projectTypeUprisingItem['description'])
            ;

            $manager->persist($projectTypeUprising);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5;
    }
}
