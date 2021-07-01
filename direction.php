<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "task1_robot";
$feedback = "";
$conn = mysqli_connect($servername, $username, $password, $db);
$query = "SELECT * FROM base";
$direction = mysqli_query($conn, $query)->fetch_assoc()['direction'];

echo $direction;
 ?>