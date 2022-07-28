<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms;


interface NanasiSmsOperator
{
    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @return SendSmsResponse
     */
    public function send(string|array $phoneNumber, string|array $message): SendSmsResponse;

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @param  array  $params
     * @return ScheduleSmsResponse
     */
    public function schedule(string|array $phoneNumber, string|array $message, array $params): ScheduleSmsResponse;

    /**
     * @param  array|null  $params
     * @return DeliveryReportResponse
     */
    public function deliveryReport(array|null $params): DeliveryReportResponse;

    /**
     * @return SmsBalanceResponse
     */
    public function balance(): SmsBalanceResponse;
}
