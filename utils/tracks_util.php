<?php
function getTrack($track) {
	// get track info base on track name
	include 'resources/config.php';
	$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
	$sql = "SELECT url, listeners FROM track WHERE name=\"$track\"";
	$results = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	return $results;
}

include 'resources/config.php';
$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);

$sql_tag = "SELECT DISTINCT tag, ROUND(avg(listeners)) FROM track_tag
            GROUP BY tag ORDER BY AVG(listeners) DESC";
$rst_tag = mysqli_query($conn, $sql_tag);

$sql_rock = "SELECT track FROM track_tag 
            WHERE tag='rock' ORDER BY listeners DESC LIMIT 30";
$rst_rock = mysqli_query($conn, $sql_rock);

$sql_pop = "SELECT track FROM track_tag 
            WHERE tag='pop' ORDER BY listeners DESC LIMIT 30";
$rst_pop = mysqli_query($conn, $sql_pop);

$sql_indie = "SELECT track FROM track_tag 
            WHERE tag='indie' ORDER BY listeners DESC LIMIT 30";
$rst_indie = mysqli_query($conn, $sql_indie);

mysqli_close($conn)
?>
