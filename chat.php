<?php require_once  $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
$website_details = new WebsiteDetails();
?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">
<head>
    <title><?php echo $website_details->SiteName?> Chat with members</title>
    <script type="text/javascript">
        (function(d) {
            var cwjs, id='chatwing-js';  if(d.getElementById(id)) {return;}
            cwjs = d.createElement('script'); cwjs.type = 'text/javascript'; cwjs.async = true; cwjs.id = id
            cwjs.src = "//chatwing.com/code/2d678d60-ce65-11e8-ab30-8d005bebebc5/embedded";
            d.getElementsByTagName('head')[0].appendChild(cwjs);
        })(document);
    </script>
    </head>
<body style="margin:0px;padding:0px;overflow:hidden">
<!-- Begin chatwing.com chatbox -->
<iframe src="https://chatwing.com/chatbox/2d678d60-ce65-11e8-ab30-8d005bebebc5" frameborder="0" scrolling="yes" seamless="seamless" style="display:block; width:100%; height:100vh;">Please contact us at info@chatwing.com if you cant embed the chatbox</iframe>
<!-- End chatwing.com chatbox -->

</body>
</html>