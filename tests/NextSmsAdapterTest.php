<?php

use JasiriLabs\SwahibaSms\Config;
use JasiriLabs\SwahibaSms\SwahibaSmsAdapter;
use JasiriLabs\SwahibaSms\NextSms\NextSmsAdapter;
use JasiriLabs\SwahibaSms\SendSmsResponse;

beforeEach(closure: function (){

    $config = new Config([
        'username' => '',
        'password' => '',
    ]);

    $adapter = mock(NextSmsAdapter::class, SwahibaSmsAdapter::class)
        ->shouldReceive('send', 'schedule', 'deliveryReport', 'balance')
        ->andReturn(new SendSmsResponse(['35891385367034994620', '35891385367034994621']));


});

test('can send single sms to single destination', function () {

//    $response = $this->sms->send('255757221600', 'Hello sigma SMS!');
//
//    $this->assertStringContainsString('255757221600', $response);

})->group('send');

test('can send single sms to multiple destinations', function () {


})->group('send');

test('can send multiple sms to single destination', function () {


})->group('send');


test('can send multiple sms to multiple destinations', function () {


})->group('send');



test('can schedule single sms to single destination', function () {

})->group('schedule');


test('can schedule single sms to multiple destinations', function () {

})->group('schedule');


test('can schedule multiple sms to single destination', function () {

})->group('schedule');


test('can schedule multiple sms to multiple destinations', function () {

})->group('schedule');


test('can get delivery status of single sms', function () {

})->group('status');


test('can get sms balance', function () {

})->group('balance');
