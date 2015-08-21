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
<!-- content
========================================-->
<div class="post_pane">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: black;
			font-size: 0.99em;
		}

		.post_pane {
			padding: 10px 0px;
			width: 550px;
			float: right;
		}

		.new_post_box {
			margin: 0px 0px 10px 0px;
			width: 500px;
			background-color: white;
			border-radius: 3px;
		}

		.new_post_box input {
			border: none;
		}

		.new_post_box .btn_add_photo {
			display: block;
			float: left;
			padding: 2px 0px;
			color: #4b66a1;
			font-weight: bold;
			cursor: pointer;
		}

		.new_post_box .btn_add_photo:hover {
			color: #4b66a1;
			font-weight: bold;
			background: #F4F5F3;

		}
		.new_post_box .header {
			padding: 5px 10px;
		}

		.new_post_box .inner {
			padding: 5px 0px;
			border-bottom: 1px solid #E1E1E1;
		}


		.new_post_box .content {
			padding: 5px 0px;
		}

		.new_post_box .person_box {
			float: left;
			padding: 10px;
		}

		.new_post_box .text {
			margin: 0px 0px 0px 5px;
			padding: 0px 5px 0 0;
			width: 400px;
			height: 60px;
			vertical-align: middle;
		}

		.new_post_box .footer {
			border-top: 1px solid #E1E1E1;
			padding: 5px 10px;
		}

		.btn_post {
			padding: 2px 16px;
			background: #4b66a1;
			color: white;
			float: right;
			border:none;
			cursor: pointer;
		}

		.post {
			background-color: white;
			width: 480px;
			border-radius: 3px;
			padding: 10px;
		}


		.post .body {
			padding: 10px 0px;
		}

		.post .person_box {
			float: left;
			margin-right: 10px;
		}

		.post .username {
			color: #4b66a1;
			font-weight: bold;
		}

		.post .time {
			color: #A4A4A4;
		}

		.post .content {
			padding: 20px 0;
		}

		.post .img {
			padding: 10px 0;
		}

		.footer {
			border-top: 1px solid #E1E1E1;
			padding: 5px 0px;
		}

		.post .footer a {
			display: block;
			float: left;
			margin-right: 20px;
			font-weight: bold;
			color: #999999;
		}




	</style>


	<div class="new_post_box">
		<form action="" class="form_new_post">
			<div class="header">
				<div class="inner">
					<a class="btn_add_photo">add photo</a>
				</div>
			</div>
			<div class="content">
				<div class="person_box"><img src="view/img/fb_person.jpg" alt="" class=""></div>
				<input type="text" placeholder="What's on your mind?" class="text">
			</div>
			<div class="footer">
				<a class="btn_post" >post</a>
			</div>
		</form>

		
	</div>
<?php
/**
 * Uncomment
 */
	$posts = $data["post_pane"];
	foreach($posts as $post) {
//?>
	<div class="post">
		<div class="header">
			<div class="person_box"><img src="view/img/fb_person.jpg" alt="" class=""></div>
			<div class="username"><?=$post["author"]?></div>
			<div class="time"><?=$post["time"]?></div>
		</div>
		<div class="body">
			<div class="content"><?=$post["content"]?></div>
			<div class="img"><?=$post["img"]?></div>
		</div>
		<div class="footer">
			<a class="like">like</a>
			<a class="comment">comment</a>
			<a class="share">share</a>
		</div>
	</div>
<?
	}
?>


</div>
<!-- //gnb
========================================-->


