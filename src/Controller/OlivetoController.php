<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OlivetoController extends AbstractController
{
    #[Route('/oliveto', name: 'oliveto')]
    public function index(): Response
    {
        return $this->render('oliveto/index.html.twig', [
            'trees' => [
                'one',
                'two',
                'three'
            ],
        ]);
    }
}
