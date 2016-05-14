<?php
/**
 * Created by PhpStorm.
 * User: radudalbea
 * Date: 5/14/16
 * Time: 3:59 PM
 */

return [
    'supportsCredentials' => true,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['Content-Type', 'Accept', 'Origin', 'Authorization'],
    'allowedMethods' => ['GET', 'POST', 'PUT',  'DELETE', 'OPTIONS'],
    'exposedHeaders' => [],
    'maxAge' => 0,
    'hosts' => [],
];