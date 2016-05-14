<?php
namespace app\Api;

/**
 * @method createCustomer($customerObject)
 * @method getCustomerInformation($AvangateCustomerReference = 0, $ExternalCustomerReference = '')
 * @method placeOrder($orderObject)
 * @method getOrder($refNo)
 * @method addProduct($productObject)
 * @method getProductByCode($productCode)
 * @method addSubscription($subscriptionObject)
 * @method getSubscription($subscriptionCode)
 */
class AvangateJsonrpcClient
{
    protected static $merchantCode;
    protected static $loginDate;
    protected static $hash;
    protected static $baseUrl;
    protected static $callCount = 0;
    public static $sessionId = '';

    public static function setCredentials($code, $key)
    {
        static::$merchantCode = $code;
        static::$loginDate = gmdate('Y-m-d H:i:s');
        static::$hash = hash_hmac('md5', strlen($code) . $code . strlen(static::$loginDate) . static::$loginDate, $key);
        static::$sessionId = static::login();
    }

    public static function setBaseUrl($url)
    {
        static::$baseUrl = $url;
    }

    public static function login()
    {
        $requestObject = new \stdClass();
        $requestObject->jsonrpc = '2.0';
        $requestObject->method = 'login';
        $requestObject->params = [static::$merchantCode, static::$loginDate, static::$hash];
        $requestObject->id = static::$callCount++;

        return static::doRequest($requestObject);
    }

    public static function __callStatic($name, $arguments = [])
    {
        $requestObject = static::getPreparedRequest($name, $arguments);
        $responseObject = static::doRequest($requestObject);

        return $responseObject;
    }

    public static function doRequest($requestObject)
    {
        $curl = curl_init(static::$baseUrl);

        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSLVERSION, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_PROXY, '');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $requestString = json_encode($requestObject);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $requestString);

        $responseString = curl_exec($curl);

        if (!empty($responseString)) {
            $response = json_decode($responseString);
            if (isset($response->result)) {
                return $response->result;
            }

            if (isset($response->error) && !is_null($response->error)) {
                throw new \Exception($requestObject->method . ': ' . json_encode($response->error));
            }
        }
    }

    protected static function getPreparedRequest($name, array $arguments = [])
    {
        array_unshift($arguments, static::$sessionId);

        $jsonRpcRequest = new \stdClass();
        $jsonRpcRequest->jsonrpc = '2.0';
        $jsonRpcRequest->method = $name;
        $jsonRpcRequest->params = $arguments;
        $jsonRpcRequest->id = static::$callCount++;

        return $jsonRpcRequest;
    }
}
