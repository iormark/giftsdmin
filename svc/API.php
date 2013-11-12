<?php

/**
 * Description of GiftsClass
 *
 * @author mark
 */
class API {

    public function getGifts() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts?offset=0&limit=1&shop_uuid=27bb3bf8-f7a2-49e9-8445-9d062c7d3871&shop_token=f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        curl_close($ch);

        //var_dump(json_decode($response));
        return json_decode($response);
        
    }

}

?>
