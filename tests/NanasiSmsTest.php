<?php

use JasiriLabs\SigmaSMS\NextSms\NextSmsAdapter;
use JasiriLabs\SigmaSMS\SigmaSMS;

test('can send sms', function () {
    $sms = new SigmaSMS(
        adapter: new NextSmsAdapter(),
        config: []
    );

    $response = $sms->send('255757221600', 'Hello sigma SMS!');

    $this->assertStringContainsString('255757221600', $response);
});
