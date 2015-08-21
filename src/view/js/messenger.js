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
                    $('.btn_send').on('click', function() {
                        var text = $( '.send_box textarea' ).val();
                        var message = {
                            user_info : email,
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

                };

            }
        });

        $('.msg_container').perfectScrollbar();

    });


})(window, document);