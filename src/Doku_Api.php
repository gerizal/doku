<?php

namespace gerizal\doku;

use GuzzleHttp\Client;

/**
 * Class Api
 * Api for DOKU communications
 *
 * @package gerizal\doku
 */
class Doku_Api
{
    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function doPrePayment($data)
    {
        $data['req_basket'] = Doku_Library::formatBasket($data['req_basket']);

        return self::getResponse(Doku_Initiate::getPrePaymentUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function doPayment($data)
    {
        $data['req_basket'] = Doku_Library::formatBasket($data['req_basket']);

        return self::getResponse(Doku_Initiate::getPaymentUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function doDirectPayment($data)
    {
        return self::getResponse(Doku_Initiate::getDirectPaymentUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function doGeneratePaycode($data)
    {
        return self::getResponse(Doku_Initiate::getGenerateCodeUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function checkStatus($data)
    {
        return self::getHostedResponse(Doku_Initiate::getStatusUrl(), $data);
    }

    /**
     * @param $url
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */

    private static function getResponse($url, $data)
    {
        $client = new Client();
        $response = $client->post($url, [
            'form_params' => ['data' => json_encode($data)],
        ]);

        return $response;
    }

    /**
     * @param $url
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */

    private static function getHostedResponse($url, $data)
    {
        $client = new Client();
        $response = $client->post($url, [
            'form_params' => $data,
        ]);

        return $response->getBody();
    }
}
