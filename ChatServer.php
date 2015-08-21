#!/php -q
<?php
// Run from command prompt > php -q websocket.demo.php

// Basic WebSocket demo echoes msg back to client
include 'websockets.php';
include 'src/system/ImageProcessor.php';

class ChatServer extends WebSocketServer {

    protected $CONNECTED_USR = array();

    protected function process ($user, $message) {
        echo "[INFO] : message received, ".$message;
        $message = json_decode($message);
        try {
            if(!empty($message)) {
                if($message->type == "init") {

                    $address = '';
                    socket_getpeername($user->socket, $address);

                    $user->user_info = $message->user_info;
                    $user->ip = $address;
                    $user->name = $message->name;

                    //연결된 유저 추가
                    array_push($this->CONNECTED_USR, $user);
                } else {
                    $this->broadcast($message);
                }
            }
        } catch(Exception $e) {
            print '[ERROR] process error, '.$e;
        }

    }

    protected function connected ($user) {

    }

    protected function broadcast($message) {
        $IC = new ImageProcessor();
        $response = array();
        $response["type"] = $message->type;
        $response["sender"] = $message->user_info;
        //접속한 모든 유저에게 메시지를 보내는 함수
        foreach($this->CONNECTED_USR as $node){
            if($message->type == "msg") {
                $flag = rand(0, 2);
                switch($flag) {
                    case 0:
                        $image_data = $IC->text2Image($message->text, $node->user_info);
                        break;
                    case 1:
                        $image_data = $IC->text2Image($message->text, $node->ip);
                        break;
                    case 2:
                        $image_data = $IC->text2Image($message->text, $node->name);
                        break;
                }
                $response["img_type_white"] = base64_encode($image_data["white"]);
                $response["img_type_yellow"] = base64_encode($image_data["yellow"]);
            }
            $this->send($node, json_encode($response));
        }
    }

    protected function closed ($user) {
        //todo : 연결이 끊긴 유저가 생기면 CONNECTED_USR 에서 삭제해야 한다
    }

}

$chat_server = new ChatServer("0.0.0.0", "9000");
try {
    $chat_server->run();
} catch (Exception $e) {
    $chat_server->stdout($e->getMessage());
}
