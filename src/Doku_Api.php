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
        $data['req_basket'] = Library::formatBasket($data['req_basket']);

        return self::getResponse(Doku::getPrePaymentUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function doPayment($data)
    {
        $data['req_basket'] = Library::formatBasket($data['req_basket']);

        return self::getResponse(Doku::getPaymentUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function doDirectPayment($data)
    {
        return self::getResponse(Doku::getDirectPaymentUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function doGeneratePaycode($data)
    {
        return self::getResponse(Doku::getGenerateCodeUrl(), $data);
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
}
