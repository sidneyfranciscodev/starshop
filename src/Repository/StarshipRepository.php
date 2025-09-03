<?php

namespace App\Repository;

use App\Model\Starship;

class StarshipRepository
{
    public function findAll(): array
    {
        return [
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
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() == $id) {
                return $starship;
            }
        }

        return null;
    }
}