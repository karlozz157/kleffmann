<?php

namespace DevTag\KleffmannBundle\Controller\Mapped;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use DevTag\KleffmannBundle\Service\AbstractService;

abstract class CrudController extends AbstractController
{
    /**
     * @var array $roles
     */
    protected $roles = ['ROLE_ADMIN'];

    /**
     * @var string $formName
     */
    protected $formName;

    /**
     * @var string $entityName
     */
    protected $entityName;

    /**
     * @var AbstractService $service
     */
    protected $service;

    /**
     * @var EntityRepository $repository
     */
    protected $repository;

    /**
     * @var string $module
     */
    protected $module;

    /**
     * @const string
     */
    const REDIRECT_ROUTE = 'devtag_kleffmann_%s_index';

    public function __construct()
    {
        $class  = explode('\\', get_class($this));
        $this->module = str_replace('Controller','',end( $class));
        $this->entityName = sprintf('DevTag\\KleffmannBundle\\Entity\\%s', $this->module);
        $this->formName   = sprintf('DevTag\\KleffmannBundle\\Form\\%sType', $this->module);
    }

    /**
     * @Route("/")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $data = $this->repository->findAll($page);

        return ['data' => $data];
    }

    /**
     * @Route("/nuevo")
     * @Template()
     *
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function newAction(Request $request)
    {
        $entity = new $this->entityName();
        $formClass = new $this->formName();
        $form = $this->createForm($formClass, $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->service->save($entity);
            $this->service->flush();

            return $this->redirectToRoute(
                sprintf(self::REDIRECT_ROUTE, strtolower($this->module))
            );
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}")
     * @Template()
     *
     * @param int $id
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function editAction($id, Request $request)
    {
        $entity = $this->repository->find($id);
        $formClass = new $this->formName();
        $form = $this->createForm($formClass, $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->service->save($entity);
            $this->service->flush();

            return $this->redirectToRoute(
                sprintf(self::REDIRECT_ROUTE, strtolower($this->module))
            );
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}")
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function deleteAction($id)
    {
        $entity = $this->repository->find($id);
        $this->service->remove($entity);
        $this->service->flush();

        return $this->redirectToRoute(
            sprintf(self::REDIRECT_ROUTE, strtolower($this->module))
        );
    }

    /**
     * @param AbstractService $service
     */
    public function setService(AbstractService $service)
    {
        $this->service = $service;
    }

    /**
     * @param EntityRepository $repository
     */
    public function setRepository(EntityRepository $repository)
    {
        $this->repository = $repository;
    }
}
