<?php

require_once '../vendor/phpunit/phpunit/PHPUnit/Autoload.php';
require_once '../svc/myCurl.php';

/**
 * Description of Index
 *
 * @author mark
 */
class myCurlTest extends PHPUnit_Framework_TestCase {

    function test() {
        $api = new myCurl('https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts');
        $api->createCurl();

        $fields = array(
            'offset' => 0,
            'limit' => 20,
            'shop_uuid' => '27bb3bf8-f7a2-49e9-8445-9d062c7d3871',
            'shop_token' => 'f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2',
        );

        

        echo json_encode($fields);
        $api->setGet(json_encode($fields));
        echo ($api->tostring());



        //$this->assertTrue(true);
    }

}

?>