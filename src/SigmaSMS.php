<?php

namespace JasiriLabs\SigmaSMS;


class SigmaSMS  implements SigmaSMSOperator
{

    /**
     * @var SigmaSMSAdapter
     */

    private SigmaSMSAdapter $adapter;

    /**
     * @var Config
     */

    private Config $config;


    public function __construct(
        SigmaSMSAdapter $adapter,
        array $config
    )
    {
        $this->adapter = $adapter;
        $this->config = new Config($config);
    }


    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @return string
     */
    public function send(string|array $phoneNumber, string $message): string
    {
        return $this->adapter->send($phoneNumber, $message);
    }


    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @param string $time
     * @return string
     */

    public function schedule(string|array $phoneNumber, string $message, string $time): string
    {
        return $this->adapter->schedule($phoneNumber, $message, $time);
    }




    /**
     * @param string $messageId
     * @return string
     */

    public function deliveryReport(string $messageId): string
    {
        return $this->adapter->deliveryReport($messageId);
    }





    /**
     * @return string
     */

    public function balance(): string
    {
        return $this->adapter->balance();
    }


}