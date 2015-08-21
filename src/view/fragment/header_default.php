<?php
/**
 * header fragment
 *
 *
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 8:29 PM
 */

?>
<!-- gnb
========================================-->
<div class="gnb border-blue">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: white;
		}

		.gnb {
			width: 800px;
			margin: 0px auto;
		}

		.logo {
			width: 150px;
			height: 60px;
			float: left;
		}

		.gnb ul {
			width: 600px;
			height: 60px;
			float: right;
		}

		.gnb li {
			margin: 0px 20px 0px 0px;
			height: 60px;
			display: block;
			float: left;
		}

		.gnb a {
			display: block;
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

		.ub {
			margin-left: 30px;
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
	<a href="/" class="logo border-gray">logo</a>
	<ul class="border-green">
		<li class=""><a href="/about" class="about text-btn">About</a></li>
		<li class="border-gray"><a href="/sns" class="sns text-btn">SNS</a></li>
		<li class="border-gray"><a href="/messenger" class="messenger text-btn">Messenger</a></li>
		<li class="border-gray"><a href="/scanner" class="btn">Scanner</a></li>
		<li class="border-gray"><a href="" class="ub text-btn">UB PRODUCT</a></li>
	</ul>


</div>
<!-- //gnb
========================================-->


