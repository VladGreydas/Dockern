<html>

<head>
    <title>Task 2.2</title>
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
        $newString = trim($_POST['text']);
        $newString = preg_replace('/\s+/', ' ', $newString);
        $stringArray = explode(' ', $newString);
        if (count($stringArray) === 3) {
            $name = ucfirst($stringArray[1]);
            $postname = ucfirst($stringArray[2]);
            $result = $stringArray[0]." ".mb_substr($name, 0, 1).". ".mb_substr($postname, 0, 1).".";
            echo $result;
        }
    }
    ?>
</body>

</html>