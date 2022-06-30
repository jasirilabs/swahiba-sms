<?php

namespace JasiriLabs\SigmaSMS;


interface SigmaSMSOperator
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
     * @param array|null $params
     * @return array
     */

    public function deliveryReport(array|null $params): array;



    /**
     * @return array
     */

    public function balance(): array;



}