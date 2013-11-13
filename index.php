<?php

/**
 * Description of Index
 *
 * @author mark
 */
class Index {

    const DEFAULT_PAGE = 'home';
    const PAGE_DIR = './page/';
    const LAYOUT_DIR = './layout/';

    /**
     * System config.
     */
    public function init() {
        ini_set('display_errors', 'On');
        error_reporting(E_ALL | E_STRICT);
        mb_internal_encoding('UTF-8');
        set_exception_handler(array($this, 'handleException'));
        spl_autoload_register(array($this, 'loadClass'));
        session_start();
    }

    /**
     * Exception handler.
     */
    public function handleException($ex) {
        $extra = array('message' => $ex->getMessage());
        if ($ex instanceof NotFoundException) {
            header('HTTP/1.0 404 Not Found');
            $this->runPage('404', $extra);
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            $this->runPage('500', $extra);
        }
    }

    /**
     * Class loader.
     */
    public function loadClass($name) {
        $classes = array(
            'Utils' => dirname(__FILE__).'/svc/Utils.php',
            'API' => './svc/API.php',
            'NotFoundException' => dirname(__FILE__).'/exception/NotFoundException.php',
        );
        if (!array_key_exists($name, $classes)) {
            die('Class "' . $name . '" not found.');
        }
        require_once $classes[$name];
    }

    /**
     * Run the application!
     */
    public function run() {
        $this->runPage($this->getPage());
    }

    private function runPage($page, array $extra = array()) {
        if ($this->hasTemplate($page)) {

            if ($this->hasScript($page)) {
                require $this->getScript($page);
            }

            $template = $this->getTemplate($page);
            if (!array_key_exists('ajax', $_GET)) {
                require self::LAYOUT_DIR . 'index.php';
            } else {
                require $template;
            }
        } else {
            throw new NotFoundException('Page "' . $page . '" not found');
        }
    }

    private function getPage() {
        $page = self::DEFAULT_PAGE;
        if (array_key_exists('q', $_GET)) {
            $page = $_GET['q'];
        }
        return $page;
    }

    private function getScript($page) {
        return self::PAGE_DIR . $page . '.php';
    }

    private function hasScript($page) {
        return file_exists($this->getScript($page));
    }

    private function getTemplate($page) {
        return self::PAGE_DIR . $page . 'Tpl.php';
    }

    private function hasTemplate($page) {
        return file_exists($this->getTemplate($page));
    }

}

$index = new Index();
$index->init();
$index->run();
?>
