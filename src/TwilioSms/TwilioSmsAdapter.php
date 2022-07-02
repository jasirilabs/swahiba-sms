<?php

namespace JasiriLabs\NanasiSms\TwilioSms;

use JasiriLabs\NanasiSms\NanasiSmsAdapter;


class TwilioSmsAdapter implements NanasiSmsAdapter
{
    /**
     * @param string|array $phoneNumber
     * @param string|array $message
     * @return array
     */
    public function send(string|array $phoneNumber, string|array $message): array
    {

        return [];

    }

    /**
     * @param string|array $phoneNumber
     * @param string|array $message
     * @param array $params
     * @return array
     */

    public function schedule(string|array $phoneNumber, string|array $message, array $params): array
    {

        return [];

    }

    /**
     * @param array|null $params
     * @return array
     */

    public function deliveryReport(array|null $params): array
    {

        return [];

    }


    /**
     * @return array
     */

    public function balance(): array
    {

        return [];

    }
}
