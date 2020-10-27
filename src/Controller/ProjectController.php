<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class ProjectController
 *
 * @package AppBundle\Controller
 *
 * @Route("/project")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="project_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"}, name="project_show", methods={"GET"})
     */
    public function show(Request $request) {
        return new Response($request);
    }

    /**
     * @Route("/new", name="project_new", methods={"POST"})
     */
    public function create(Request $request)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/edit", requirements={"id": "\d+"}, name="project_edit", methods={"POST"})
     */
    public function edit(Request $request, Project $project)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/delete", requirements={"id": "\d+"}, name="project_delete", methods={"DELETE"})
     */
    public function delete(Project $project)
    {
        return new Response($project);
    }
}
