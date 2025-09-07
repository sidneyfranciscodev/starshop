<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function homepage(
        StarshipRepository $repository,
        HttpClientInterface $client,
    ): Response {
        $ships = $repository->findAll();
        $ship = $repository->find(1);

        $response = $client->request(
            'GET',
            'https://api.wheretheiss.at/v1/satellites/25544'
        );
        
        $issData = $response->toArray();

       return $this->render('main/homepage.html.twig', [
        'ships' => $ships,
        'ship' => $ship,
        'issData' => $issData,
       ]);
    }
}