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
<div class="gnb">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: white;
			font-family:"verdana";
		}

		.gnb {
			width: 800px;
			margin: 0px auto;
		}

		.logo {
			width: 150px;
			height: 60px;
			float: left;
			background: url("view/img/logo.png") no-repeat;
		}

		ul {
			width: 600px;
			height: 60px;
			float: right;
		}

		li {
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

		.btn:hover {
			border: none;
			vertical-align: middle;
			background: #D50055;
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



	</style>
	<a href="/" class="logo"></a>
	<ul class="">
		<li class=""><a href="/about" class="about text-btn">About</a></li>
		<li class=""><a href="/sns" class="sns text-btn">SNS</a></li>
		<li class=""><a href="/messenger" class="messenger text-btn">Messenger</a></li>
		<li class=""><a href="/validator" class="btn">Validator</a></li>
		<li class=""><a class="ub text-btn">UB PRODUCT</a></li>
	</ul>


</div>
<!-- //gnb
========================================-->


