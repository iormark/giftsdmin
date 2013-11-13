<?php

$filter = '';
if (array_key_exists('fil', $_GET)) {
    $filter = '/' . $_GET['fil'];
}

$api = new API();

$fields = array(
    'offset' => 0,
    'limit' => 20,
    'shop_uuid' => '27bb3bf8-f7a2-49e9-8445-9d062c7d3871',
    'shop_token' => 'f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2',
);

$api->setGift('https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts' . $filter . '?', $fields);
$gifts = Utils::objectToArray(json_decode($api->getGift()));
?>
