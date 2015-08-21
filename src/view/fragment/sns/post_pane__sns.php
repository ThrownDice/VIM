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
<div class="post_pane border-blue">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: black;
		}

		.post_pane {
			padding: 10px 0px;
			width: 700px;
			float: right;
		}

		.new_post_box {
			margin: 0px 0px 10px 0px;
			width: 600px;
			background-color: white;
		}

		.new_post_box .header {
			padding: 5px 10px;
		}

		.new_post_box .inner {
			padding: 5px 0px;
			border-bottom: 1px solid gray;
		}

		.new_post_box .content {
			padding: 0px 0px;
		}

		.new_post_box .person_box {
			float: left;
			padding: 10px;
		}

		.new_post_box .text {
			margin: 0px 0px 0px 10px;
			padding: 0px 10px;
			width: 450px;
			height: 70px;
			vertical-align: middle;
			border: none;
		}

		.new_post_box .footer {
			border-top: 1px solid darkgray;
		}

		.post {
			background-color: white;
			width: 600px;
		}

		.text-btn {
			vertical-align: middle;
			font-size: 1.0em;
			margin: 0px;
			padding : 10px;
			width: auto;
			height : auto;
			border:1px solid #2D79B2;
			line-height : 40px;
			text-align : center;
			-webkit-border-radius : 5px;
			-moz-border-radius : 5px;
			border-radius : 5px;
			cursor : pointer;
		}

		.btn {
			border: none;
			vertical-align: middle;
			background: #BB004A;
			font-size: 1.0em;
			margin: 10px;
			padding : 0px 10px;
			width: auto;
			height : 40px;
			line-height : 40px;
			text-align : center;
			-webkit-border-radius : 5px;
			-moz-border-radius : 5px;
			border-radius : 5px;
			cursor : pointer;
		}

		/*.btn {
			font-family: 'Nanum Gothic Coding', monospace;
			border-radius : 5px;
			background-color : #1474CC;
			margin: 10px;
			text-align: center;
			padding: 10px;
			cursor: pointer;
		}

		.btn:hover {
			background-color: #FF8F00;
		}*/

	</style>


	<div class="new_post_box border-blue">
		<form action="" class="form_new_post">
			<div class="header">
				<div class="inner">
					<div class="btn_add_photo">add photo</div>
				</div>
			</div>
			<div class="content">
				<div class="person_box"><img src="view/img/fb_person.jpg" alt=""></div>
				<input type="text" placeholder="What's on your mind?" class="text">
			</div>
			<div class="footer">
				<div class="btn_submit border-green">post</div>
				<input type="submit" value="post" class="hide">
			</div>
		</form>

		
	</div>
<?php
//	$posts = $data["post_pane"];
//	foreach($posts as $post) {
//?>
	<div class="post border-blue">
		post content
	</div>
<?//
//	}
//?>


</div>
<!-- //gnb
========================================-->


