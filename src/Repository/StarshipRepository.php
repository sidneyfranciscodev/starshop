<?php

namespace App\Repository;

use App\Model\Starship;
use App\Enum\StarshipStatusEnum;

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
                StarshipStatusEnum::IN_PROGRESS,
            ),
            new Starship(
                2,
                'Millennium Falcon',
                'Freighter',
                'Han Solo',
                StarshipStatusEnum::WAITING,
            ),
            new Starship(
                3,
                'Battlestar Galactica',
                'Warship',
                'William Adama',
                StarshipStatusEnum::COMPLETE,
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