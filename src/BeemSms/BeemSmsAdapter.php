<?php

namespace JasiriLabs\SigmaSMS\BeemSms;

use JasiriLabs\SigmaSMS\Config;
use JasiriLabs\SigmaSMS\SigmaSMSAdapter;

class BeemSmsAdapter implements SigmaSMSAdapter
{
    /**
     * @var Config
     */

    private Config $config;

    public BeamSmsClient $client;



    public function __construct(Config $config, $apiVersion="v1")
    {
        $this->config = $config;

        $this->client = new BeamSmsClient($config, $apiVersion);
    }

    /**
     * @param string|array $phoneNumber
     * @param string|array $message
     * @return mixed
     */
    public function send(string|array $phoneNumber, string|array $message): mixed
    {
        $recipients = [];
        foreach ($phoneNumber as $index => $value){
            $recipients[] = array(
                'recipient_id' => $index,
                'dest_addr' => $value
            );
        }

        $data = array(
            'source_addr' => 'INFO',
            'encoding'=>0,
            'schedule_time' => '',
            'message' => 'Hello World',
            'recipients' => $recipients
        );

       return $this->client->post('/send',$data);

    }


    /**
     * @param string|array $phoneNumber
     * @param string $message
     * @param string $time
     * @return string
     */

    public function schedule(string|array $phoneNumber, string $message, string $time): string
    {

        $recipients = [];
        foreach ($phoneNumber as $index => $value){
            $recipients[] = array(
                'recipient_id' => $index,
                'dest_addr' => $value
            );
        }

        $data = array(
            'source_addr' => 'INFO',
            'encoding'=>0,
            'schedule_time' => $time,
            'message' => 'Hello World',
            'recipients' => $recipients
        );

        return $this->client->post('/send',$data);


    }


    /**
     * @param string $messageId
     * @return string
     */

    public function deliveryReport(string $messageId): string
    {
       // return $this->client->get("/delivery-reports?dest_addr={dest_addr}&request_id={request_id}")
        //TODO: The SIGMASms Adapter need to be changed to receive the above parameters
        return "";
    }



    /**
     * @return string
     */

    public function balance(): string
    {
        return $this->client->get('/vendors/balance');
    }




}