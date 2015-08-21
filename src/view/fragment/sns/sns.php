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
			width: 900px;
			background-color: #e9eaed;
		}

	</style>

	<?php include VIEWPATH."fragment".DS."sns".DS."header_sns.php"?>

	<!--
		aside, content sit here.
	-->

	<?php include VIEWPATH."fragment".DS."sns".DS."aside_sns.php"?>
	<?php include VIEWPATH."fragment".DS."sns".DS."post_pane__sns.php"?>






</div>
<!-- //content
	========================================-->