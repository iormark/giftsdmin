<?php

require_once '../vendor/phpunit/phpunit/PHPUnit/Autoload.php';
require_once '../svc/API.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APITest
 *
 * @author mark
 */
class APITest extends PHPUnit_Framework_TestCase {
    
    function test() {
        $fields = array(
            'offset' => 0,
            'limit' => 20,
            'shop_uuid' => '27bb3bf8-f7a2-49e9-8445-9d062c7d3871',
            'shop_token' => 'f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2',
        );
        $a = new API();
        $a->setGift('https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts?', $fields);
        print $a->getGift();
    }

}

?>
