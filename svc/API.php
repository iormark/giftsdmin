<?php

/**
 * Description of GiftsClass
 *
 * @author mark
 */
class API {

    public function getGifts($method, $url, $contentType) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: ".$contentType));
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
        
    }

}

?>
