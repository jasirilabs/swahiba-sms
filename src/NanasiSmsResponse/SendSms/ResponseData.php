<?php

namespace JasiriLabs\NanasiSms\NanasiSmsResponse\SendSms;

class ResponseData
{
    public string $messageId;
    public string $status;

    public function __construct($messageId, $status)
    {
        $this->messageId = $messageId;
        $this->status = $status;
    }
}
