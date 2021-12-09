<?php
error_reporting(E_ERROR | E_PARSE);
include(__DIR__ . '/config.php');
$path = ROOTS . "/Utilites/DataProcessor.php";
include($path);
$processor = DataProcessor::GetInstance();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="vviewport" content="width=device-width, 
            user-scalable=no, 
            initial-scale=1.0, 
            maximum-scale=1.0, 
            minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">


    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Feed</title>
</head>

<body>
    <div class="navbar">
        <h2 style="color: #ffffff; position:fixed; left:calc(15% + 10px); top:10px">Feed Page</h2>
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
                        <a href="Admin.php">Admin</a>
                    </li>
                    <li>
                        <a href="Feed.php">Feed</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="site-body">
            <?php
            $list = $processor->GetData(2);
            foreach ($list as $movie) :
                $date = $movie['date_production'];
                $title = $movie['title'];
                $poster = 'img/' . $movie['poster_link'];
                if (empty($movie['poster_link']) or !file_exists($poster)) $poster = "img/notfound.png";
            ?>
                <div class="movie-body">
                    <img src="<?= $poster ?>" width="100">
                    <div>
                        <h2><?= $title ?></h2>
                        <footer>Release date: <?= $date ?></footer>
                    </div>
                    <a href="MoviePage.php?id=<?= $movie['id'] ?>">More info</a>
                </div>
            <?php
            endforeach
            ?>
        </div>
    </div>
</body>

</html>