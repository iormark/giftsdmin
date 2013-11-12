<?php

require_once '../vendor/phpunit/phpunit/PHPUnit/Autoload.php';
require_once '../index.php';

/**
 * Description of Index
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
