importScripts('/assets/js/request.js');

self.onmessage = function (ev) {

    self.data = ev.data;
    self.data = JSON.parse(self.data);
    self.file = self.data.file;
    request(self.file , ev.data , function (t) {

        postMessage(t);

    } , "POST");


};