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
<div class="sns border-black">
	<style scoped>
		* {
			overflow: hidden;
			list-style: none;
			text-decoration: none;
			color: black;
		}

		.sns {
			margin: 0px auto;
			width: 745px;
			background-color: #e9eaed;
		}

	</style>

	<?php include VIEWPATH."fragment".DS."sns".DS."sns_header.php"?>

	<!--
		aside, content sit here.
	-->


	<?php include VIEWPATH."fragment".DS."sns".DS."sns_login.php"?>
	<?php include VIEWPATH."fragment".DS."sns".DS."sns_aside.php"?>
	<?php include VIEWPATH."fragment".DS."sns".DS."sns_post_pane.php"?>






</div>
<!-- //content
	========================================-->