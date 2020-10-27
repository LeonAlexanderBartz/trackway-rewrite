<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CalendarController
 *
 * @package AppBundle\Controller
 * @Route("/calendar", name="calendar")
 */
class CalendarController extends AbstractController
{
    /**
     * @Route("/", name="calendar_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        return new Response($request);
    }
}
