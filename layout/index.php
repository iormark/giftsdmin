<?php
/**
 * The content of this project is licensed under the 
 * Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0) 
 * http://creativecommons.org/licenses/by-nc/3.0/
 * 
 * @author mark
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>GiftDmin - панель администрации.</title>
        <link href="giftsdmid.css?1" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="giftsdmid.js?1"></script>
        <meta property="boomstarter:shop_uuid" content="27bb3bf8-f7a2-49e9-8445-9d062c7d3871">
        <meta property="boomstarter:shop_key" content="e400ede5e3">
    </head>
    <body>
        <div id="bar">
            <a href="/">Главная</a> | &nbsp; &nbsp;
            <a href="?q=gifts">Все</a>
            <a href="?q=gifts&fil=pending">В ожидании</a>
            <a href="?q=gifts&fil=shipping">В доставке</a>
            <a href="?q=gifts&fil=delivered">Доставлены</a>
        </div>

        <div style="margin-bottom: 2em;">
            <?php require $template; ?>
        </div>
        

        <div style="clear: both;">
            <a href="#" product-id="3335" boomstarter-button-style="glassy">Хочу в подарок</a>
        </div>
        
        <script type="text/javascript" src="//boomstarter.ru/assets/gifts/api/v1.js" async></script>
        
    </body>
</html>
