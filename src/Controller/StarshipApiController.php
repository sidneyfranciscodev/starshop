<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StarshipApiController extends AbstractController
{
    #[Route('/api/starships', name: 'app_starship_api')]
    public function getCollection(): Response
    {
        $starships = [
            [
                'name' => 'Millennium Falcon',
                'model' => 'YT-1300 light freighter',
                'manufacturer' => 'Corellian Engineering Corporation',
                'cost_in_credits' => '100000',
                'length' => '34.37',
                'max_atmosphering_speed' => '1050',
                'crew' => '4',
                'passengers' => '6',
                'cargo_capacity' => '100000',
                'consumables' => '2 months',
                'hyperdrive_rating' => '0.5',
                'MGLT' => '75',
                'starship_class' => 'Light freighter',
            ],
            [
                'name' => 'X-wing',
                'model' => 'T-65 X-wing starfighter',
                'manufacturer' => 'Incom Corporation',
                'cost_in_credits' => '149999',
                'length' => '12.5',
                'max_atmosphering_speed' => '1050',
                'crew' => '1',
                'passengers' => '0',
                'cargo_capacity' => '110',
                'consumables' => '1 week',
                'hyperdrive_rating' => '1.0',
                'MGLT' => '100',
                'starship_class' => 'Starfighter',
            ],
            // Add more starships as needed
        ];
        return $this->json($starships);
    }
}
