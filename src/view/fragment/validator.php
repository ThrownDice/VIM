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
<<<<<<< HEAD
=======
			font-size : 10pt;
>>>>>>> 080afda
		}

		.validator {
			margin: 30px auto;
			width: 400px;
		}

		.title {
			padding: 10px 0;
			border-bottom: 1px solid #F7F7F7;
			font-weight: bold;
			color: #F3F3F3
		}

		.file_box {
			padding: 5px 0;
		}

		.file_box input {
			display: block;
			padding: 10px 0;


		}
		.pw_box {
			margin: 5px auto;
			padding: 5px 0;
<<<<<<< HEAD

=======
			display : none;
>>>>>>> 080afda
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

		.pw_box input {
			margin: 5px 0;
			display: block;
			padding: 3px;
			width: 200px;
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
	<div class="file_box">
		<label for="">파일경로</label>
<<<<<<< HEAD
		<input type="file">
	</div>
	<div class="pw_box ">
		<label for="">비밀번호를 입력하세요.</label>
		<input type="password">
=======
		<form method="post" name="fm_validator" class="fm_validator" style="width:100%;height:100%">
			<input type="file" name="file" class="validator_file">
		</form>
	</div>
	<div class="pw_box">
		<label for="">숨겨진 텍스트에 암호가 걸려있습니다. 비밀번호를 입력하세요.</label>
		<input type="hidden" class="file_name">
		<input type="password" class="key">
>>>>>>> 080afda
		<a class="decipher">추출</a>
	</div>
	<div class="sign_box">
		<label for="">서명은</label>
		<div class="sign"><!-- sign -->sign</div>
	</div>

<<<<<<< HEAD

=======
	<script>

		(function(window, document) {

			$(function() {

				$('.validator_file').on('change', function() {
					var fd = new FormData($('.fm_validator')[0]);
					$('.pw_box').hide(0);
					$.ajax({
						url: '/validator',
						type: 'post',
						processData: false,
						contentType: false,
						data: fd
					}).done(function( data ) {
						console.log(data);
						var result = JSON.parse( data );
						if(result.status === 'success' ) {
							if(result.cipher) {
								$('.pw_box').fadeIn(500);
								$('.pw_box .file_name').val(result.file);
							} else {
								$('.sign_box .sign').text(result.text);
							}
						} else {
							console.log('upload fail');
						}
					}).fail(function( data ) {
						console.log('upload fail.');
					});
				});

				$('.decipher').on('click', function() {
					var key = $('.pw_box .key').val();
					var file = $('.pw_box .file_name').val();
					var data = {
						key : key,
						file : file
					};

					$.ajax({
						url: '/validator',
						type: 'post',
						data: data
					}).done(function( data ) {
						console.log(data);
						var result = JSON.parse(data);
						if(result.status == "success") {
							$('.sign_box .sign').text(result.text);
						} else {
							$('.sign_box .sign').text("잘못된 암호입니다.");
						}

					});
				});

			});

		})(window, document);



	</script>
>>>>>>> 080afda

</div>
<!-- //content
	========================================-->