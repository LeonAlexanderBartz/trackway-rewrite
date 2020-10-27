<?php

namespace App\Controller;

use App\Entity\Invitation;
use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TeamInvitationController
 *
 * @package AppBundle\Controller
 *
 * @Route("/team")
 */
class TeamInvitationController extends AbstractController
{
    /**
     * @Route("/{id}/invitation/", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function index(Request $request, Team $team)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/invite", requirements={"id": "\d+"}, methods={"POST"})
     */
    public function create(Request $request, Team $team)
    {
        return new Response($request);
    }

    /**
     * @Route("/invitation/{token}/valid", requirements={"token": "[a-zA-Z0-9]+"}, methods={"POST"})
     */
    public function valid($token)
    {
        return new Response($token);
    }
    /**
     * @Route("/{id}/invitation/{invitationId}/delete", requirements={"id": "\d+", "invitationId": "\d+"}, methods={"DELETE"})
     */
    public function delete(Team $team, Invitation $invitation)
    {
        return new Response($invitation);
    }

}
