<?php

require_once '/home/travis/build/iormark/giftsdmin/vendor/phpunit/phpunit/PHPUnit/Autoload.php';
require_once '/home/travis/build/iormark/giftsdmin/index.php';

/**
 * The content of this project is licensed under the 
 * Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0) 
 * http://creativecommons.org/licenses/by-nc/3.0/
 *
 * @author mark
 */
class IndexTest extends PHPUnit_Framework_TestCase {

    function testRun() {
        $index = new Index;
        $index->init();
        $index->run();
        $this->assertTrue(true);
    }

}

?>
