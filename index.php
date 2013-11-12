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
        ini_set('display_errors','On'); 
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
        echo 'error';
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
            'API' => './svc/API.php',
            'NotFoundException' => './exception/NotFoundException.php',
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
            $template = $this->getTemplate($page);
            require self::LAYOUT_DIR . 'index.php';
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

    private function getTemplate($page) {
        return self::PAGE_DIR . $page . '.php';
    }

    private function hasTemplate($page) {
        return file_exists($this->getTemplate($page));
    }

}

$index = new Index();
$index->init();
$index->run();
?>
