<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms\NextSms;

use JasiriLabs\NanasiSms\Config;
use JasiriLabs\NanasiSms\DeliveryReportResponse;
use JasiriLabs\NanasiSms\NanasiSmsAdapter;
use JasiriLabs\NanasiSms\ScheduleSmsResponse;
use JasiriLabs\NanasiSms\SendSmsResponse;
use JasiriLabs\NanasiSms\SmsBalanceResponse;

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
     * @return SendSmsResponse
     */
    public function send(string|array $phoneNumber, string|array $message): SendSmsResponse
    {
        $singleMessageEndpoint = '/text/single';

        $multipleMessageEndpoint = '/text/multi';

        if (is_array($message)) {
            $data = ['messages' => []];
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
     * @return ScheduleSmsResponse
     */
    public function schedule(string|array $phoneNumber, string|array $message, array $params): ScheduleSmsResponse
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
     * @return DeliveryReportResponse
     */
    public function deliveryReport(array|null $params): DeliveryReportResponse
    {
        return $this->client->get('/reports', $params);
    }

    /**
     * @return SmsBalanceResponse
     */
    public function balance(): SmsBalanceResponse
    {
        return $this->client->get('/balance');
    }
}
