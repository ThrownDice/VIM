<?php
/** sns.content
 * header fragment
 *
 *
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 8:29 PM
 */

?>
<!-- sns_login
========================================-->
<div class="login">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: black;
			font-family: "tahoma";
			font-size: 0.95em;
			font-weight: bold;

		}

		.login {
			margin: 150px auto;
			width: 457px;
			border: 1px solid #D1D1D1;
			border-radius: 10px;
		}

		.content {
			background: url("view/img/fb_login.jpg") no-repeat;
			width: 457px;
			height: 200px;
		}

		input {
			display: block;
			padding: 2px 5px;
		}

		.email {
			margin: 49px 0px 0px 140px;;
		}

		.password {
			margin: 10px 0px 0px 140px;;
		}

		.footer {
			background: #efefef;
			padding: 5px;
		}

		a {
			margin: 0px 30px 0px 0px;
			padding: 3px 6px;
			display: block;
			float: right;
			background: #4e6398;
			color: white;
			border-radius: 3px;
			cursor: pointer;
		}

	</style>


	<div class="content">
		<div id="progressbar"></div>
		<form action="" class="form_login">
			<input type="text" class="email">
			<input type="password" class="password">
		</form>
	</div>
	<div class="footer">
		<a href="#" class="btn_login">login</a>
	</div>

</div>
<!-- //sns_login
========================================-->


