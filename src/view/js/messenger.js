/**
 * Created by TD on 2015-08-16.
 */
(function(window, document){

    var websocket;

    $(function(){
        $('.btn_login').on('click', function(){
            var wsUri = "ws://localhost:9000/ChatServer.php";
            var websocket = new WebSocket(wsUri);
            var email = $('.email_box .email').val();

            if(email) {
                websocket.onopen = function(message) {
                    $('.login').hide(0);
                    $('.chat').fadeIn(500);

                    //초기 정보 전송
                    var init_info = {
                        user_info : email,
                        name : 'LG CNS',
                        type : 'init'
                    };
                    websocket.send(JSON.stringify(init_info));

                    //핸들링
                    $('.btn_send').on('click', function() {
                        var text = $( '.send_box textarea' ).val();
                        var message = {
                            user_info : email,
                            type : 'msg',
                            text : text
                        };
                        if(text) {
                            websocket.send(JSON.stringify(message));
                            $( '.send_box textarea' ).val('');
                        }
                    });

                };

                websocket.onerror = function(message) {
                    console.log('ERROR : ' + event);
                };

                websocket.onmessage = function(message) {
                    var data = JSON.parse(message.data);
                    var image_data;
                    if(data.sender == email) {
                        image_data = data.img_type_yellow;
                    } else {
                        image_data = data.img_type_white;
                    }
                    var html = '<img src="data:image/png;base64,' + image_data + '">';
                    $('.body').append(html);
                };

            }
        });

        $('.msg_container').perfectScrollbar();

    });


})(window, document);