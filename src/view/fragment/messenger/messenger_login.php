<?php
/**
 * Messenger_upload fragment.
 *
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 9:21 PM
 */
?>

<!-- login -->
<div class="login">
	<style scoped>
		.login {
			margin: 0px auto;
			width: 360px;
			height: 590px;
			background: url("view/img/messenger_login.jpg") no-repeat;

		}

		.login .form_box {
			width: 240px;
			margin: 270px auto 0px;
		}

		.form_box input {
			width: 100%;
			height: 30px;
<<<<<<< HEAD
			color: #333;
=======
			border-radius: 3px;
			border: none;
			font-size : 10pt;
			padding : 0px 3px 0px 3px;
		}

		input.email {
			border-bottom: 1px solid lightgray;
>>>>>>> 080afda
		}

		.btn_login {
			display: block;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			border-radius:3px;
			color : white;
			font-family: 'Oswald';
			font-size: 11px;
			text-decoration: none;
			cursor: pointer;
			border:none;
			text-align: center;
			height: 30px;
			line-height: 30px;
			background: #513b3c;
		}

		.submit_box {
			margin-top: 5px;
		}

	</style>


	<div class="form_box">
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
				<a class="btn_login">Login</a>
			</div>
		</form>
	</div>
</div>
<!-- //login -->


