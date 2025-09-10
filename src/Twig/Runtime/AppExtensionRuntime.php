<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;

class AppExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly CacheInterface $issLocationPool,
    ){
    }

    public function getIssLocationData()
    {
        return $this->issLocationPool->get('iss_location_data', function(): array  {
            $response = $this->client->request(
                'GET',
                'https://api.wheretheiss.at/v1/satellites/25544'
            );
            return $response->toArray();
        });
    }
}
