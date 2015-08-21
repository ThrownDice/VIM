/**
 * Created by TD on 2015-08-16.
 */
(function(window, document){
    var websocket;

    $(function(){
        $('.enter').on('click', function(){
            var wsUri = "ws://104.131.164.76:9000/chat.php";
            var websocket = new WebSocket(wsUri);
            var email = $('.input_email').val();

            if(email) {
                websocket.onopen = function(message) {
                    //websocket.send(JSON.stringify(user_info));
                    $('.login').fadeOut(500);
                    $( '.chat' ).css( 'display' , 'block' );
                    $( '.msg_container' ).css( 'display', 'block' );
                    $( '.usr_container' ).css( 'display', 'block' );

                    $( '.btn_container .btn').on('click', function() {
                        var text = $( '.input_container textarea' ).val();
                        var message = {
                            user_info : email,
                            text : text
                        };
                        if(text) {
                            websocket.send(JSON.stringify(message));
                        }
                    });
                };

                websocket.onerror = function(message) {
                    console.log('ERROR : ' + event);
                };

                websocket.onmessage = function(message) {
                    console.log(message);
                    var data = JSON.parse(message.data);
                    if( data.type === 'system' ) {
                        var html = $('.msg_container').html() + '<div class="system">' +
                            data.text + '</div>';
                        $('.msg_container').html(html);
                    } else if ( data.type === 'img') {
                        if( data.user_info != email ) {
                            $.ajax({
                                url: '/watermark.php',
                                data: {
                                    original: data.img,
                                    user_info: data.user_info
                                },
                                type: 'post'
                            }).done(function( response ) {
                                var result = JSON.parse(response);
                                console.log(response);
                                if(result.status === 'success'){
                                    var html = $('.msg_container').html() + '<div class="msg_node">' +
                                        '<div class="header">' +
                                        '<img src="img/usr_icon.jpg" width="30">&nbsp;' +
                                        data.user_info +
                                        '</div>' +
                                        '<div class="message">' +
                                        '<img src="data:' + result.mime + ';base64,' + result.data + '">' +
                                        '</div> </div>';
                                    $('.msg_container').html(html);
                                }else{
                                    console.log('error : ' + result.text);
                                }
                            }).fail(function( jqXHR, textStatus, errorThrown ) {
                                console.log('error to get user image');
                                console.log(textStatus);
                            });
                        }
                    } else {
                        if( data.user_info === email ) {
                            var html = $('.msg_container').html() + '<div class="msg_node my">' +
                                '<div class="header">' +
                                '<img src="img/usr_icon.jpg" width="30">&nbsp;' +
                                data.user_info +
                                '</div>' +
                                '<div class="message">' +
                                data.text +
                                '</div> </div>';
                            $('.msg_container').html(html);
                        } else {
                            var html = $('.msg_container').html() + '<div class="msg_node">' +
                                '<div class="header">' +
                                '<img src="img/usr_icon.jpg" width="30">&nbsp;' +
                                data.user_info +
                                '</div>' +
                                '<div class="message">' +
                                data.text +
                                '</div> </div>';
                            $('.msg_container').html(html);
                        }
                    }
                };

                $( '.btn_container input' ).hover(function() {
                    $( '.btn_container img').css({
                        'filter': 'grayscale(0%)',
                        '-webkit-filter': 'grayscale(0%)'
                    });
                }, function() {
                    $( '.btn_container img').css({
                        'filter': 'grayscale(100%)',
                        '-webkit-filter': 'grayscale(100%)'
                    });
                }).on( 'change' , function() {

                    console.log('on change');

                    var fd = new FormData($('.fm_chat')[0]);

                    $.ajax({
                        url: '/upload.php',
                        type: 'post',
                        processData: false,
                        contentType: false,
                        data: fd
                    }).done(function( data ) {
                        console.log(data);
                        var result = JSON.parse( data );
                        if(result.status === 'success' ) {
                            if(result.filename){
                                var html = $('.msg_container').html() + '<div class="msg_node my">' +
                                    '<div class="header">' +
                                    '<img src="img/usr_icon.jpg" width="30">&nbsp;' +
                                    email +
                                    '</div>' +
                                    '<div class="message">' +
                                    '<img src="/' + result.filename + '">' +
                                    '</div> </div>';
                                $('.msg_container').html(html);

                                var message = {
                                    user_info: email,
                                    img: result.filename,
                                    type: 'img'
                                };
                                websocket.send(JSON.stringify(message));
                            }
                        } else {
                            console.log('upload fail');
                        }
                    }).fail(function( data ) {
                        console.log('upload fail.');
                    });
                });


            }
        });

        $('.msg_container').perfectScrollbar();

    });


})(window, document);