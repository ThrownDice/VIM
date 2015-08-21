<?php
/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-16
 * Time: 9:34
 */
    var_dump($_SERVER);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title></title>

    <!--jquery library-->
    <script src="html/js/jquery-2.1.4.min.js"></script>

    <!--jquery ui library-->
    <script src="html/js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="html/js/jquery-ui.min.css">

    <!--css initializer-->
    <link rel="stylesheet" href="html/css/normalize.css">

    <!--scroll bar library-->
    <link rel="stylesheet" href="html/css/perfect-scrollbar.min.css">
    <script src="html/js/perfect-scrollbar.jquery.min.js"></script>

    <!--index page script, css-->
    <link rel="stylesheet" href="html/css/index.css">
    <script src="html/js/index.js"></script>

</head>
<body>

<div id="wrap">

    <form enctype="multipart/form-data" action="/upload.php" method="POST" class="fm" target="result">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input type="file" name="file" class="file">
    </form>

<!--    <div class="login">-->
<!--        <div class="title"><img src="html/img/title.png"></div>-->
<!--        <label> Your Email: </label>-->
<!--        <input type="text" name="email" class="input_email" value="Email">-->
<!--        <div class="btn enter">����2</div>-->
<!--    </div>-->
<!---->
<!--    <div class="msg_container"></div>-->
<!--    <div class="usr_container"></div>-->
<!--    <div class="chat">-->
<!--        <div class="btn_container">-->
<!--            <img src="html/img/camera%20icon-green.png" width="90%">-->
<!--            <input type="file">-->
<!--        </div>-->
<!--        <div class="input_container">-->
<!--            <textarea> </textarea>-->
<!--        </div>-->
<!--    </div>-->

    <iframe id="result" name="result" style="width:600px; height:300px">

    </iframe>

    <script>

        (function(window, document){
            $('.file').on('change', function(){
                console.log('submit!');
               $('.fm').submit();
            });
        })(window, document);

    </script>


</div>

</body>
</html>
