<?php
namespace app\Api;

use app\Api\AvangateJsonrpcClient as Client;

class ApiClient
{
    /**
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        Client::setBaseUrl('https://api.avangate.com/shopper/2.5/rpc/');
        Client::setCredentials($username, $password);
    }
}