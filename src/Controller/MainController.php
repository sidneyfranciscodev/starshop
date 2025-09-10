<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function homepage(
        StarshipRepository $repository,
    ): Response {
        $ships = $repository->findAll();
        $ship = $repository->find(1);

       return $this->render('main/homepage.html.twig', [
        'ships' => $ships,
        'ship' => $ship,
       ]);
    }
}
