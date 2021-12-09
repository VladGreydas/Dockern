<?php

error_reporting(E_ERROR | E_PARSE);

include(__DIR__ . '/config.php');
$path = ROOTS . "/Utilites/DataProcessor.php";
include($path);

$processor = DataProcessor::GetInstance();

if (isset($_POST["add"])) {
    $Title = strip_tags($_POST["title"]);
    $Genre = strip_tags($_POST["genre"]);
    $Date = $_POST["date"];
    $Description = strip_tags($_POST['description']);
    $Poster = $_POST['poster'];
    $processor->AddData($Title, $Genre, $Date, $Description, $Poster);
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
    <title>Add movie</title>
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
            <form class="AddForm" action="AddMovie.php" method="POST" autocomplete="off">
                <p>Title: <input type="text" name="title"></p>
                <p>Genre: <input type="text" name="genre"></p>
                <p>Production date: <input type="date" name="date"></p>
                <p>Description: <textarea name="description"></textarea></p>
                <p>Poster: <input type="file" name="poster"></p>
                <input type="submit" name="add" value="OK">
            </form>
        </div>
    </div>
</body>

</html>