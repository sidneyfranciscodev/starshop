<?php

namespace App\Controller;

use App\Model\Starship;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StarshipApiController extends AbstractController
{
    #[Route('/api/starships', name: 'app_starship_api')]
    public function getCollection(): Response
    {
        $starships = [
            new Starship(
                1,
                'USS Enterprise',
                'Explorer',
                'James T. Kirk',
                'Active'
            ),
            new Starship(
                2,
                'Millennium Falcon',
                'Freighter',
                'Han Solo',
                'repaired'
            ),
            new Starship(
                3,
                'Battlestar Galactica',
                'Warship',
                'William Adama',
                'under construction'
            ),
        ];
        return $this->json($starships);
    }
}
