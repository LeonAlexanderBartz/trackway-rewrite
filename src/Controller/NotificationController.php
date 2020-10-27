<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class NotificationController
 *
 * @package AppBundle\Controller
 *
 * @Route("/notification")
 */
class NotificationController extends AbstractController
{
    /**
     * @Route("/", name="notification", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        return new Response($request);
    }
}
