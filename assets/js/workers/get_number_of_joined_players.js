importScripts('/assets/js/request.js');


self.data = null;
self.getNumberOfJoinedPlayers = function getNumberOfJoinedPlayers () {

    request( self.data.file , JSON.stringify(self.data) , function (resp) {

        postMessage(resp);
    });

    var timeout =setTimeout('self.getNumberOfJoinedPlayers()' , 2000);
};

self.onmessage = function (ev) {


    self.data = JSON.parse(ev.data);

   // postMessage(self.data);

    self.getNumberOfJoinedPlayers();
};




