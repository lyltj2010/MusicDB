<?php
function get_img($album){
	// get album image for the track
	include 'resources/config.php';
	$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	$sql = "SELECT image FROM album WHERE name=\"$album\"";
	$results = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	return $results;
}

function get_comments($mbid_track) {
	// get comments of the given track
	include 'resources/config.php';
	$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	$sql = "SELECT content FROM comment WHERE track=\"$mbid_track\"";
	$results = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $results;
}

include 'resources/config.php';
$track_name = $_GET['track'];
$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
$sql_track = "SELECT name, url, mbid_track, artist, album, listeners, playcount
			  FROM track WHERE name = \"$track_name\"";
$track = mysqli_fetch_assoc(mysqli_query($conn, $sql_track));

mysqli_close($conn);
?>
