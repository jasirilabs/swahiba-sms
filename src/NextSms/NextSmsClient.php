<?php

namespace JasiriLabs\SigmaSMS\NextSms;

use GuzzleHttp\Client;
use JasiriLabs\SigmaSMS\Config;


class NextSmsClient
{


    // base url for the NextSms API
    const BASE_URL = 'https://messaging-service.co.tz';


    /**
     *
     * @var config
     *
     */

    private Config $config;


    /**
     *
     * The NextSms API version
     *
     */

    private string $apiVersion = '/api/sms/v1';


    private Client $client;


    public function __construct($config)
    {

        $this->config = $config;

        $this->client =  new Client(
            [
                'base_uri' => self::BASE_URL,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'auth' => [$this->config->get('username'), $this->config->get('password')],
            ]
        );
    }



    public function post($endpoint, $data)
    {
        $url =  $this->apiVersion . $endpoint;
        $response = $this->client->request('POST', $url, [
            'body' => json_encode($data),
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    
}