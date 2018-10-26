importScripts('/assets/js/request.js');



self.onmessage = function (ev) {

    setInterval(function () {


        req = JSON.parse(ev.data);
        request( req.file , JSON.stringify(req) , function (resp) {

            postMessage(resp);
        });


    } , 2000);

}




