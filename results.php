<?php

require_once 'model/Auth.php';
require_once 'model/News.php';

$array = [];

if (Auth::is_logged_in()){
    if(!empty($_GET['search'])){
        $search = trim($_GET['search']);
        $array = News::search($search);
    }
}else{
    echo 'Please login.';
    die();
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Results</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<?php

foreach ($array as $item){
    $item->print();
}

?>

</body>
</html>