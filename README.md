# sigma-sms

## Get started 
```php

use JasiriLabs\SigmaSMS\Config;
use JasiriLabs\SigmaSMS\NextSms\NextSmsAdapter;
use JasiriLabs\SigmaSMS\SigmaSMS;

$config = new Config(['username' => 'username', 'password' => 'password']);

$sms = new SigmaSMS(
    new NextSmsAdapter($config),
    []
);

$sms->send(['255765975152', '255766073577'], ['Hello Sigma SMS', 'Its working']);

```
