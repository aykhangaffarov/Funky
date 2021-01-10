<?php 
require "db.php";
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["number"])){
		$number=$_GET["number"];
	}
	switch($action){
		case "like":
		echo 'First number--'.$number;
		$sql = 'SELECT `likenum` from `posts` WHERE `id` ='.$number;
		$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
		$count=$row["likenum"];
		$count+=1;
		}
		$sql = 'UPDATE `posts` SET `likenum`='.$count.' WHERE `id` ='.$number;
		$result = mysqli_query($conn, $sql);
		if($result){
		echo "Liked succesfully";
		}
	}
		else{
			echo "FUCK";
		}
		break;
		}
	?>