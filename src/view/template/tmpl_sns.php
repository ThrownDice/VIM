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
	<?php require_once VIEWPATH."fragment".DS."head".DS."__head_sns.php"?>
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
	<div id="main">
		<!-- screen
		========================================-->
		<div id="screen" class="border-red">
			<?php require_once VIEWPATH."fragment".DS."sns".DS."sns.php"?>
		</div>
		<!-- //screen
		========================================-->
	</div>
	<!-- //main
	========================================-->

	<!-- footer
		========================================-->
	<div id="footer" class="border-red">
		footer
	</div>
	<!-- //footer
	========================================-->



</body>
</html>