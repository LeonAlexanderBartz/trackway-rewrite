<?php

namespace App\Controller;

use App\Entity\TimeEntry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TimeEntryController
 *
 * @package AppBundle\Controller
 *
 * @Route("/timeentry")
 */
class TimeEntryController extends AbstractController
{
    /**
     * @Route("/new", name="timeentry_create", methods={"POST"})
     */
    public function new(Request $request)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/edit", requirements={"id": "\d+"}, methods={"PUT"})
     */
    public function edit(Request $request, TimeEntry $timeEntry)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/delete", requirements={"id": "\d+"}, methods={"DELETE"})
     */
    public function delete(TimeEntry $timeEntry)
    {
        return new Response($timeEntry);
    }

    /**
     * @Route("/{id}/copy", requirements={"id": "\d+"}, methods={"POST"})
     */
    public function copyCalendar(Request $request, TimeEntry $timeEntry)
    {
        return new Response($request);
    }

    /**
     * @Route("/{id}/calendar_edit", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function editCalendarAction(Request $request, TimeEntry $timeEntry)
    {
        return new Response($request);
    }
}
