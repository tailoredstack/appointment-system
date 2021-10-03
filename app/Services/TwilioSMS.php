<?php

namespace App\Services;

use App\Config\TwilioConfig;
use BadMethodCallException;
use Illuminate\Support\Facades\Log;
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
        $this->config = new TwilioConfig(env('TWILIO_SID'), env('TWILIO_TOKEN'), env('TWILIO_SMS_NUMBER'), env('TWILIO_SERVICE_SID'));
        $this->client = new Client($this->config->sid, $this->config->token);
    }

    // public function __call($method, $args)
    // {
    //     if (method_exists($this->client->messages, $method)) {
    //         return call_user_func(array($this->client->messages, $method), $args);
    //     } else {
    //         throw new BadMethodCallException();
    //     }
    // }

    public function send(string $to, string $message)
    {
        Log::debug("Sending sms to {$to} {$message} from {$this->config->sms_number} with message {$message}");
        $this->client->messages->create($to, [
            'from' => $this->config->sms_number,
            'body' => $message,
            'messagingServiceSid' => $this->config->service_sid
        ]);
    }
}
