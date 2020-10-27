<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class ReportsController
 *
 * @package AppBundle\Controller
 *
 * @Route("/reports")
 */
class ReportsController extends AbstractController
{
    /**
     * @Route("/", name="team_index", methods={"GET"})
     */
    public function index(Request $request)
    {
        return new Response($request);
    }
}
