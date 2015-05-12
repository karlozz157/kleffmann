<?php

namespace DevTag\KleffmannBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use DevTag\KleffmannBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $users = [
            [
                'email'    => 'admin@devtag.com',
                'username' => 'admin',
                'password' => 't3mporal',
            ],
            [
                'email'    => 'karlozz157@gmail.com',
                'username' => 'karlozz157',
                'password' => 't3mporal',
            ],
            [
                'email'    => 'rogelio.ramirez@devtag.com',
                'username' => 'rogelio.ramirez',
                'password' => 't3mporal',
            ],            
        ];


        foreach ($usersGroup as $userGroup) {
            $user = new User();
            $user->setEmail($userGroup['email']);
            $user->setUsername($userGroup['username']);
            $user->setPassword($userGroup['password']);
            $user->setEnabled(true);
            $user->setSuperAdmin(true);

            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 12;
    }
}
