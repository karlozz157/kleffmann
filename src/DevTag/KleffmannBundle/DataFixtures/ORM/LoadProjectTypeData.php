<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\ProjectType;

class LoadProjectTypeData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $projectTypes = [
            [
                'name' => 'AD',
                'description' => 'AD-HOC'
            ],
            [
                'name' => 'AM',
                'description' => 'AMIS'
            ]
        ];

        foreach ($projectTypes as $projectTypeItem) {
            $projectType = new ProjectType();

            $projectType
                ->setName($projectTypeItem['name'])
                ->setDescription($projectTypeItem['description'])
            ;

            $manager->persist($projectType);
        }

        $manager->flush();
    }
}

