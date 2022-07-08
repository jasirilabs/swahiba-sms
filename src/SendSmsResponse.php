<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms;

class SendSmsResponse
{
    public string|array $sentTo;

    public string|array $message;

    public string|array $status;

    public function __construct($message, $sentTo, $status)
    {
        $this->message = $message;
        $this->sentTo = $sentTo;
        $this->status = $status;
    }
}
