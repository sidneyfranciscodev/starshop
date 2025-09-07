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
                new \DateTimeImmutable('2025-07-04 10:00:00'),
            ),
            new Starship(
                2,
                'Millennium Falcon',
                'Freighter',
                'Han Solo',
                StarshipStatusEnum::WAITING,
                new \DateTimeImmutable('2025-07-06 14:30:00'),
            ),
            new Starship(
                3,
                'Battlestar Galactica',
                'Warship',
                'William Adama',
                StarshipStatusEnum::COMPLETE,
                new \DateTimeImmutable('2025-07-02 09:15:00'),
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