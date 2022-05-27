<?php

namespace Autotext\OpenAI;

use Autotext\OpenAI\Contracts\Completion;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

class OpenAI implements Completion
{
    /**
     * @var string $apiKey ;
     */
    protected string $apiKey;

    /**
     * Base url for api
     *
     * @var string ;
     */
    protected string $baseUrl = 'https://api.openai.com/v1/';

    /**
     * @var Client
     */
    protected Client $client;

    /**
     * OpenAI constructor.
     */
    public function __construct()
    {
        $this->apiKey = 'xxxx';

        $this->client = new Client();
    }

    /**
     * Get api key issued from OpenAI
     *
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getEngines(): ResponseInterface
    {
        return $this->client->send($this->getEngineRequest());
    }

    /**
     * @return string
     */
    public function getEngineApiUrl(): string
    {
        return $this->getBaseUrl() . 'engines';
    }

    /**
     * @return Request
     */
    public function getEngineRequest(): Request
    {
        return new Request(
            'get',
            $this->getEngineApiUrl(),
            $this->getAuthorizationHeader()
        );
    }

    /**
     * @return string[]
     */
    protected function getAuthorizationHeader(): array
    {
        return ['Authorization' => 'Bearer ' . $this->getApiKey()];
    }
}

