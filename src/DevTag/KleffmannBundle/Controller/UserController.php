<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Service\Aware\UserAware;
use DevTag\KleffmannBundle\Form\UserType;
use DevTag\KleffmannBundle\Entity\User;

/**
 * @Route("/usuarios", service="kleffmann.user.controller")
 */
class UserController extends AbstractController
{
    use UserAware;

    /**
     * @var array $roles
     */
    protected $roles = ['ROLE_ADMIN'];

    /**
     * @Route("/", name="users")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $users = $this->userRepository->findAll($page);

        return ['users' => $users];
    }

    /**
     * @Route("/nuevo", name="users_new")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $user->setEnabled(true);
            $this->userService->save($user);
            $this->userService->flush();

            return $this->redirectToRoute('users');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}", name="users_edit")
     * @ParamConverter()
     * @Template()
     *
     * @param User $user
     * @param Request $request
     *
     * @return array
     */
    public function editAction(User $user, Request $request)
    {
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->userService->save($user);
            $this->userService->flush();

            return $this->redirectToRoute('users');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}", name="users_delete")
     * @ParamConverter()
     *
     * @param User $user
     *
     * @return array
     */
    public function deleteAction(User $user)
    {
        $this->userService->remove($user);
        $this->userService->flush();

        return $this->redirectToRoute('users');
    }
}
