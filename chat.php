<div id="chatarea">
 <div id="chatrooms">
<?php
include('chatfiles/setchat.php');
echo $chatS->chatRooms();          // add the chat rooms
?>
 </div>
 <div id="chatwindow"><div id="chats"></div><div id="chatusers"></div></div>

<div id="playchatbeep"><img src="chatex/playbeep2.png" width="25" height="25" alt="chat beep" id="playbeep" onclick="setPlayBeep(this)" /><span id="chatbeep"></span></div>
<?php echo $chatS->chatForm().jsTexts($lsite); ?>
    <div class="btn-group" id="online-chat-users"><button class="btn btn-primary" id="number-of-users">Online : </button><button type="button" class="btn btn-primary" id="num-online-count">0</button></div>
    <noscript><a href="http://coursesweb.net/php-mysql/" title="PHP-MySQL Course">PHP-MySQL Course</a></noscript>
</div>