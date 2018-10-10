importScripts('/static/js/request.js');


self.start = 0;


self.onmessage = function (ev) {

    setInterval(function () {


       var  req = JSON.parse(ev.data);
       req.start = self.start;
        request( req.file , JSON.stringify(req) , function (resp) {
            var respObj = JSON.parse(resp);
            self.start = Number(respObj.start);
            postMessage(resp);
        });


    } , 4000);

}




