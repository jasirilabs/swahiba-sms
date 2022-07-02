<?php

namespace JasiriLabs\NanasiSms;


class NanasiSms  implements NanasiSmsOperator
{

    /**
     * @var NanasiSmsAdapter
     */

    private NanasiSmsAdapter $adapter;


    public function __construct(
        NanasiSmsAdapter $adapter,
    )
    {
        $this->adapter = $adapter;
    }


    /**
     * @param string|array $phoneNumber
     * @param string|array $message
     * @return array
     */
    public function send(string|array $phoneNumber, string|array $message): array
    {
        return $this->adapter->send($phoneNumber, $message);
    }


    /**
     * @param string|array $phoneNumber
     * @param string|array $message
     * @param array $params
     * @return array
     */

    public function schedule(string|array $phoneNumber, string|array $message, array $params): array
    {
        return $this->adapter->schedule($phoneNumber, $message, $params);
    }




    /**
     * @param array|null $params
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