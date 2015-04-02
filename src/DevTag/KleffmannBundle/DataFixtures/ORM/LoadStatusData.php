<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\Status;

class LoadStatusData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $statusList = [
            [
                'name' => 'REV',
                'description' => 'Revisión de cuestionario'
            ],

            [
                'name' => 'PIL',
                'description' => 'Piloto',
            ],

            [
                'name' => 'PRE',
                'description' => 'Pre Capacitación',
            ],

            [
                'name' => 'CAP',
                'description' => 'Capacitación',
            ],

            [
                'name' => 'MAT',
                'description' => 'Envío de material a campo',
            ],

            [
                'name' => 'FW1',
                'description' => 'Primera Entrevista',
            ],

            [
                'name' => 'FW ',
                'description' => 'Campo completo',
            ],

            [
                'name' => 'CCO',
                'description' => 'Calidad y codificación',
            ],

            [
                'name' => 'CAP',
                'description' => 'Captura',
            ],

            [
                'name' => 'PRO',
                'description' => 'Procesamiento',
            ],

            [
                'name' => 'ANA',
                'description' => 'Análisis',
            ],

            [
                'name' => 'PPT',
                'description' => 'Realización de presentación',
            ],

            [
                'name' => 'CLI',
                'description' => 'Entrega a cliente',
            ],
            [
                'name' => 'CER',
                'description' => 'Proyecto Cerrado',
            ],
        ];

        foreach ($statusList as $statusItem) {
            $status = new Status();

            $status
                ->setName($statusItem['name'])
                ->setDescription($statusItem['description'])
            ;

            $manager->persist($status);
        }

        $manager->flush();
    }
}
