<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Credance Info Tech </title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1 style="text-align:center">Credance Info Tech Intern Assignment</h1>
<div id="login"style="margin-left:270px;">
<h2>Login Form</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" style="background-color:#2D2D48; width:100px;" type="submit" value=" Login ">
<a href="register.php"><input name="Register" style="background-color:#2D2D48; float:right; padding:10px; color:white; font-size:20px; width:100px;" type="button" value=" Register "></a>
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>