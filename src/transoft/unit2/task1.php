<html>

<head>
    <title>Task 2.1</title>
    <meta charset="UTF-8">
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <input type="text" name="text">
        <input type="submit" value="Відправити">
    </form>
    <?php
    if (isset($_POST['text'])) {
        $length = mb_strlen($_POST['text']);
        $firstCheck = mb_strpos($_POST['text'], '@');
        if($firstCheck !== false){
            $secondCheck = mb_strpos($_POST['text'], '.');
            if($secondCheck !== false && $secondCheck < $length-1 && $secondCheck > $firstCheck){
                echo("Email is valid");
            }
            else echo "Email isn`t valid";
        }
        else echo "Email isn`t valid";
    }
    ?>
</body>

</html>