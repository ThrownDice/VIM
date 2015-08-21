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
<div class="login border-green">
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
		}

		.btn_login {
			display: block;
			background-color: #ccc;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			border-radius:6px;
			color: #fff;
			font-family: 'Oswald';
			font-size: 20px;
			text-decoration: none;
			cursor: pointer;
			border:none;
			text-align: center;
		}

		.submit_box {
			margin-top: 5px;
		}

	</style>


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
				<a class="btn_login">Log in</a>
			</div>
		</form>
	</div>
</div>
<!-- //login -->


