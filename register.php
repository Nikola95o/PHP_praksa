<?php

require_once "model/Auth.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(Auth::register($_POST['email'], $_POST['name'], $_POST['password1'], $_POST['password2']))
        Auth::login($_POST['email'], $_POST['password1']);
}

if(Auth::is_logged_in())
    header('Location: index.php');

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>
<body>
<form action="" method="post">

    <label for="email">E-mail:</label><br>
    <input type="text" name="email" placeholder="Email"><br>

    <label for="name">Name:</label><br>
    <input type="text" name="name" placeholder="Name"><br>

    <label for="password">Password</label><br>
    <input type="password" name="password1" placeholder="Password"><br>
    <input type="password" name="password2" placeholder="Repeat password"><br>

    <input type="submit" value="Register">
</form>
</body>
</html>