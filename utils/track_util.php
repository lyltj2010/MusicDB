<?php
function get_img($album){
	// get album image for the track
	include 'resources/config.php';
	$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	$sql = "SELECT image FROM album WHERE name=\"$album\"";
	$results = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	return $results;
}

include 'resources/config.php';
$track_name = $_GET['track'];
$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
$sql_track = "SELECT name, url, artist, album, listeners, playcount
			  FROM track WHERE name = \"$track_name\"";
$track = mysqli_fetch_assoc(mysqli_query($conn, $sql_track));

mysqli_close($conn)
?>
