<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function homepage(
        StarshipRepository $repository,
        HttpClientInterface $client,
        CacheInterface $issLocationPool,
    ): Response {
        $ships = $repository->findAll();
        $ship = $repository->find(1);

        $issData = $issLocationPool->get('iss_location_data', function() use ($client) : array  {
            $response = $client->request(
            'GET',
            'https://api.wheretheiss.at/v1/satellites/25544'
            );
            return $response->toArray();
        });

       return $this->render('main/homepage.html.twig', [
        'ships' => $ships,
        'ship' => $ship,
        'issData' => $issData,
       ]);
    }
}
