<?php
/**
 * Messenger fragment.
 *
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 7:41 PM
 */
?>
<!-- content
	========================================-->
<div class="messenger border-black">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: white;
		}

		.messenger {
			margin: 0px auto;

		}


		.login {
			margin: 0px auto;
			width: 360px;
			height: 590px;
			background: url("view/img/messenger.jpg") no-repeat;
		}

		.chat {
			margin: 0px auto;
			width: 400px;

		}

		.upload_box {
			width: 300px;
		}

		.chat .body {
			height: 500px;
		}


		.input_text {
			float: left;
		}

		.btn-send {
			width: 60px;
		}
		.text
		/*.login {
			margin: 0px auto;
			border-radius : 10px;
			border : 0px solid gray;
			box-shadow:0px 0px 20px gray;
			padding : 5px;
			font-size : 10pt;
			text-align : center;
			left: 50%;
			top: 50%;
			transform: translateX(-50%) translateY(-50%);
			position : absolute;
			width : 300px;
		}

		.login .title {
			text-align: center;
		}

		.login input {
			color: gray;
			border-radius: 5px;
			border: none;
			font-size: 10pt;
			padding: 2px 10px 2px 10px;
			text-align: center;
		}


		.chat {
		    display: none;
		    width: 100%;
		    height: 10%;
		    min-height: 70px;
		    line-height: 100%;
		    position: fixed;
		    top: 100%;
		    transform: translateY(-100%);
		    background : #303030;
		}

		.chat .btn {
		    position: absolute;
		    top: 0px;
		    bottom: 0px;
		    left: 0px;
		    right: 0px;
		    display: inline;
		    margin: auto;
		    height: 30px;
		    width: 60%;
		    min-width: 50px;
		    font-size: 10pt;
		    line-height: 30px;
	     padding: 5px;
		}

		*/


	</style>

	<!--
		background image: hacker, suggesting web spy.

		phrase: 더 안심하고 웹을 이용할 수는 없을까?

	-->


	<!-- login -->
	<div class="login border-green hide">
		<div class="form_box border-black">
			<form action="" class="form_login">
				<div class="email_box">
					<label for="email"></label>
					<input type="text" name="email" placeholder="E-mail" class="email">
				</div>
				<div class="pw_box">
					<label for="email"></label>
					<input type="password" name="password" placeholder="Password" class="password">
				</div>
				<div class="submit_box">
					<label for="submit"></label>
					<input type="submit" value="login" placeholder="Password" class="submit">
				</div>
				<div class="subtitle_box">
					subtitle
				</div>
			</form>
		</div>
	</div>
	<!-- //login -->



	<!-- chat -->
	<div class="chat border-gray">
		<div class="header border-blue">
			<p class="user border-green">상대자 이름</p>
			<p class="status border-green">status message</p>
		</div>
		<div class="body">
			chat body
		</div>
		<div class="footer border-yellow">
			<div class="send_box">
				<input type="text" class="input_text">
				<div class="btn-send border-yellow">send</div>
			</div>
			<div class="submenu_box">
				<a href="" class="upload border-yellow">upload</a>
			</div>
		</div>
	</div>
	<!-- //chat -->

	<!-- upload -->
	<div class="upload_box border-gray">
		<div class="title border-green">파일업로드</div>
		<form action="" class="form_upload border-red">
			<div class="file border-blue">
				<label for="file" class="file"></label>
				<div class="file_select">select file<!-- 누르면 input type:file 출력--></div>
				<input type="file" name="file" class="hide">
			</div>
			<div class="protect_box border-blue">
				<div class="protect">
					<label for="" class="protect">보호하길 원하십니까</label><i class="protect_desc">"*"</i>
					<input type="checkbox">yes
				</div>
				<div class="sign">
					<label for="sign">서명을 주입합니다</label><i class="sign_desc">"*"</i>
					<input type="text">
					<label for="sign_pw">서명 확인 비밀번호</label>
					<input type="password" name="sign_pw">
				</div>
			</div>
			<div class="submit_box border-blue">
				<div class="submit">올리기</div><!--누르면 submit -->
				<div class="abort">취소</div>
				<input type="submit" value="upload" class="hide">
			</div>
		</form>

	</div>
	<!-- //upload -->





</div>
<!-- //content
	========================================-->