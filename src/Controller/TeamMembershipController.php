<?php

namespace App\Controller;

use App\Entity\Membership;
use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TeamMembershipController
 *
 * @package AppBundle\Controller
 *
 * @Route("/team")
 */
class TeamMembershipController extends AbstractController
{
    /**
     * @Route("/{id}/membership/", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function index(Request $request, Team $team)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/membership/{membershipId}", requirements={"id": "\d+", "membershipId": "\d+"}, methods={"GET"})
     */
    public function show(Team $team, Membership $membership)
    {
        return new Response($team);
    }

    /**
     * @Route("/{id}/membership/{membershipId}/edit", requirements={"id": "\d+", "membershipId": "\d+"}, methods={"PUT"})
     */
    public function edit(Request $request, Team $team, Membership $membership)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/membership/{membershipId}/delete", requirements={"id": "\d+", "membershipId": "\d+"}, methods={"DELETE"})
     */
    public function delete(Team $team, Membership $membership)
    {
        return new Response($team);
    }
}
