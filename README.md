# sigma-sms

**Note**
> Feel free to play with the code.

## Get started 

**Warning**
> This is a work in progress.

```php

use JasiriLabs\SigmaSMS\Config;
use JasiriLabs\SigmaSMS\NextSms\NextSmsAdapter;
use JasiriLabs\SigmaSMS\SigmaSMS;

$config = new Config(['username' => 'username', 'password' => 'password']);

$sms = new SigmaSMS(
    new NextSmsAdapter($config),
    []
);


```


```php

$sms->send(['255765975152', '255766073577'], ['Hello Sigma SMS', 'Its working']);

$sms->schedule('255746094190', 'Hello Scheduled SMS', ['date' => '2022-06-30', 'time' => '10:03']);

$sms->deliveryReport(['limit' => 3]) 

$sms->balance()

```