importScripts('/assets/js/request.js');


self.getNumberOfJoinedPlayers = function getNumberOfJoinedPlayers (ev) {

    req = JSON.parse(ev.data);
    request( req.file , JSON.stringify(req) , function (resp) {

        postMessage(resp);
    });

    var timeout =setTimeout('self.getNumberOfJoinedPlayers()' , 2000);
};

self.onmessage = function (ev) {

    self.getNumberOfJoinedPlayers(ev);
};




