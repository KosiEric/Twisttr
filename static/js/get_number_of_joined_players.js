function request (url , data , callback) {

    var xhr = (typeof XMLHttpRequest !== 'undefined') ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");




    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            callback(this.responseText);
        }
    }


    xhr.open("POST", url , true);
    xhr.setRequestHeader("Content-type" , "application/x-www-form-urlencoded");
    xhr.send("data="+data);


}

self.onmessage = function (ev) {

    setInterval(function () {


        req = JSON.parse(ev.data);
        request( req.file , JSON.stringify(req) , function (resp) {

            postMessage(resp);
        });


    } , 2000);

}




