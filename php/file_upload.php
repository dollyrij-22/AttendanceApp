<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
	    session_start();	
		$image = $_POST['image'];
		$username = $_SESSION["username"];
		require_once('init.php');	
		$sql ="SELECT username FROM teachers_login WHERE username = '$username'";
		
		$res = mysqli_query($con,$sql);
		
		$id = 0;
		
		while($row = mysqli_fetch_array($res)){
				$id = $row['id'];
		}
		
		$path = "$username.png";
		
		$actualpath = "http://attendance-dr22libraryapp.rhcloud.com/$path";
		
		$sql = "INSERT INTO picture (image) VALUES ('$actualpath')";
		
		if(mysqli_query($con,$sql)){
			file_put_contents($path,base64_decode($image));
			echo "Successfully Uploaded";
		}
		
		mysqli_close($con);
	}
	else
	{
		echo "Error";
	}
	?>