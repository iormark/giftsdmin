<?php

$api = new API();
$gifts = objectToArray($api->getGifts());

foreach ($gifts['gifts'] as $gifts_key => $gifts_val) {
    echo 'Название: ' . $gifts_val['name'] . '<br>';
    echo 'Обязался: ' . $gifts_val['pledged'] . '<br>';

    if (!empty($gifts_val['location']['country']['name'])) {
        echo $gifts_val['location']['country']['name']. '<br>';
    }


    foreach ($gifts_val['owner'] as $owner_key => $owner_val) {
        echo ': ' . $owner_val . '<br>';
    }
}

echo '<br>';
echo '<br>';
echo '<hr>';
echo '<br>';

var_dump($gifts);

function objectToArray($d) {
    if (is_object($d)) {
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        return array_map(__FUNCTION__, $d);
    } else {
        return $d;
    }
}

?>
