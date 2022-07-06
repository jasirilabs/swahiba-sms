<?php

declare(strict_types=1);

namespace JasiriLabs\SigmaSMS\NextSms;

use JasiriLabs\NanasiSms\Config;
use JasiriLabs\NanasiSms\NanasiSmsAdapter;
use JasiriLabs\NanasiSms\NextSms\NextSmsClient;


class NextSmsAdapter implements NanasiSmsAdapter
{
    /**
     * @var Config
     */
    private Config $config;

    public NextSmsClient $client;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->client = new NextSmsClient($this->config);
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @return array
     */
    public function send(string|array $phoneNumber, string|array $message): array
    {
        $singleMessageEndpoint = '/text/single';

        $multipleMessageEndpoint = '/text/multi';

        if (is_array($message)) {
            $data = ['messages'=> []];
            foreach ($message as $text) {
                $data['messages'][] = [
                    'from' => 'NEXTSMS',
                    'to' => $phoneNumber,
                    'text' => $text,
                ];
            }

            return  $this->client->post($multipleMessageEndpoint, $data);
        }

        return $this->client->post($singleMessageEndpoint, [
            'from' => 'NEXTSMS',
            'to' => $phoneNumber,
            'text' => $message,
        ]);
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @param  array  $params
     * @return array
     */
    public function schedule(string|array $phoneNumber, string|array $message, array $params): array
    {
        $data = [
            'from' => 'NEXTSMS',
            'to' => $phoneNumber,
            'text' => $message,
            'date' => $params['date'],
            'time' => $params['time'],
        ];

        return $this->client->post('/text/single', $data);
    }

    /**
     * @param  array|null  $params
     * @return array
     */
    public function deliveryReport(array|null $params): array
    {
        return $this->client->get('/reports', $params);
    }

    /**
     * @return array
     */
    public function balance(): array
    {
        return $this->client->get('/balance');
    }
}
