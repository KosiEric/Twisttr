importScripts('/assets/js/request.js');



self.onmessage = function (ev) {




    req = JSON.parse(ev.data);
    request( req.file , JSON.stringify(req) , function (resp) {

        postMessage(resp);
    });



}




