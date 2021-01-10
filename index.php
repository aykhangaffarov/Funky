<?php
	session_start();

	require "db.php";
	if(!isset($_SESSION["user"])){
		header("Location: login.php");
		die();
	}
	else{
		$sql = 'SELECT `id`, `username`, `password` FROM `account` WHERE `username`="'.$_SESSION["user"].'" and `password`="'.$_SESSION["pass"].'"';
		$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)) {
				$user=$_SESSION["user"];
			}
		}
	}
?>
<html>
	<head>
	<title>AllBuy</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>
	<body class="main" id="mainbody">
		<header>
			<img src="img/homer.png"/>
			<h2><?=$user?></h2>
		</header>
		<nav class="rating">
		Top
		</nav>
		<main class="posts" id="posts">
		<div class="slideshow-container" id="slidecontainer">
    <?php 
	$sql = 'SELECT e.id, e.title, e.title, e.text, e.userid, u.username FROM `posts` AS e INNER JOIN `account` AS u ON e.userid = u.id;';
		$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)) {
				echo'<div class="mySlides">
    <h2 class="title">'.$row["title"].'</h2>
    <p>'.$row["text"].'</p>
    <h3 class="author">'.$row["username"].'</h3>
    <p class="storyid">'.$row["id"].'</h3>
  </div>';
			}
		}
	?>
  </div>
  <img src="img/laugh.png" id="laugh" onclick="like()"/>
  <img src="img/poop.png" id="poop" />
  <p id="emojimessage"></p>
		</main>
		<nav class="rating">
		Top
		</nav>
<script>
var slideIndex = 1;
showSlides(slideIndex);
var currentid=document.getElementsByClassName("storyid")[slideIndex-1].innerHTML;
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var storyid = document.getElementsByClassName("storyid");
  
  if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
  slides[slideIndex-1].style.display = "block";
 currentid=storyid[slideIndex-1].innerHTML;
}
function keyPress(e) {
  e = e || window.event;
  
  if (e.keyCode == '37') {
    plusSlides(-1);
  } else if (e.keyCode == '39') {
    plusSlides(1);
  }
}
document.addEventListener('keydown', keyPress);

function like(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				document.getElementById("emojimessage").innerHTML=this.responseText;
            }
        };
		xmlhttp.open("GET", "/site/like.php?action=" + "like"+"&number="+currentid, true);
		xmlhttp.send();
}
</script>
	</body>
</html>