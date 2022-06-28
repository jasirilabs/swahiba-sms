<?php

namespace JasiriLabs\SigmaSMS\NextSms;


use JasiriLabs\SigmaSMS\SigmaSMSAdapter;


class NextSmsAdapter implements SigmaSMSAdapter
{

    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @return string
     */
    public function send(string|array $phoneNumber, string $message): string
    {

        return 'NextSmsAdapter: ' . $phoneNumber . ' - ' . $message;

    }


    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @param string $time
     * @return string
     */

    public function schedule(string|array $phoneNumber, string $message, string $time): string
    {

        return 'NextSmsAdapter: ' . $phoneNumber . ' - ' . $message . ' - ' . $time . ' - scheduled';


    }


    /**
     * @param string $messageId
     * @return string
     */

    public function deliveryReport(string $messageId): string
    {

        return 'NextSmsAdapter: ' . $messageId . ' - ' . 'deliveryReport';


    }



    /**
     * @return string
     */

    public function balance(): string
    {

        return 'NextSmsAdapter: balance';

    }



}