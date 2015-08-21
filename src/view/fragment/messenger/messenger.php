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
<div class="messenger border-black">
	<style scoped>
		* {
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			list-style: none;
			text-decoration: none;
		}

		.messenger {
			margin: 0px auto;
			width: auto;

		}

	</style>

	<?php require_once VIEWPATH."fragment".DS."messenger".DS."messenger_login.php"?>
	<?php require_once VIEWPATH."fragment".DS."messenger".DS."messenger_chat.php"?>
	<?php require_once VIEWPATH."fragment".DS."messenger".DS."messenger_upload.php"?>





</div>
<!-- //content
	========================================-->