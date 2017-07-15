<?php
/**
 * Created by PhpStorm.
 * User: leminhtoan
 * Date: 7/8/17
 * Time: 09:52
 */
namespace libs;

class Transferwise
{
    const TEMPORARY_QUOTE   = ["path" => "/v1/quotes", "method" => "GET"];

    /**
     * Create auth header for majin
     * @return array
     */
    public static function header(){
        return [
            "Accept-type: application/json"
        ];
    }

    /**
     * Call Transferwise API by Curl
     *
     * @param $setting
     * @param $body
     * @param $header
     * @return bool|mixed
     */
    public static function callApi($setting, $body, $header = null){
        if(!$header){
            $header = self::header();
        }

        $url = TRANSFERWISE_URL . $setting['path'];
        $method = $setting['method'];
        return CurlApi::call($url, $body, $header, $method);
    }

    /**
     * Get Temporary Quote
     * Request: GET /v1/quotes?source=EUR&target=SEK&targetAmount=15500&rateType=FIXED
     * Response:
            "source": "EUR",
            "target": "SEK",
            "sourceAmount": 1648.41,
            "targetAmount": 15500,
            "type": "REGULAR",
            "rate": 9.45,
            "createdTime": "2017-02-17T13:57:38.174Z",
            "createdByUserId": 0,
            "rateType": "FIXED",
            "deliveryEstimate": "2017-02-19T17:56:00Z",
            "fee": 8.2,
            "allowedProfileTypes": [
            "PERSONAL",
            "BUSINESS"
            ],
            "guaranteedTargetAmount": false,
            "ofSourceAmount": false
     *  Documents: https://api-docs.transferwise.com/v1/api-guides/how-to-use-non-persistent-quotes
     * @param integer $source Source currency
     * @param integer $target Target currency
     * @param integer $amount
     * @return null|array
     */
    public static function temporaryQuotes($source, $target, $amount){
        $data = [
            'source' => $source,
            'target' => $target,
            'targetAmount' => $amount,
            'rateType'  => 'FIXED'
        ];

        return self::callApi(self::TEMPORARY_QUOTE, $data);
    }
}