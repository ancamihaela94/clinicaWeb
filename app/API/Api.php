<?php

namespace App\API;

use PhpSpec\Exception\Exception;
use GuzzleHttp\Client;

class Api
{

    private  $host;
    private $client;


    /**
     * Api constructor.
     */
    public function __construct()
    {

        $this->setHost();

        $this->client = new Client(['base_uri' => $this->host.'api/v1/']);

    }

    private function setHost()
    {
        $this->host = getenv('API_HOST');
        if (!$this->host){
            throw new Exception('host exception');
        }
    }


}