
<link rel="stylesheet" type="text/css" media="screen and (max-width:612px)" href="chatfiles/chatstyle_mini.css" />
<link rel="stylesheet" type="text/css"  media="screen and (min-width:612px)" href="chatfiles/chatstyle.css"/>
<div id="chatarea">
 <div id="chatrooms">
<?php
include('chatfiles/setchat.php');
echo $chatS->chatRooms();          // add the chat rooms
?>
 </div>
 <div id="chatwindow"><div id="chats"></div><div id="chatusers"></div></div>
    <span id="number-of-users">Online : <span id="num-online-count">0</span></span>
<div id="playchatbeep"><img src="chatex/playbeep2.png" width="25" height="25" alt="chat beep" id="playbeep" onclick="setPlayBeep(this)" /><span id="chatbeep"></span></div>
<?php echo $chatS->chatForm().jsTexts($lsite); ?>
<script type="text/javascript" src="chatfiles/chatfunctions.js"></script><noscript><a href="http://coursesweb.net/php-mysql/" title="PHP-MySQL Course">PHP-MySQL Course</a></noscript>
</div>