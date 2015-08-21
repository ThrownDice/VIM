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
<div class="scanner border-red">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: black;
		}

		.scanner {
			margin: 0px auto;
			width: 100%;
		}

		.watermark {
			margin: 10px auto;
			width: 430px;
			height: 500px;
			background: #9bbad8;
		}

		.segment {
			margin: 20px 0px;
			height: 90px;
		}

		.person {
			float: left;
			margin: 10px 5px;
		}

		.person2 {
			float: right;
			margin: 10px 5px;
		}

		.speech_box {
			position: absolute;
			top: 95px;
			left: 455px;
			margin: 10px 5px;
			width: 250px;
			height: 60px;
			background: white;
			z-index: 10;
		}

		.speech2_box {
			position: absolute;
			top: 208px;
			left: 467px;
			margin: 10px 5px;
			width: 250px;
			height: 60px;
			background: #ffec42;
			z-index: 10;
		}

		.speech {
			position: absolute;
			top: 105px;
			left: 465px;
			z-index: 20;
			width: 245px;
			word-wrap: break-word;
			font-weight: bold;
		}

		.speech2 {
			position: absolute;
			top: 208px;
			left: 475px;
			margin: 10px 5px;
			width: 245px;
			height: 60px;
			z-index: 10;
			font-weight: bold;
		}

		.mark1 {
			position: absolute;
			top: 120px;
			left: 633px;
			width: 170px;
			height: 70px;
			line-height: 50px;
			z-index: 15;
			color: #DBDBDB;
			font-size: 25px;
			font-family: "Cooper Black";
			font-weight: bolder;
			opacity: 0.8;
		}

		.mark2 {
			position: absolute;
			top: 220px;
			left: 403px;
			width: 170px;
			height: 70px;
			line-height: 50px;
			z-index: 15;
			color: #969993;
			font-size: 25px;
			font-family: "Impact, sans-serif";
			font-weight: bolder;
			opacity: 0.7;
		}

		.mark1_box {
			position: absolute;
			top: 100px;
			left: 750px;
			width: 130px;
			height: 50px;
			background: #6A88A5;
			opacity: 0.9;
			z-index: 10;
			display:none
		}


	</style>

	<!--

	-->
	<div class="watermark">
		<div class="segment border-red">
			<div class="person border-blue">
				<img src="" alt="">
				<span class="username">username</span>
			</div>
			<div class="speech_box">
			</div>
			<p class="speech">
				안녕하세요 UB입니다.</br>
				가나다라마바사 아자차카타파하 하하하</br>
			</p>
			<div class="mark1_box"></div>
			<div class="mark1">Hong Gildong</div>
<!--			<div class="mark2">127.0.0.1</div>-->
<!--			<div class="mark3">george4ph@gmail.com</div>-->
		</div>
		<div class="segment border-red">
			<div class="person2 border-blue">
				<img src="" alt="">
				<span class="username">username</span>
			</div>
			<div class="speech2_box">
			</div>
			<p class="speech2">
				안녕하세요 UB입니다.</br>
				가나다라마바사 아자차카타파하 하하하</br>
			</p>
			<div class="mark2_box"></div>
			<div class="mark2">127.0.0.1</div>
			<!--			<div class="mark2">127.0.0.1</div>-->
			<!--			<div class="mark3">george4ph@gmail.com</div>-->
		</div>
	</div>








</div>
<!-- //content
	========================================-->