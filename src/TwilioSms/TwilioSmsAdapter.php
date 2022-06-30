<?php

namespace JasiriLabs\SigmaSMS\TwilioSms;

use JasiriLabs\SigmaSMS\SigmaSMSAdapter;

class TwilioSmsAdapter implements SigmaSMSAdapter
{
    /**
     * @param  string|array  $phoneNumber
     * @param  string  $message
     * @return string
     */
    public function send(string|array $phoneNumber, string $message): string
    {
        return 'TwilioSmsAdapter: '.$phoneNumber.' - '.$message;
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string  $message
     * @param  string  $time
     * @return string
     */
    public function schedule(string|array $phoneNumber, string $message, string $time): string
    {
        return 'TwilioSmsAdapter: '.$phoneNumber.' - '.$message.' - '.$time.' - scheduled';
    }

    /**
     * @param  string  $messageId
     * @return string
     */
    public function deliveryReport(string $messageId): string
    {
        return 'TwilioSmsAdapter: '.$messageId.' - '.'deliveryReport';
    }

    /**
     * @return string
     */
    public function balance(): string
    {
        return 'TwilioSmsAdapter: balance';
    }
}
