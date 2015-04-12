<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use DevTag\KleffmannBundle\Entity\ProjectTypeUprising;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\ProjectType;

class LoadProjectTypeUprisingData implements FixtureInterface
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
}
