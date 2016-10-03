<!DOCTYPE html>
<html>
<head>
	<title>Artists</title>
	<?php include 'includes/head.html' ?>
</head>
<body>
	<?php
		include 'resources/config.php';
		$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	?>
	<div class="container">
		<?php include 'includes/header.php' ?>
		<?php include 'includes/footer.php' ?>
	</div>
</body>
</html>