<?php

declare(strict_types=1);

namespace JasiriLabs\SwahibaSms\BeemSms;

use JasiriLabs\SwahibaSms\Config;
use JasiriLabs\SwahibaSms\DeliveryReportResponse;
use JasiriLabs\SwahibaSms\SwahibaSmsAdapter;
use JasiriLabs\SwahibaSms\ScheduleSmsResponse;
use JasiriLabs\SwahibaSms\SendSmsResponse;
use JasiriLabs\SwahibaSms\SmsBalanceResponse;

class BeemSmsAdapter implements SwahibaSmsAdapter
{
    /**
     * @var Config
     */
    private Config $config;

    public BeamSmsClient $client;

    public function __construct(Config $config, string $apiVersion = 'v1')
    {
        $this->config = $config;

        $this->client = new BeamSmsClient($this->config, $apiVersion);
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @return SendSmsResponse
     */
    public function send(string|array $phoneNumber, string|array $message): SendSmsResponse
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
     * @return ScheduleSmsResponse
     */
    public function schedule(string|array $phoneNumber, string|array $message, array $params): ScheduleSmsResponse
    {
        return $this->sendSMS($phoneNumber, $message, $params);
    }

    /**
     * @param  array|null  $params
     * @return DeliveryReportResponse
     */
    public function deliveryReport(array|null $params): DeliveryReportResponse
    {
         $this->client->get('/delivery-reports', $params);

         return new DeliveryReportResponse();
    }

    /**
     * @return SmsBalanceResponse
     */
    public function balance(): SmsBalanceResponse
    {
         $this->client->get('/vendors/balance');

         return new SmsBalanceResponse();
    }

    /**
     * @param  array|string  $phoneNumber
     * @param  array|string  $text
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
