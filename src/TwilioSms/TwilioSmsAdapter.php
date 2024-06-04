<?php

declare(strict_types=1);

namespace JasiriLabs\SwahibaSms\TwilioSms;

use JasiriLabs\SwahibaSms\DeliveryReportResponse;
use JasiriLabs\SwahibaSms\SwahibaSmsAdapter;
use JasiriLabs\SwahibaSms\ScheduleSmsResponse;
use JasiriLabs\SwahibaSms\SendSmsResponse;
use JasiriLabs\SwahibaSms\SmsBalanceResponse;

class TwilioSmsAdapter implements SwahibaSmsAdapter
{
    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @return SendSmsResponse
     */
    public function send(string|array $phoneNumber, string|array $message): SendSmsResponse
    {
        $messageId = '';

        return new SendSmsResponse($messageId);
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @param  array  $params
     * @return ScheduleSmsResponse
     */
    public function schedule(string|array $phoneNumber, string|array $message, array $params): ScheduleSmsResponse
    {
        return new ScheduleSmsResponse();
    }

    /**
     * @param  array|null  $params
     * @return DeliveryReportResponse
     */
    public function deliveryReport(array|null $params): DeliveryReportResponse
    {
        return new DeliveryReportResponse();
    }

    /**
     * @return SmsBalanceResponse
     */
    public function balance(): SmsBalanceResponse
    {
        return new SmsBalanceResponse();
    }
}
