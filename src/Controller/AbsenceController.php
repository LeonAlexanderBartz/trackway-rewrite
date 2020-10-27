<?php

namespace App\Controller;

use App\Entity\Absence;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AbsenceController
 *
 * @package AppBundle\Controller
 * @Route("/absence", name="absence")
 */
class AbsenceController extends AbstractController
{
    /**
     * @Route("/new", name="absence_create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        return new Response();
    }

    /**
     * @Route("/{id}/edit", requirements={"id": "\d+"}, name="absence_edit", options={"expose"=true}, methods={"GET", "POST"})
     */
    public function edit(Request $request, Absence $absence): Response
    {
        return new Response();
    }

    /**
     * @Route("/{id}/delete", requirements={"id": "\d+"}, name="absence_delete", options={"expose"=true}, methods={"GET"})
     */
    public function delete(Absence $absence): Response
    {
        return new Response();
    }

    /**
     * @Route("/{id}/copy", requirements={"id": "\d+"}, name="absence_calendar_copy", options={"expose"=true}, methods={"GET"})
     */
    public function copyCalendar(Request $request, Absence $absence): Response
    {
        return new Response();
    }

    /**
     * @Route("/{id}/calendar_edit", requirements={"id": "\d+"}, name="absence_calendar_edit", options={"expose"=true}, methods={"GET", "POST"})
     */
    public function editCalendar(Request $request, Absence $absence): Response
    {
        return new Response();
    }
}
