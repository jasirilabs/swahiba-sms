<?php

namespace JasiriLabs\SigmaSMS\BeemSms;

use JasiriLabs\SigmaSMS\SigmaSMSAdapter;

class BeemSmsAdapter implements SigmaSMSAdapter
{
    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @return string
     */
    public function send(string|array $phoneNumber, string $message): string
    {

        return 'BeemSmsAdapter: ' . $phoneNumber . ' - ' . $message;

    }


    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @param string $time
     * @return string
     */

    public function schedule(string|array $phoneNumber, string $message, string $time): string
    {

        return 'BeemSmsAdapter: ' . $phoneNumber . ' - ' . $message . ' - ' . $time . ' - scheduled';


    }


    /**
     * @param string $messageId
     * @return string
     */

    public function deliveryReport(string $messageId): string
    {

        return 'BeemSmsAdapter: ' . $messageId . ' - ' . 'deliveryReport';


    }



    /**
     * @return string
     */

    public function balance(): string
    {

        return 'BeemSmsAdapter: balance';

    }




}