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
<!-- upload -->
<div class="upload border-black">
	<style scoped>
		.upload {
			margin: 0px auto;
			width: 400px;
			background: white;
			font-family: "돋움";
			font-size: 0.9em;
			color: #464646;
			display : none;
		}

		.upload span {
			color: #DA1727;
			font-weight: bold;
			text-decoration: underline;
			padding: 2px;
		}

		.title {
			text-align: center;
			padding: 5px 0px;
			border-bottom: 1px solid #DEDEDE;
		}

		.file_box {
			padding: 10px 0px;
			border-bottom: 1px solid #DEDEDE;
		}

		.file_box .btn_select_file {
			display: block;
			margin: 0px auto;
			width: 51px;
			height: 55px;
			background: url("view/img/messenger_btn_upload2.jpg") no-repeat;
			cursor: pointer;
		}

		.filename {
			text-align: center;
		}

		.protect_box {
			margin: 0px auto;
			padding: 5px 10px;
			border-bottom: 1px solid #DEDEDE;
		}

		.protect_box p {
			float: left;
		}

		.protect_box .btn_toggle {
			float: right;
		}

		.sign_box {
			margin: 0px auto;
			padding: 5px 10px;
			border-bottom: 1px solid #DEDEDE;
		}

		.upload .sign_box input {
			margin: 5px 10px 5px 0px;
			width: 120px;
			height: 20px;
			padding: 3px;
		}

		.pw_box {
			margin: 0px auto;
		}

		.footer {
			margin: 0px auto;
			padding: 5px 0px;
			text-align: center;
			background: #F3F3F3;
		}

		.footer .submit_box {
			margin: 0px auto;
			width: 120px;
		}

		.submit_box a {
			margin: 5px 5px;
			padding: 3px;
			display: block;
			float: left;
			border: 1px solid #F3F3F3;
		}

		.submit_box a:hover{
			margin: 5px 5px;
			padding: 3px;
			display: block;
			float: left;
			border: 1px solid #D3D3D3;
			border-radius: 5px;
			cursor: pointer;
		}


	</style>

	<div class="title">파일업로드</div>
	<form action="" class="form_upload">
		<div class="file_box">
			<a class="btn_select_file"></a>
			<p class="filename ">filename</p>
			<input type="file" name="file" class="">
		</div>
		<div class="protect_box">
			<p class=""><span>보호</span>하길 원하십니까?</p>
			<div class="btn_toggle"> <input type="checkbox" class="check_protect"> </div>
		</div>
		<div class="sign_box">
			<div class="sign_title"><span>서명</span>을 주입할 수 있습니다</div>
			<input type="text" placeholder="signature">
			<div class="pw_box">
				<div class="pw_title">서명을 확인할 비밀번호를 입력하세요</div>
				<input type="password" name="pw" placeholder="password">
				<input type="password" name="pw_confirm" placeholder="re-enter password">
			</div>
		</div>
		<div class="footer">
			<div class="submit_box">
				<a class="submit btn_upload">올리기</a><!--누르면 submit -->
				<a class="abort">취소</a>
				<input type="submit" value="upload" class="hide">
			</div>
		</div>
	</form>

</div>
<!-- //upload -->

<script>
	$(document).ready(function(){
		$('a.toggler').click(function(){
			$(this).toggleClass('off');
		});
	});
</script>

