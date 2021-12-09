<?
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    error_reporting(E_ERROR | E_PARSE);
    include(__DIR__ . '/config.php');
    $path = ROOTS . "/Utilites/DataProcessor.php";
    include($path);
    $processor = DataProcessor::GetInstance();

    $movie = $processor->GetData(3, $id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="vviewport" content="width=device-width, 
            user-scalable=no, 
            initial-scale=1.0, 
            maximum-scale=1.0, 
            minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">

    <link rel="stylesheet" href="Styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Feed</title>
</head>

<body>
    <?php
    foreach ($movie as $mov) {
        $date = $mov['date_production'];
        $poster = 'img/' . $mov['poster_link'];
        if (empty($mov['poster_link']) or !file_exists($poster)) $poster = "img/notfound.png";
    }
    ?>
    <div class="navbar">
        <h2 style="color: #ffffff; position:fixed; left:calc(15% + 10px); top:10px"><?= $mov['title'] ?></h2>
    </div>
    <div class="main-container">
        <div class="wrapper">
            <div class="sidebar">
                <div class="profile">
                    <h3>MovieDB</h3>
                    <p>Made by Vlad Greydas</p>
                </div>
                <!--profile image & text-->
                <!--menu item-->
                <ul>
                    <li>
                        <a href="javascript:history.go(-1)">Back</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="site-body">
            <div class="desc-upper-div">
                <img src="<?= $poster?>" alt="<?= $mov['title']?>">
                <div>
                    <h1>Title: <?= $mov['title'] ?></h1>
                    <h2>Genre: <?= $mov['genre'] ?></h2>
                    <h4>Release date: <?= $date ?></h4>
                </div>
            </div>
            <h3>Description</h3>
            <p><?= $mov['description'] ?></p>
        </div>
    </div>


</body>

</html>