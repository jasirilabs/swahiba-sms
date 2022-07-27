<?php

declare(strict_types=1);

namespace JasiriLabs\NanasiSms;

class SendSmsResponse
{

    public array $messageId;

    public function __construct($messageId)
    {
        $this->messageId = $messageId;
    }

}
