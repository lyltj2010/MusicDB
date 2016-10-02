<!DOCTYPE html>
<html>
<head>
	<title>Mini Music Site</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
		<?php include 'includes/header.php'; ?>
		<?php include 'includes/index_top_artists.php'; ?>
		<?php include 'includes/index_top_albums.php'; ?>
		<?php include 'includes/index_top_tracks.php'; ?>
		<?php include 'includes/footer.php'; ?>
	</div>
</body>
</html>