<?php 
error_reporting(0);
require "init.php";

$username = $_POST["username"];
$password = $_POST["password"];

//$name = "sdf";
//$password = "sdf";

$sql = "SELECT * FROM `teachers_login` WHERE `username`='".$username."' AND `password`='".$password."';";

$result = mysqli_query($con, $sql);

$response = array();

while($row = mysqli_fetch_array($result)){
	$response = array("name"=>$row[0],"password"=>$row[2],"username"=>$row[1]);
}

echo json_encode(array("user_data"=>$response));

?>