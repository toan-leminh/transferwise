<?php
/**
 * Created by PhpStorm.
 * User: leminhtoan
 * Date: 7/15/17
 * Time: 20:54
 */

require_once 'common/config.php';
use \libs\FunctionUtil;
use \libs\Transferwise;

// Get data from GET
$source = FunctionUtil::fetchKey($_GET, 'source');
$target = FunctionUtil::fetchKey($_GET, 'target');
$amount = FunctionUtil::fetchKey($_GET, 'amount');

// Call Transferwise API to get temporary quotes
$result = Transferwise::temporaryQuotes($source, $target, $amount);

// Return response
if($result){
    // Success
    if(empty($result['errors'])){
        $response = [
            'status' => [
                'code' => 0,
                'message' => 'OK'
            ],
            'data' =>[
                'fee' => $result['fee'],
                'targetAmount' => $result['targetAmount'],
                'sourceAmount' => $result['sourceAmount'],
            ]
        ];
    // Get error result from Transferwise API
    }else{
        $response = [
            'status' => [
                'code' => 1,
                'message' => $result['errors'][0]['message']
            ]
        ];
    }
// Cant get result from Transferwise
}else{
    $response = [
        'status' => [
            'code' => 2,
            'message' => "Can't get result from Transferwise"
        ]
    ];
}

echo json_encode($response);