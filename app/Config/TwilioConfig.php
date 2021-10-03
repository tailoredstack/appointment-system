<?php

namespace App\Config;

class TwilioConfig
{
    private $config = [];

    public function __construct(string $sid, string $token, string $sms_number)
    {
        $this->config['sid'] = $sid;
        $this->config['token'] = $token;
        $this->config['sms_number'] = $sms_number;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->config)) {
            return $this->config[$key];
        }

        return null;
    }
}
