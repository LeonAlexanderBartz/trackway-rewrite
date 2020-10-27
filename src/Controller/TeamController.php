<?php

namespace App\Controller;

use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TeamController
 *
 * @package AppBundle\Controller
 *
 * @Route("/team")
 */
class TeamController extends AbstractController
{
    /**
     * @Route("/", name="team_index", methods={"GET"})
     */
    public function index(Request $request)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"}, name="team_show", methods={"GET"})
     */
    public function show(Team $team)
    {
        return $team;
    }

    /**
     * @Route("/new", name="team_new", methods={"POST"})
     */
    public function new(Request $request)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/edit", requirements={"id": "\d+"}, name="team_edit", methods={"PUT"})
     */
    public function edit(Request $request, Team $team)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/delete", requirements={"id": "\d+"}, name="team_delete", methods={"DELETE"})
     */
    public function delete(Team $team)
    {
        return new Response($team);
    }

    /**
     * @Route("/{id}/activate", requirements={"id": "\d+"}, name="team_activate", methods={"PUT"})
     */
    public function activate(Request $request, Team $team)
    {
        return new Response($request);
    }
}
