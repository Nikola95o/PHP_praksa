<?php

require_once 'model/Auth.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    var_dump(Auth::login($_POST['email'], $_POST['password']));
}

if(Auth::is_logged_in())
    header('Location: index.php');

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
<form action="" method="post">

    <label for="email">E-mail:</label><br>
    <input type="text" name="email" placeholder="Email"><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" placeholder="Password"><br>

    <input type="submit" value="Log in">
</form>
</body>
</html>

