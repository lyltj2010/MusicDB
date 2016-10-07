<?php
function get_albums($mbid_artist) {
	// get all albums of a given artist
	include 'resources/config.php';
	$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	$sql = "SELECT name,date(published) FROM album WHERE mbid_artist=\"$mbid_artist\"";
	$results = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQL_ASSOC);
	return $results;
	// use foreach or while to retrive all tracks
}

function get_top_tracks($mbid_artist) {
	// get top tracks by a given artist
	include 'resources/config.php';
	$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	$sql = "SELECT name,duration FROM track 
			WHERE mbid_artist=\"$mbid_artist\"
			ORDER BY listeners LIMIT 6";
	$results = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQL_ASSOC);
	return $results;
	// use foreach or while to retrive all tracks
}

include 'resources/config.php';
$artist_name = $_GET['artist'];
$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
$sql_artist = "SELECT name, url, mbid_artist, image, listeners, playcount
			  FROM artist WHERE name = \"$artist_name\"";
$artist = mysqli_fetch_assoc(mysqli_query($conn, $sql_artist));

mysqli_close($conn);
?>