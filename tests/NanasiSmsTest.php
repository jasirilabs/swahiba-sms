<?php


use JasiriLabs\NanasiSms\Config;
use JasiriLabs\NanasiSms\NanasiSms;
use JasiriLabs\NanasiSms\NanasiSmsResponse\SendSms\SendSmsResponse;
use JasiriLabs\NanasiSms\NextSms\NextSmsAdapter;

it('can send sms', function () {

    $config = new Config(['username' => 'brunoalfred', 'password' => 'vothic-mUmfuv-gopxi7']);
    $sms = new NanasiSms(
        adapter: new NextSmsAdapter($config),
    );

    $config = new Config(['username' => 'brunoalfred', 'password' => 'vothic-mUmfuv-gopxi7']);
    $sms =  new NanasiSms(adapter: new NextSmsAdapter($config));
    $response = $sms->send('255765975152', ['Testing Nanasi Sms!', 'Testing nanasi 2']);
    expect($response)->toBeInstanceOf(SendSmsResponse::class);
    expect($response->data)->toBeArray();
    print_r($response->data[1]->messageId);
});
