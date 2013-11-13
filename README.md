giftsdmin
=========

Содержание этого проекта под лицензией Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0) http://creativecommons.org/licenses/by-nc/3.0/

Данные для API:
-------------

Токен и UUID магазина, указывать непосредственно в коде:

- [gifts.php][gifts]

```php
$fields = array(
   'offset' => 0,
   'limit' => 20,
   'shop_uuid' => '27bb3bf8-f7a2-49e9-8445-9d062c7d3871',
   'shop_token' => 'f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2',
);
```

- [giftsdmid.js][giftsdmid]
```js
var params = {
   shop_uuid: '27bb3bf8-f7a2-49e9-8445-9d062c7d3871',
   shop_token: 'f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2'
};
```

[gifts]: /page/gifts.php
[giftsdmid]: /giftsdmid.js