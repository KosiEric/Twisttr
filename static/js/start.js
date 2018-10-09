
function GameRoom() {

    parent = this
    this.messages = $('.messages-content');
    this.messageInput = $('.message-input');
    var     d, h, m,
        i = 0;
    this.messages.mCustomScrollbar();
    setTimeout(function () {
        parent.fakeMessage();
    }, 100);

        this.updateScrollbar = function () {
            parent.messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
                scrollInertia: 10,
                timeout: 0
            });
        };

        this.setDate = function setDate() {
            d = new Date()
            if (m != d.getMinutes()) {
                m = d.getMinutes();
                $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
            }
        }

         this.insertMessage =  function() {
            msg = parent.messageInput.val();
            if ($.trim(msg) == '') {
                return false;
            }


            $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
            parent.setDate();
            parent.messageInput.val(null);
            parent.updateScrollbar();
            setTimeout(function () {
                fakeMessage();
            }, 1000 + (Math.random() * 20) * 100);
        };

        $('.message-submit').click(function () {
            insertMessage();
        });

        $(window).on('keydown', function (e) {
            if (e.which == 13) {
                parent.insertMessage();
                return false;
            }
        });

        var Fake = [
            'Hi there, I\'m Fabio and you?',
            'Nice to meet you',
            'How are you?',
            'Not too bad, thanks',
            'What do you do?',
            'That\'s awesome',
            'Codepen is a nice place to stay',
            'I think you\'re a nice person',
            'Why do you think that?',
            'Can you explain?',
            'Anyway I\'ve gotta go now',
            'It was a pleasure chat with you',
            'Time to make a new codepen',
            'Bye',
            ':)'
        ];

        this.fakeMessage = function () {
            if (parent.messageInput.val() != '') {
                return false;
            }
            $('<div class="message loading new"><figure class="avatar"><img src="/static/img/favicon.png" /></figure><span></span></div>').appendTo($('.mCSB_container'));
            parent.updateScrollbar();

            setTimeout(function () {
                $('.message.loading').remove();
                $('<div class="message new"><figure class="avatar"><img src="/static/img/favicon.png" /></figure>' + Fake[i] + '</div>').appendTo($('.mCSB_container')).addClass('new');
                parent.setDate();
                parent.updateScrollbar();
                i++;
            }, 1000 + (Math.random() * 20) * 100);

        }




}

$(document).ready(function (a) {

    var gameRoom = new GameRoom();
})