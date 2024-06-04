<?php

declare(strict_types=1);

namespace JasiriLabs\SwahibaSms;

class SendSmsResponse
{

    public array|string $messageId;

    public function __construct(array|string $messageId)
    {
        $this->messageId = $messageId;
    }

}
