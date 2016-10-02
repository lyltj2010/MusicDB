<?php
include 'resources/config.php';
$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
if (mysqli_connect_errno()) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select name, url from artist limit {$_GET['number']}";
$results = mysqli_query($conn,$sql);

// foreach (mysqli_fetch_all($results,MYSQL_ASSOC) as $row) {
// 	echo $row['name'] . ' : ' . $row['url'];
// 	echo "<br>"; 
// }
if (mysqli_num_rows($results) > 0) {
	while($row = mysqli_fetch_assoc($results)){
		echo $row['name'] . ' : ' . $row['url'];
		echo "<br>";
	}
} else {
	echo "0 results";
}

mysqli_close($conn);
?>