<html>

<head>
    <title>Task 2.3</title>
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

        $newString = preg_replace('/((http|https|ftp):\/\/([a-z0-9-]+\.)+[a-z]{2,4}+(\/[a-z0-9]+)+)/i', '<a href="$1">link</a>', $_POST['text']);
        echo $newString;
    }
    ?>
</body>

</html>