<?php

namespace App\Services;

use App\Config\TwilioConfig;
use Twilio\Rest\Client;

abstract class TwilioSMS
{
    /**
     * @var \Twilio\Rest\Client;
     */
    private $client;

    /**
     * @var \App\Config\TwilioConfig;
     */
    protected $config;

    public function __construct()
    {
        $this->config = new TwilioConfig(env('TWILIO_SID'), env('TWILIO_TOKEN'), env('TWILIO_SERVICE_SID'));
        $this->client = new Client($this->config->sid, $this->config->token);
    }

    public function send(string $to, string $message)
    {
        $this->client->messages->create($to, [
            'body' => $message,
            'messagingServiceSid' => $this->config->service_sid
        ]);
    }
}
