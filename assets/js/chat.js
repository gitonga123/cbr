var instanse = false;
var state;
var mes;
var file;
function Chat() {
    this.update = updateChat;
    this.send = sendChat;
    this.getState = getStateOfChat;
}
function updateChats() {
    this.updateChat();
    this.check_in_box();
    this.count();
    this.check_out_box();
    this.check_out_important();
}

function getStateOfChat() {
    if (!instanse) {
        instanse = true;
        $.ajax({
            type: "POST",
            url: "converstation/hold_data",
            data: {'function': 'getState', 'file': file},
            dataType: "json",
            success: function (data) {
                state = data.state;
                instanse = false;
            }
        });
    }
}
function count() {
    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/welcome/count_inbox',
        data: {},
        type: 'post'
    });

    srvRqst.done(function (response) {
        $('.inbox_size').html(response);
    });
}
function updateChat() {
    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/welcome/print_messages',
        data: {},
        type: 'post'
    });

    srvRqst.done(function (response) {
        $('div.chat_result').html(response);
    });
}

function check_in_box() {
    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/welcome/inbox',
        data: {},
        type: 'post'
    });

    srvRqst.done(function (response) {
        $('div.read-inbox').html(response);
    });
}

function check_out_box() {
    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/welcome/get_sent_mail',
        data: {},
        type: 'post'
    });

    srvRqst.done(function (response) {
        $('div.read_outbox').html(response);
    });
}

function check_out_important() {
    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/welcome/get_important',
        data: {},
        type: 'post'
    });

    srvRqst.done(function (response) {
        $('div.read_important').html(response);
    });
}

function display_name() {
    console.log('Daniel Mutwiri');
}
//
//
//function updateChat() {
//    if (!instanse){
//        instanse = true;
//        $.ajax({
//            type: "POST",
//            url: "converstation/hold_data",
//            data: {'function': 'update', 'state': state, 'file': file},
//            dataType: "json",
//            success: function(data) {
//                if (data.text){
//                    for (var i = 0; i < data.text.length; i++) {
//                    $('#chat-area').append($(""+ data.text[i] +""));
//                    }
//                }
//                document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
//                        instanse = false;
//                        state = data.state;
//                }
//        });
//    }
//    else {
//        setTimeout(updateChat, 1500);
//        }
//}


function sendChat(message, nickname) {
    updateChat();
    $.ajax({
        type: "POST",
        url: "converstation/hold_data",
        data: {'function': 'send', 'message': message, 'nickname': nickname, 'file': file},
        dataType: "json",
        success: function (data) {
            updateChat();
        }
    });
}
