<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 10:13 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
	<?php require_once VIEWPATH."fragment".DS."head".DS."__head_messenger.php"?>
<title>Viewer Identifying Module</title>
</head>
<body>
	<!-- header
	========================================-->
	<div id="header" class="border-red">
		<?php require_once VIEWPATH."fragment".DS."header_default.php"?>
	</div>
	<!-- //header
	========================================-->

	<!-- main
	========================================-->
	<div id="main" class="border-red">
		<!-- screen
		========================================-->
		<div id="screen" class="border-red">
			<?php require_once VIEWPATH."fragment".DS."messenger".DS."messenger.php"?>
		</div>
		<!-- //screen
		========================================-->
	</div>
	<!-- //main
	========================================-->



</body>
</html>