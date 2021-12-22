<html>

<head>
    <title>Task 3.4</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    if (isset($_POST['array'])) {
        $message = "";
        $result = "";
        $numArray = array();
        $trimmedtext = trim($_POST['array']);
        $explodedText = explode(',', $trimmedtext);
        for ($i = 0; $i < count($explodedText); $i++) {
            $explodedText[$i] = trim($explodedText[$i]);
        }
        for ($i = 0; $i < count($explodedText); $i++) {
            if (preg_match('/\d+/', $explodedText[$i]) === 1) {
                $number = (int) $explodedText[$i];
                if ($number < 100 && $number > 0) {
                    $numArray[] = $number;
                } else {
                    $message = "Numbers must be in the range 1 to 100";
                    break;
                }
            } else {
                $message = "Array must contain only numbers";
                break;
            }
        }
        if(count($numArray) == count($explodedText)){
            $message = "Okay... Here you go:";
            for($i = 0; $i < count($numArray); $i++){
                $spaces = "";
                $selectednumber = $numArray[$i];
                for($j = 0; $j < $selectednumber; $j++){
                    $spaces .= "&nbsp;";
                }
                $result .= "<p>$selectednumber: ".'<span style="background-color: #ff0000;">'.$spaces."</span></p>";
            }
        }
    }
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <input type="text" name="array">
        <input type="submit" value="Відправити">
    </form>
    <p style="color: #ff0000;"><? if (isset($message)){echo $message;} ?></p>
    <p><?if (isset($result)){echo $result;}?></p>
</body>

</html>