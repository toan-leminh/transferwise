<?php

namespace libs;

/**
 * Created by PhpStorm.
 * User: leminhtoan
 * Date: 5/23/17
 * Time: 18:59
 */
class CurlApi
{
    /**
     * Use curl to call API, json decode response
     * @param $url
     * @param $data
     * @param $type
     * @param $method
     * @param  $header
     * @param $timeout
     * @return bool|mixed
     */
    public static function call($url, $data, $header=["Accept-type: application/json"], $method = 'GET', $timeout=10000)
    {
        $ch = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($ch, CURLOPT_POST, 1);

                if ($data){
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case "PUT":
                curl_setopt($ch, CURLOPT_PUT, 1);
                if ($data){
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case "DELETE":
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                if ($data){
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                }
                break;
            default:
                if ($data){
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        if($timeout){
            curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeout);  // Set timeout 1000ms
        }
        if($header && is_array($header) && count($header)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        // Log request
        Log::info("API Request: ". $url . "\n" . print_r($data, true));

        $response = curl_exec($ch);

        // Log response
        Log::info("API Response: ".$url . "\n" . print_r($response, true));

        curl_close($ch);

        return $response ? json_decode($response, true) : false;
    }
}