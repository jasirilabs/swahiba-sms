<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms\BeemSms;

use JasiriLabs\NanasiSms\NanasiSmsAdapter;
use JasiriLabs\NanasiSms\Config;


class BeemSmsAdapter implements NanasiSmsAdapter
{
    /**
     * @var Config
     */
    private Config $config;

    public BeamSmsClient $client;

    public function __construct(Config $config, $apiVersion = 'v1')
    {
        $this->config = $config;

        $this->client = new BeamSmsClient($this->config, $apiVersion);
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @return mixed
     */
    public function send(string|array $phoneNumber, string|array $message): array
    {
        if (is_array($message)) {
            foreach ($message as $text) {
                return $this->sendSMS($phoneNumber, $text);
            }
        }

        return $this->sendSMS($phoneNumber, $message);
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @param  array  $params
     * @return array
     */
    public function schedule(string|array $phoneNumber, string|array $message, array $params): array
    {
        return $this->sendSMS($phoneNumber, $message, $params);
    }

    /**
     * @param  array|null  $params
     * @return array
     */
    public function deliveryReport(array|null $params): array
    {
        return $this->client->get('/delivery-reports', $params);
    }

    /**
     * @return array
     */
    public function balance(): array
    {
        return $this->client->get('/vendors/balance');
    }

    /**
     * @param  array|string  $phoneNumber
     * @param  mixed  $text
     * @param  array|null  $params
     * @return mixed
     */
    private function sendSMS(array|string $phoneNumber, array|string $text, array|null $params = null): mixed
    {
        $recipients = [];
        foreach ($phoneNumber as $index => $value) {
            $recipients[] = [
                'recipient_id' => $index,
                'dest_addr' => $value,
            ];
        }
        $data = [
            'source_addr' => 'INFO',
            'encoding' => 0,
            'schedule_time' => $params['time'] ?? '',
            'message' => $text,
            'recipients' => $recipients,
        ];

        return $this->client->post('/send', $data);
    }
}
