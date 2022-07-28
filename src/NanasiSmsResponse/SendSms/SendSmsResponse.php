<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms\NanasiSmsResponse\SendSms;

class SendSmsResponse
{
    public array $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
}
