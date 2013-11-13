/**
 * The content of this project is licensed under the 
 * Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0) 
 * http://creativecommons.org/licenses/by-nc/3.0/
 * 
 * @author mark
 */

Gifts = {
    save: function(obj, gift_uuid, action, method) {

        var params = {
            shop_uuid: '27bb3bf8-f7a2-49e9-8445-9d062c7d3871',
            shop_token: 'f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2'
        };

        var inputs = document.getElementById('gift__' + gift_uuid).elements;
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].type == 'checkbox') {
                if (inputs[i].checked) {
                    params[inputs[i].name] = inputs[i].value;
                }
            } else if (inputs[i].type != 'submit') {
                params[inputs[i].name] = inputs[i].value;
            }

        }
        
        obj.innerText = 'Load...';

        ajax(gift_uuid, action, method, params, {
            oncomplete: function(response) {
                location.reload();
            }
        })
    }
};



function ajax(gift_uuid, action, method, params, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, 'https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts/' + gift_uuid + '/' + action);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {

            if (callback.oncomplete instanceof Function) {
                alert(this.responseText);
                callback.oncomplete(JSON.parse(this.responseText));
            }
            else {
                alert('Status: ' + this.status + '\nHeaders: ' + JSON.stringify(this.getAllResponseHeaders()) + '\nBody: ' + this.responseText);
            }
        }
    };
    xhr.send(JSON.stringify(params));
}