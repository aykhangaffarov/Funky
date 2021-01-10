<?php
	session_start();
	
	$message="";
	$action="";
	$submition="Sign Up";
	if(isset($_POST["action"])){
		$action=$_POST["action"];
	}
		if(isset($_POST["submition"])){
		$submition=$_POST["submition"];
	}
	require "db.php";
	switch ($action) {
	case "login";
	$sql = 'SELECT `id`, `username`, `password` FROM `account` WHERE `username`="'.$_POST["user"].'" and `password`="'.$_POST["pass"].'"';
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		$_SESSION["user"]=$_POST["user"];
		$_SESSION["pass"]=$_POST["pass"];
		header("Location: index.php");
		die();
    }
	else {
	$message="There is no user with these parameters. Try a different username or password";
	}
	break;
	case "signup":
	echo($_POST["user"]);
	$sql = 'SELECT `id`, `username`, `password` FROM `account` WHERE `username`="'.$_POST["user"].'"';
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		$message="Try another user name";
	}
	else{
		$sql = 'INSERT INTO `account`(`username`,`password`,`favoritecolor`) VALUES("'.$_POST["user"].'", "'.$_POST["pass"].'", "'.$_POST["favorite"].'")';
		mysqli_query($conn, $sql);
	}
	break;
	}
	mysqli_close($conn);
?>
<html>
	<head>
	<title>AllBuy</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
		<script>
		function checkpass(){
			if(document.getElementById("user").value=="" || document.getElementById("pass").value==""){
				document.getElementById("message").innerHTML="Fill all the gaps";
				return false;
			}
			else{
				return true;
			}
			}
		</script>
	</head>
	<body class="login" id="loginbody">
		<header >Laugh or Die</header>
		<nav>
			<div id="box">
				<form onSubmit = "return checkpass()" id="forum" method="POST">
					<input name="action" value="login" type="hidden"/>
					<input id="user" name="user" type="text" placeholder="Name"/>
					<input id="name" name="pass" type="password" placeholder="Password"/>
					<p id="message"><?=$message?></p>
					<input name="submition" type="submit" value="Log In"/>
				</form>
				Have not an account?
				<br>
				<a id="linkbtn" href="#" onclick="signup()" ><?=$submition?></a>
			</div>
		</nav>
		<?php $message="";?>
		<script>
		
			function signup(){
			if(document.getElementById("linkbtn").innerHTML=="Sign Up"){
				document.getElementById("forum").innerHTML= '<input name="action" value="signup" type="hidden"/>'+
															'<input id="user" name="user" type="text" placeholder="Type a username.."/>'+
															'<input id="pass" name="pass" type="password" placeholder="Type a password.."/>'+
															'<input id="favorite" name="favorite" type="text" placeholder="Write your favorite color.."/>'+
															'<p id="message"><?=$message?></p>'+
															'<input name="submition"  type="submit" value="Sign Up"/>';
			document.getElementById("linkbtn").innerHTML="Log In";
			document.getElementById("message").value="";
			return;
			}
			if(document.getElementById("linkbtn").innerHTML=="Log In"){
				document.getElementById("forum").innerHTML='<input name="action" value="login" type="hidden"/>'+
					'<input id="user" name="user" type="text" placeholder="Name"/>'+
					'<input id="pass" name="pass" type="password" placeholder="Password"/>'+
					'<p id="message"><?=$message?></p>'+
					'<input name="submition" type="submit" value="Log In"/>';
					document.getElementById("linkbtn").innerHTML="Sign Up";
			document.getElementById("message").value="";
			}
			}
		</script>
	</body>
</html>