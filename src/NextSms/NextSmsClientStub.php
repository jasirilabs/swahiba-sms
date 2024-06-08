<?php

namespace JasiriLabs\SwahibaSms\NextSms;

use JasiriLabs\SwahibaSms\Config;

class NextSmsClientStub extends NextSmsClient
{
    private $stagedResults = [];
    private $stagedExceptions = [];

    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    public function stageResult($result)
    {
        $this->stagedResults[] = $result;
    }

    public function stageException($exception)
    {
        $this->stagedExceptions[] = $exception;
    }

    public function post(string $endpoint, array $data): array
    {
        if (!empty($this->stagedExceptions)) {
            throw array_shift($this->stagedExceptions);
        }

        return array_shift($this->stagedResults) ?? [];
    }

    public function get(string $endpoint, array $params = null): array
    {
        if (!empty($this->stagedExceptions)) {
            throw array_shift($this->stagedExceptions);
        }

        return array_shift($this->stagedResults) ?? [];
    }
}
