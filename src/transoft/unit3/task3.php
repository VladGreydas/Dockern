<html>

<head>
    <title>Task 3.3</title>
    <meta charset="UTF-8">
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <input type="number" name="height" min="1" max="15">
        <input type="submit" value="Відправити">
    </form>
    <?php
    if (isset($_POST['height'])) {
        $height = $_POST['height'];
        $result = '<div style="display: flex; flex-direction: column; align-items: flex-end;">';
        for($i = 1; $i <= $height; $i++){
            $resString = "";
            $slidepart = "";
            for($j = 0; $j < $height-$i; $j++){
                $resString .= '#';
            }
            for($k = 0; $k < $i+1; $k++){
                $slidepart .= '#';
            }
            $result .= '<p style="margin: 1px;"><span style="color: #ffffff;">'.$resString.'</span>'.$slidepart.'</p>';
        }
        $result .= "</div>";
        echo $result;
    }


    ?>
</body>

</html>