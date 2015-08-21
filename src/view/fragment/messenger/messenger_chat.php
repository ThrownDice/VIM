<?php
/**
 * Messenger_chat fragment.
 *
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 9:21 PM
 */
?>
<!-- chat -->
<div class="chat border-black">
	<style scoped>
		* {
			font-family: "돋움";
		}
		.chat {
			margin: 0px auto;
			width: 430px;
		}

		.chat .header {
			background: url("view/img/messenger_header.jpg") no-repeat;
			height: 68px;
		}

		.chat .username_box {
			margin: 10px 0px 0px 10px;
			width: 180px;
		}


		.chat .body {
			height: 500px;
			background: #9bbad8;
		}

		.chat .footer {
			background: #9bbad8;
		}

		.chat .send_box {
			margin: 0px auto;
			width: 95%;
			vertical-align: top;
		}

		.chat .input_text {
			width: 80%;
			height: 45px;
			resize: none;
			line-height: 1;
			font-size: 0.8em;
			padding: 5px;
			font-family: "돋움";
			word-wrap: break-word;
			float: left;
		}

		.btn_send {
			height: 55px;
			background: #ffec42;
			text-align: center;
			line-height: 55px;
		}

		.chat .submenu_box {
			padding: 5px 10px;
		}

		.chat .btn_select_file {
			display: block;
			background: url("view/img/messenger_btn_upload.jpg") no-repeat;
			width: 23px;
			height: 23px;
		}
	</style>


	<div class="header">
		<div class="username_box">
			<p class="username">홍길동</p>
			<p class="status ">LG CNS HACKATHON</p>
		</div>
	</div>
	<div class="body">
		<img src="view/img/messenger_segment1.png" alt="">
		<img src="view/img/messenger_segment2.png" alt="">
	</div>
	<div class="footer ">
		<div class="send_box ">
			<textarea class="input_text"></textarea>
			<div class="btn_send ">send</div>
		</div>
		<div class="submenu_box">
			<i class="btn_select_file "></i>
		</div>
	</div>
</div>
<!-- //chat -->

