<?php

namespace JasiriLabs\SigmaSMS;

interface SigmaSMSOperator
{
    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @return array
     */
    public function send(string|array $phoneNumber, string|array $message): array;

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @param  array  $params
     * @return array
     */
    public function schedule(string|array $phoneNumber, string|array $message, array $params): array;

    /**
     * @param  array|null  $params
     * @return array
     */
    public function deliveryReport(array|null $params): array;

    /**
     * @return array
     */
    public function balance(): array;
}
