<?php

error_reporting(E_ERROR | E_PARSE);

include(__DIR__ . '/config.php');
$path = ROOTS . "/Utilites/DataProcessor.php";
include($path);

$processor = DataProcessor::GetInstance();

if (!empty($_GET['id'])) {
    $id = $_GET["id"];

    $movie = $processor->GetData(3, $id);

    $title = $movie[0]["title"];
    $genre = $movie[0]['genre'];
    $date = $movie[0]['date_production'];
    $description = $movie[0]['description'];
    $poster = "img/" . $movie[0]['poster_link'];
}

if (isset($_POST["control"])) {
    $ID = intval(strip_tags($_POST['ID']));
    $Title = strip_tags($_POST["title"]);
    $Genre = strip_tags($_POST["genre"]);
    $Date = $_POST["date"];
    $Description = strip_tags($_POST['description']);
    if (isset($_POST['poster'])) $Poster = strip_tags($_POST['poster']);
    else $Poster = $poster;
    $processor->ChangeData($ID, $Title, $Genre, $Date, $Description, $Poster);
    header("Location: http://localhost:8080/ProjectMovieDB/Admin.php");
    exit();
}

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
    <title>Change movie data</title>
</head>

<body>
    <div class="navbar">
        <h2 style="color: #ffffff; position:fixed; left:calc(15% + 10px); top:10px">Add movie to DB</h2>
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
            <h2><strong><em>Change movie data</em></strong></h2>
            <form class="AddForm" action="ChangeInfo.php" method="POST" autocomplete="off">
                <input type="hidden" name="ID" value="<?= $id ?>"><br>
                <p>Title: <input type="text" name="title" value="<?= $title ?>"></p><br>
                <p>Genre: <input type="text" name="genre" value="<?= $genre ?>"></p><br>
                <p>Release date: <input type="date" name="date" value="<?= $date ?>"></p><br>
                <p>Description: <textarea name="description"><?= $description ?></textarea></p><br>
                <img src="<?= $poster ?>">
                <p>Poster: <input type="file" name="poster"></p>
                <input type="submit" name="control" value="OK"><br>
            </form>
        </div>
    </div>
</body>

</html>