<?php

$uuid = '';
if (array_key_exists('uuid', $_GET)) {
    $uuid = $_GET['uuid'];
}
$filter = '';
if (array_key_exists('fil', $_GET)) {
    $filter = '/' . $_GET['fil'];
}
/*
  echo 'https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts' . $filter . '?'
  . 'offset=0&limit=10&shop_uuid=27bb3bf8-f7a2-49e9-8445-9d062c7d3871&'
  . 'shop_token=f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2<br>';
 */


https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts/

$api = new myCurl('https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts' . $filter . '?'
        . 'offset=0&limit=10&shop_uuid=27bb3bf8-f7a2-49e9-8445-9d062c7d3871&'
        . 'shop_token=f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2');
$api->createCurl();



if (array_key_exists('post', $_GET)) {

    $postFields = array(
        //'product_id' => $uuid,
        'order_id' => 101234567,
            //'shop_uuid' => '27bb3bf8-f7a2-49e9-8445-9d062c7d3871',
            //'shop_token' => 'f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2'
    );
    $api->setPost($postFields);
}

$gifts = Utils::objectToArray(json_decode($api->tostring()));
/*
  $gifts = Utils::objectToArray($api->getGifts($method,
  'https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts'.$filter.'?'
  . 'offset=0&limit=10&shop_uuid=27bb3bf8-f7a2-49e9-8445-9d062c7d3871&'
  . 'shop_token=f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2', 'application/json')); */
?>
