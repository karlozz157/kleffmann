<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\UserRepository;
use DevTag\KleffmannBundle\Service\UserService;

trait UserAware
{
    /**
     * @var UserRepository $userRepository
     */
    protected $userRepository;

    /**
     * @var UserService $userService
     */
    protected $userService;

    /**
     * @param UserRepository $userRepository
     */
    public function setUserRepository(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository()
    {
        return $this->userRepository;
    }

    /**
     * @param UserService $userService
     */
    public function setUserService(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return UserService
     */
    public function getUserService()
    {
        return $this->userService;
    }
}
