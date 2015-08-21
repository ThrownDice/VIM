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
<div class="validator">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: #F3F3F3;
			font-family: "돋움";
		}

		.validator {
			margin: 30px auto;
			width: 400px;
		}

		.title {
			padding: 10px 0;
			border-bottom: 1px solid #F3F3F3;
			font-weight: bold;
			color: #F3F3F3
		}

		.pw_box {
			margin: 10px auto;
		}

		.pw_box a {
			display: block;
			padding: 3px 6px;
			border: 1px solid #F3F3F3;
			float: left;
			border-radius: 3px;
			cursor: pointer;
		}

		.pw_box a:hover {
			display: block;
			padding: 3px 6px;
			border: 1px solid #F3F3F3;
			float: left;
			border-radius: 3px;
			background: #F3F3F3;
			color: #333;
		}

		input {
			margin: 5px 0;
			display: block;
			padding: 3px;
			width: 300px;
			color: #333;
		}

		.sign_box {
			margin: 20px auto;
		}

		.sign {
			margin: 5px 0;
			background: #F3F3F3;
			width: 200px;
			color: #333;
			font-style: italic;
		}

	</style>

	<div class="title">파일에 삽입된 서명을 추출합니다</div>
	<div class="pw_box ">
		<label for="">비밀번호를 입력하세요.</label>
		<input type="password">
		<a class="decipher">추출</a>
	</div>
	<div class="sign_box">
		<label for="">서명은</label>
		<div class="sign"><!-- sign -->sign</div>
	</div>



</div>
<!-- //content
	========================================-->