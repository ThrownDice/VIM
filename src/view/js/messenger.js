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

                    $('.btn_upload').on('click', function() {

                        $('.form_upload .user_info').val(email);
                        var fd = new FormData($('.form_upload')[0]);

                        $.ajax({
                            url: '/messenger',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: fd
                        }).done(function( data ) {
                            console.log(data);
                            var result = JSON.parse( data );
                            if(result.status === 'success' ) {
                                var message = {
                                    user_info : email,
                                    type : 'img',
                                    file : result.file
                                };
                                websocket.send(JSON.stringify(message));
                                $('.upload').hide(0);
                                $('.chat').fadeIn(500);
                            } else {
                                console.log('upload fail');
                            }
                        }).fail(function( data) {
                            console.log('upload fail');
                        });
                    });

                };

                websocket.onerror = function(message) {
                    console.log('ERROR : ' + event);
                };

                websocket.onmessage = function(message) {
                    var data = JSON.parse(message.data);
                    if(data.type == 'msg') {
                        var image_data;
                        if(data.sender == email) {
                            image_data = data.img_type_yellow;
                        } else {
                            image_data = data.img_type_white;
                        }
                        var html = '';
                        if(data.sender == email) {
                            html = '<div class="node my">' +
                                '<div class="node_header"> <img src="view/img/default_usr_icon.jpg" width="40">' + data.sender + ' </div> ' +
                                '<div class="node_contents"> ' +  '<img src="data:image/png;base64,' + image_data + '">' + '</div>' +
                                '</div>';
                        } else {
                            html = '<div class="node">' +
                                '<div class="node_header"> <img src="view/img/default_usr_icon.jpg" width="40">' + data.sender + ' </div> ' +
                                '<div class="node_contents"> ' +  '<img src="data:image/png;base64,' + image_data + '">' + '</div>' +
                                '</div>';
                        }
                        $('.body').append(html);
                    } else if(data.type == 'img') {
                        var image_data = data.img;
                        var html = '';
                        if(data.sender == email) {
                            html = '<div class="node my">' +
                                '<div class="node_header"> <img src="view/img/default_usr_icon.jpg" width="30">' + data.sender + ' </div> ' +
                                '<div class="node_contents"> ' +  '<img src="data:image/png;base64,' + image_data + '">' + '</div>' +
                                '</div>';
                        } else {
                            html = '<div class="node">' +
                                '<div class="node_header"> <img src="view/img/default_usr_icon.jpg" width="30">' + data.sender + ' </div> ' +
                                '<div class="node_contents"> ' +  '<img src="data:image/png;base64,' + image_data + '">' + '</div>' +
                                '</div>';
                        }
                        $('.body').append(html);
                    }
                };

            }
        });

        $('.btn_select_file').on('click', function() {
            $('.chat').hide(0);
            $('.upload').fadeIn(500);
        });

        $('.chat .body').perfectScrollbar();

    });


})(window, document);