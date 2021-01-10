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
			<h2>User</h2>
		</header>
		<nav class="rating">
		Top
		</nav>
		<main class="posts" id="posts">
		<div class="slideshow-container" id="slidecontainer">
  <div class="mySlides">
    <h3 class="title">Best day</h3>
    <p>I love you the more in that I believe you had liked me for my own sake and for nothing else</p>
  </div>

  <div class="mySlides">
    <h3 class="title">Bad Day</h3>
    <p>I love you the more in that I believe you had liked me for my own sake and for nothing else</p>
  </div>

  <div class="mySlides">
    <h3 class="title">Worst day</h3>
    <p>I love you the more in that I believe you had liked me for my own sake and for nothing else</p>
  </div>
  </div>
		</main>
		<nav class="rating">
		Top
		</nav>

 
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  
  if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
  slides[slideIndex-1].style.display = "block";
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
</script>
	</body>
</html>