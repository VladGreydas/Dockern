<?php

error_reporting(E_ERROR | E_PARSE);

include(__DIR__ . '/config.php');
$path = ROOTS . "/Utilites/DataProcessor.php";
include($path);

$processor = DataProcessor::GetInstance();

if (isset($_GET['del'])) {
    $del = $_GET['del'];
    $processor->DeleteData($del);
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

    <link rel="stylesheet" href="Styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Administration Page</title>
</head>

<body>
    <div class="navbar">
        <h2 style="color: #ffffff; position:fixed; left:calc(15% + 10px); top:10px">Administration Page</h2>
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
                    <li>
                        <a href="AddMovie.php">Add new movie</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="site-body">
            <table class="admin-table">
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Production date</th>
                    <th>Delete</th>
                    <th>Change</th>
                </tr>
                <?php

                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }

                
                $list = $processor->GetData(2);

                $size_page = 10;
                $leftoffset = ($pageno - 1) * $size_page;
                $rightoffset = $pageno*$size_page > count($list) ? count($list) : $pageno * $size_page + 1 ;
                // $rightoffset = $pageno * $size_page;
                $total_pages = ceil(count($list) / $size_page);

                $result = '';

                for($i = $leftoffset+1; $i < $rightoffset; $i++){
                    $result .= '<tr>';
                    $result .= '<td class="title-column">' . $list[$i]['title'] . '</td>';
                    $result .= '<td class="genre-column">' . $list[$i]['genre'] . '</td>';
                    $result .= '<td>' . $list[$i]['date_production'] . '</td>';
                    $result .= '<td><a href="?del=' . $list[$i]['id'] . '">Delete movie</a></td>';
                    $result .= '<td><a href="ChangeInfo.php?id=' . $list[$i]['id'] . '">Change info</a></td>';
                    $result .= '</tr>';
                }

                // foreach ($list as $movie) {
                //     $result .= '<tr>';
                //     $result .= '<td class="title-column">' . $movie['title'] . '</td>';
                //     $result .= '<td class="genre-column">' . $movie['genre'] . '</td>';
                //     $result .= '<td>' . $movie['date_production'] . '</td>';
                //     $result .= '<td><a href="?del=' . $movie['id'] . '">Delete movie</a></td>';
                //     $result .= '<td><a href="ChangeInfo.php?id=' . $movie['id'] . '">Change info</a></td>';
                //     $result .= '</tr>';
                // }
                echo $result;
                ?>
            </table>
            <ul class="pagination">
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?>">
                    <a href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno - 1);
                                } ?>">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?>">
                    <a href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno + 1);
                                } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
        </div>
    </div>
</body>

</html>