<?php

namespace App\Twig;

class BaseTemplateService 
{
    protected $client;
    protected $whoIs;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->whoIs();
    }

    public function whoIs()
    {
        $response = $this->client->request('GET', 'http://api.test/v2/whois/minhasuperloja');
        $this->whoIs = json_decode($response->getBody(), true);
    }

    public function categories()
    {
       return $this->whoIs['data']['categories'];
    }
}
