<?php

require_once '/home/travis/build/iormark/giftsdmin/vendor/phpunit/phpunit/PHPUnit/Autoload.php';
require_once '/home/travis/build/iormark/giftsdmin/svc/API.php';

/**
 * The content of this project is licensed under the 
 * Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0) 
 * http://creativecommons.org/licenses/by-nc/3.0/
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
        
    }

}

?>
