<?php

namespace JasiriLabs\SigmaSMS;

interface SigmaSMSAdapter
{

    /**
     * @param string|array $phoneNumber
     * @param string|array $message
     * @return string
     */
    public function send(string|array $phoneNumber, string|array $message): mixed;


    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @param string $time
     * @return string
     */

    public function schedule(string|array $phoneNumber, string $message, string $time): string;


    /**
     * @param string $messageId
     * @return string
     */

    public function deliveryReport(string $messageId): string;



    /**
     * @return string
     */

    public function balance(): string;



}