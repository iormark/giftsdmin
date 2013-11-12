Gifts = {
    all: function() {
        ajax({
            oncomplete: function(response) {
                alert('callback');
            }
        })
    }
};



function ajax(callback) {
    var xhr = new XMLHttpRequest();
    //xhr.open('GET', 'https://private-92b2-boomstarter.apiary.io/api/v1.1/partners/gifts?shop_uuid=27bb3bf8-f7a2-49e9-8445-9d062c7d3871&shop_token=f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2');
    xhr.open('GET', '');
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
    xhr.send(null);

    //xhr.send("{ \"shop_uuid\":\"27bb3bf8-f7a2-49e9-8445-9d062c7d3871\", \"shop_token\": \"f9e3218e-4eb1-4c03-8e40-fa4b41a0a4b2\" }");
}