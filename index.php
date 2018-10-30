<?php

require_once 'model/Auth.php';
require_once 'model/News.php';

$message = '<div id="HelloMessage">
            <a href="login.php">Log in</a>
            <a href="register.php">Register</a>
            </div>';


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['logout'])){
        Auth::logout();
        header('Location: index.php');
    }
    if (!empty($_GET['search'])){
        $search = trim($_GET['search']);
        $array = News::search($search);
    }else{
        $array = News::getAll();
    }
}

if(Auth::is_logged_in()){
    //$buttons = '<a href="?logout=1">Log out</a>';
    $doc = new DOMDocument();
    $message = $doc->createElement('div', 'Welcome, '.$_SESSION['name']);
    $message->setAttribute('id', 'HelloMessage');

    $buttons = new DOMElement('a', '&nbsp;Log out');
    $message->appendChild($buttons);
    $buttons->setAttribute('href', '?logout=1');

    $message = $doc->saveHTML($message);
}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?= $message ?>
<form action="results.php" method="get" id="searchForm">
    <input type="text" name="search" placeholder="Search">
    <input type="submit" value="Search">
</form>
</body>
</html>