<?php
function get_tracks($album) {
	// get track list of given album
	include 'resources/config.php';
	$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	$sql = "SELECT name FROM track WHERE album=\"$album\"";
	$results = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQL_ASSOC);
	// use foreach or while to retrive all tracks
	return $results;
}

function get_track($track) {
	// get track information of a given track
	include 'resources/config.php';
	$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	$sql = "SELECT name, artist, duration, playcount FROM track WHERE name=\"$track\"";
	$results = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	return $results;
}

include 'resources/config.php';
$album_name = $_GET['album'];
$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
$sql_album = "SELECT name, artist, image, date(published), listeners, playcount
			  FROM album WHERE name = \"$album_name\"";
$album = mysqli_fetch_assoc(mysqli_query($conn, $sql_album));

mysqli_close($conn);
?>