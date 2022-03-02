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
        $phone_no = '';
        if (starts_with($to, '09')) {
            $phone_no = str_replace('09', '+639', $to);
        }


        $this->client->messages->create($phone_no, [
            'body' => $message,
            'messagingServiceSid' => $this->config->service_sid
        ]);
    }
}
