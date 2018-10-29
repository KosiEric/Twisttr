if (!String.format) {
    String.format = function(format) {
        var args = Array.prototype.slice.call(arguments, 1);
        return format.replace(/{(\d+)}/g, function(match, number) {
            return typeof args[number] != 'undefined'
                ? args[number]
                : match
                ;
        });
    };
}


self.seconds = 05;
self.minutes = 1;
self.end = false;

self.data = "";
self.time = "";

self.secondsString = "";
self.minutesString = "";


self.onmessage = function (ev) {


    self.counterInterval = setInterval(function () {

        self.seconds -= 1;
        if(self.seconds == -1){

            self.minutes -= 1;
            if(self.minutes == -1){
                self.end = true;
                clearInterval(self.counterInterval);
                self.seconds =0;
                self.minutes =0;
            }

            else {
                self.seconds = 59;
            }
        }

     self.time = function () {

            self.secondsString = (self.seconds >= 10)? self.seconds : "0" + self.seconds;
            self.minutesString = (self.minutes >= 10) ? self.minutes : "0" + self.minutes;
            return String.format("{0}:{1}" , self.minutesString , self.secondsString);
     };


     self.postMessage(JSON.stringify({"end" : self.end , "time" : self.time()}));




    } , 1700);


};