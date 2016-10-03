<!DOCTYPE html>
<html>
<head>
	<title>Mini Music Site</title>
	<?php include 'includes/head.html' ?>
</head>
<body>
	<?php
		include 'resources/config.php';
		$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
		if (mysqli_connect_errno()) {
		    die("Connection failed: " . mysqli_connect_error($conn));
		}
	?>
	<div class="container">
		<?php include 'includes/header.php' ?>
		<?php include 'includes/index_top_artists.php' ?>
		<?php include 'includes/index_top_albums.php' ?>
		<?php include 'includes/index_top_tracks.php' ?>
		<?php include 'includes/footer.php' ?>
	</div>
</body>
</html>