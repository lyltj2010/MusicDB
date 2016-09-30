<?php 
$server = "127.0.0.1"; $user = "root"; $passwd = "1895";
$conn = new mysqli($server, $user, $passwd);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
$musicdb = mysqli_select_db($conn,"MusicDB");
$sql = "Select connt(*) From artist";
$conn->close();
?>
