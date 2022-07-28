<?php



use JasiriLabs\NanasiSms\NanasiSms;
use JasiriLabs\NanasiSms\SendSmsResponse;


beforeEach(closure: function (){

    $this->sms = mock(NanasiSms::class)
        ->shouldReceive('send', 'schedule', 'deliveryReport', 'balance')
        ->andReturn(new SendSmsResponse(['35891385367034994620', '35891385367034994621']))
        ->getMock();

});


test('can send single sms to single destination', function () {

    $sms = mock(NanasiSms::class)
        ->shouldReceive('send')
        ->andReturn(new SendSmsResponse(['35891385367034994620']))
        ->getMock();

    expect($sms->send('255757222000', 'Hello sigma SMS!'))->toBeObject();

    // TODO: Assert single messageId is returned from SendSmsResponse

})->group('send');


test('can send single sms to multiple destinations', function () {

    $sms = mock(NanasiSms::class)
        ->shouldReceive('send')
        ->andReturn(new SendSmsResponse(['35891385367134994620']))
        ->getMock();

    expect($sms->send(['255757222000', '255757333111'], 'Hello sigma SMS!'))->toBeObject();

    // TODO: Assert single messageId is returned from SendSmsResponse

})->group('send');


test('can send multiple sms to single destination', function () {

    $sms = mock(NanasiSms::class)
        ->shouldReceive('send')
        ->andReturn(new SendSmsResponse(['35891385367134994620', '35391385367034994621']))
        ->getMock();

    expect($sms->send(['255757222000', '255757333111'], ['Hello sigma SMS!', 'Lets test our API']))->toBeObject();

})->group('send');


test('can send multiple sms to multiple destinations', function () {

    $sms = mock(NanasiSms::class)
        ->shouldReceive('send')
        ->andReturn(new SendSmsResponse(['35891385367134994620', '35391385367034994621']))
        ->getMock();

    expect($sms->send(['255757222000', '255757333111'], ['Hello sigma SMS!', 'Lets test our API']))->toBeObject();

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



