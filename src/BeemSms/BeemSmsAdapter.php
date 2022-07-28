<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms\BeemSms;

use JasiriLabs\NanasiSms\Config;
use JasiriLabs\NanasiSms\DeliveryReportResponse;
use JasiriLabs\NanasiSms\NanasiSmsAdapter;
use JasiriLabs\NanasiSms\ScheduleSmsResponse;
use JasiriLabs\NanasiSms\SendSmsResponse;
use JasiriLabs\NanasiSms\SmsBalanceResponse;

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
        return $this->client->get('/delivery-reports', $params);
    }

    /**
     * @return SmsBalanceResponse
     */
    public function balance(): SmsBalanceResponse
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
