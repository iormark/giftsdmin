<?php

$filter = '';
if (array_key_exists('fil', $_GET)) {
    $filter = '/' . $_GET['fil'];
}


$api = new myCurl('https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts' . $filter . '?'
        . 'offset=0&limit=20&shop_uuid=27bb3bf8-f7a2-49e9-8445-9d062c7d3871&'
        . 'shop_token=f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2');
$api->createCurl();


/*
if (array_key_exists('post', $_GET)) {

    $postFields = array(
        'order_id' => mt_rand (10000001, 2147483647),
    );
    $api->setPost($postFields);
}
*/
$gifts = Utils::objectToArray(json_decode($api->tostring()));

?>
