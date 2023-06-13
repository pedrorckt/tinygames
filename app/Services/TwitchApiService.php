<?php

namespace App\Services;

class TwitchApiService
{
    protected $baseUrl;
    protected $clientId;
    protected $token;

    public function __construct($baseUrl, $clientId, $token)
    {
        $this->baseUrl = $baseUrl;
        $this->clientId = $clientId;
        $this->token = $token;
    }

    public function getTopGames()
    {
        $url = $this->baseUrl;
        
        $body = 'fields *;';

        $response = $this->makeRequest($url, $body);

        return $response;
    }

    public function makeRequest($url, $body = '')
    {
        $response = \Http::withHeaders([
            'Client-ID' => $this->clientId,
            'Authorization' => 'Bearer ' . $this->token,
        ])
            ->withBody($body)
            ->post($url);
        return $response->json();
    }

}
