<?php


use JasiriLabs\SigmaSMS\BeemSms\BeemSmsAdapter;
use JasiriLabs\SigmaSMS\SigmaSMS;

test('can send sms', function () {

    $sms = new SigmaSMS(
        adapter: new BeemSmsAdapter(),
        config: []
    );

    $response =  $sms->send('+5511999999999', 'Hello world!');


    $this->assertStringContainsString('+5511999999999', $response);

});
