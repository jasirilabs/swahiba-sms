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
     * @param string|array $message
     * @param array $params
     * @return array
     */

    public function schedule(string|array $phoneNumber, string|array $message, array $params): array
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
            'schedule_time' => $params['time'],
            'message' => 'Hello World',
            'recipients' => $recipients
        );

        return $this->client->post('/send',$data);


    }


    /**
     * @param array|null $params
     * @return array
     */

    public function deliveryReport(array|null $params): array
    {

        return $this->client->get('/delivery-reports', $params);

    }

    /**
     * @return array
     */

    public function balance(): array
    {
        return $this->client->get('/vendors/balance');
    }




}