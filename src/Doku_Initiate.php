<?php

namespace gerizal\doku;

/**
 * Class Doku_Initiate
 *
 * @package gerizal\doku
 */
class Doku_Initiate
{
    public static $isProduction = false;
    //local
    const sandboxCheckStatus = 'https://staging.doku.com/Suite/CheckStatus';
    const sandboxPrePaymentUrl = 'https://staging.doku.com/api/payment/PrePayment';
    const sandboxPaymentUrl = 'https://staging.doku.com/api/payment/paymentMip';
    const sandboxDirectPaymentUrl = 'https://staging.doku.com/api/payment/PaymentMIPDirect';
    const sandboxGenerateCodeUrl = 'https://staging.doku.com/api/payment/doGeneratePaymentCode';

    //production
    const CheckStatus = 'https://pay.doku.com/Suite/CheckStatus';
    const prePaymentUrl = 'https://pay.doku.com/api/payment/PrePayment';
    const paymentUrl = 'https://pay.doku.com/api/payment/paymentMip';
    const directPaymentUrl = 'https//pay.doku.com/api/payment/PaymentMIPDirect';
    const generateCodeUrl = 'https://pay.doku.com/api/payment/doGeneratePaymentCode';

    public static $sharedKey; //doku's merchant unique key
    public static $mallId; //doku's merchant id

    public static function getPrePaymentUrl()
    {
        return Doku_Initiate::$isProduction ?
            Doku_Initiate::prePaymentUrl : Doku_Initiate::sandboxPrePaymentUrl;
    }

    public static function getPaymentUrl()
    {
        return Doku_Initiate::$isProduction ?
            Doku_Initiate::paymentUrl : Doku_Initiate::sandboxPaymentUrl;
    }

    public static function getDirectPaymentUrl()
    {
        return Doku_Initiate::$isProduction ?
            Doku_Initiate::directPaymentUrl : Doku_Initiate::sandboxDirectPaymentUrl;
    }

    public static function getGenerateCodeUrl()
    {
        return Doku_Initiate::$isProduction ?
            Doku_Initiate::generateCodeUrl : Doku_Initiate::sandboxGenerateCodeUrl;
    }

    public static function getStatusUrl()
    {
        return Doku_Initiate::$isProduction ?
            Doku_Initiate::sandboxPrePaymentUrl : Doku_Initiate::sandboxCheckStatus;
    }
}
