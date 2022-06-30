<?php

namespace JasiriLabs\SigmaSMS;

class SigmaSMS implements SigmaSMSOperator
{
    /**
     * @var SigmaSMSAdapter
     */
    private SigmaSMSAdapter $adapter;

    public function __construct(
        SigmaSMSAdapter $adapter,
        array $config
    ) {
        $this->adapter = $adapter;
        $this->config = new Config($config);
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @return array
     */
    public function send(string|array $phoneNumber, string|array $message): array
    {
        return $this->adapter->send($phoneNumber, $message);
    }

    /**
     * @param  string|array  $phoneNumber
     * @param  string|array  $message
     * @param  array  $params
     * @return array
     */
    public function schedule(string|array $phoneNumber, string|array $message, array $params): array
    {
        return $this->adapter->schedule($phoneNumber, $message, $params);
    }

    /**
     * @param  array|null  $params
     * @return array
     */
    public function deliveryReport(array|null $params = null): array
    {
        return $this->adapter->deliveryReport($params);
    }

    /**
     * @return array
     */
    public function balance(): array
    {
        return $this->adapter->balance();
    }
}
