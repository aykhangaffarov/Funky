# Funky
Funky is a sample web-project which is based on users activity and their posts. It is written in PHP language. A user login or registrates to the system and he/she can write a funny post or can see posts by other users which are most liked posts. A post can be liked or disliked(poop smile). Based on these 2 functionalities, a ranking list of top liked posts is shown at right side.

# Technologies that I have used
- PHP <br/>
- MySQL <br/>
- CSS <br/>
- Javascript(AJAX) <br/>


# Configuration
A full project is completed with help of a program called XAMP and it brings mysql and PHP and Tomcat server together. You can use other programs like MAMP, as well. In order to configure project and use it, full folder has to be uploaded to essential path. In XAMPP case, we have "C:\xampp\htdocs" folder and best way is creating a folder called whatever you want(for ex: funky) and cloning this repository inside that folder.
Mysql configuration is something like this:
```
<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="fun";
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	mysqli_set_charset($conn, "utf8");
	
?>
```
In our case, you have to create a database called 'fun' in https://localhost/phpmyadmin/ and upload sql.txt file or just copy queries inside it and execute in 'fun' database. Also, you have to configure your username and password of MySql server in db.php file. After doing these steps, go to https://localhost/funky/index.php or just https://localhost/funky/, it should work and you have to login or registrate in order to continue.
