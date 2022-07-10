<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms;

class SendSmsResponse
{
    public string|array $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
}
