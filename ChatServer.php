#!/php -q
<?php
// Run from command prompt > php -q websocket.demo.php

// Basic WebSocket demo echoes msg back to client
include 'websockets.php';
include 'src/system/ImageProcessor.php';

class ChatServer extends WebSocketServer {

    protected $CONNECTED_USR = array();

    protected function process ($user, $message) {
        //$this->send($user,$message);
        echo "[INFO] : message received, ".$message;
        $this->broadcast($message);
    }

    protected function connected ($user) {
        //연결된 유저 추가
        array_push($this->CONNECTED_USR, $user);
    }

    protected function broadcast($message) {
        //접속한 모든 유저에게 메시지를 보내는 함수
        foreach($this->CONNECTED_USR as $node){
            $this->send($node, $message);
        }

        /*$address = '';
        socket_getpeername($user->socket, $address);*/
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