<?php

require_once dirname(__FILE__).'/vendor/phpunit/phpunit/PHPUnit/Autoload.php';
require_once dirname(__FILE__).'/index.php';

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
