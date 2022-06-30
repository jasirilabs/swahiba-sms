<?php

namespace JasiriLabs\SigmaSMS;

class Config
{
    /**
     * @var array
     */
    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function get(string $key, $default = null)
    {
        return $this->options[$key] ?? $default;
    }

    public function extend(array $options): Config
    {
        return new Config(array_merge($this->options, $options));
    }

    public function withDefaults(array $defaults): Config
    {
        return new Config($this->options + $defaults);
    }
}
