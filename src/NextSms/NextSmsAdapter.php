<?php

namespace JasiriLabs\SigmaSMS\NextSms;


use JasiriLabs\SigmaSMS\Config;
use JasiriLabs\SigmaSMS\SigmaSMSAdapter;


class NextSmsAdapter implements SigmaSMSAdapter
{



    /**
     * @var Config
     */

    private Config $config;



    public NextSmsClient $client;



    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->client = new NextSmsClient($config);
    }


    /**
     * @param string|array $phoneNumber
     * @param string|array $message
     * @return string
     */
    public function send(string|array $phoneNumber, string|array $message): mixed
    {

        $singleMessageEndpoint = '/text/single';

        $multipleMessageEndpoint = '/text/multi';


        if(is_array($message))
        {
            $data =["messages"=> []];
            foreach ($message as $text)
            {
                $data['messages'][] = [
                    'from' => 'NEXTSMS',
                    'to' => $phoneNumber,
                    'text' => $text
                ];
            }

            return  $this->client->post($multipleMessageEndpoint, $data );
        }

        return $this->client->post($singleMessageEndpoint, [
            'from' => 'NEXTSMS',
            'to' => $phoneNumber,
            'text' => $message,
            ]);
    }


    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @param string $time
     * @return string
     */

    public function schedule(string|array $phoneNumber, string $message, string $time): string
    {

        $data = [
            'from' => 'NEXTSMS',
            'to' => $phoneNumber,
            'text' => $message,
            'date' => date('Y-m-d', $time),
            'time' => date('H:m', $time),
        ];

        return $this->client->post('/text/single', $data);

    }


    /**
     * @param string $messageId
     * @return string
     */

    public function deliveryReport(string $messageId): string
    {




    }



    /**
     * @return string
     */

    public function balance(): string
    {

        return 'NextSmsAdapter: balance';

    }



}