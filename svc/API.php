<?php

/**
 * Description of API
 *
 * @author mark
 */
class API {

    private $gift = '';

    /**
     * curl_init request
     * @param type $url
     * @param type $fields
     */
    public function setGift($url, $fields) {
        $param = '';
        foreach ($fields as $name => $value) {
            $param .= urlencode($name) . '=' . urlencode($value) . '&';
        }

        $param = substr($param, 0, strlen($param) - 1);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . $param);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $this->gift = curl_exec($ch);
        curl_close($ch);
    }

    /**
     * get JSON
     * @return type
     */
    public function getGift() {
        return $this->gift;
    }

}

?>
