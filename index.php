<!DOCTYPE html>
<html>
<body>

<?php
include 'const.php';
$conn = new mysqli($db_server, $db_user, $db_passwd);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn,$db_name);
$sql = "select name, url from artist limit 5";
$results = $conn->query($sql);

if ($results->num_rows > 0) {
	while($row = $results->fetch_assoc()){
		echo $row['name'] . ' : ' . $row['url'];
		echo "<br>";
	}
} else {
	echo "0 results";
}
$conn->close();
?>
</body>
</html>