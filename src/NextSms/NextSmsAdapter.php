<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms\NextSms;

use JasiriLabs\NanasiSms\Config;
use JasiriLabs\NanasiSms\DeliveryReportResponse;
use JasiriLabs\NanasiSms\NanasiSmsAdapter;
use JasiriLabs\NanasiSms\SendSmsResponse;
use JasiriLabs\NanasiSms\SmsBalanceResponse;
use JasiriLabs\NanasiSms\ScheduleSmsResponse;


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
     * @param string|array $phoneNumber
     * @param string|array $message
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

            $response = $this->client->post($multipleMessageEndpoint, $data);


             $messageIds = [];

            foreach ($response['messages'] as $message) {

                $messageIds[] = $message['messageId'];

            }

            return new SendSmsResponse($messageIds);

        }

        $response = $this->client->post($singleMessageEndpoint, [
            'from' => 'NEXTSMS',
            'to' => $phoneNumber,
            'text' => $message,
        ]);


        return new SendSmsResponse($response['messages'][0]['messageId']);
    }

    /**
     * @param string|array $phoneNumber
     * @param string|array $message
     * @param array $params
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

         $this->client->post('/text/single', $data);

         return new ScheduleSmsResponse();
    }

    /**
     * @param array|null $params
     * @return DeliveryReportResponse
     */
    public function deliveryReport(array|null $params): DeliveryReportResponse
    {
         $this->client->get('/reports', $params);

         return new DeliveryReportResponse();
    }

    /**
     * @return SmsBalanceResponse
     */
    public function balance(): SmsBalanceResponse
    {
         $this->client->get('/balance');

         return new SmsBalanceResponse();
    }
}
