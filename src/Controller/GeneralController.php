<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController
{

    /**
     * @Route("/")
     */
    public function index() {
        return new JsonResponse([
            "success" => true,
            "data" => [
                "online" => true
            ]
        ]);
    }
}
