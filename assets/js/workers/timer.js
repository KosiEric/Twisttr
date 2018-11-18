self.onmessage = function (ev) {

    self.data = JSON.parse(ev.data);

    var interval = setInterval(function () {

        self.postMessage(JSON.stringify({"send" : true}));
    } , self.data.seconds * 1000);
};