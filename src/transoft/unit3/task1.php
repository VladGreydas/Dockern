<html>
<head>
    <title>Task 3.1</title>
    <meta charset="UTF-8">
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <p>Об'єм двигуна: <input type="number" name="volume" min="0" required></p>
        <p>Тип двигуна: <select name="engine_type" required>
            <option value="gasoline">Бензиновий</option>
            <option value="diesel">Дизельний</option>
        </select></p>
        <p>Рік випуску: <input type="number" name="year" min="1970" max="<?= date("Y")?>" required></p>
        <p>Ціна автомобіля (в євро): <input type="number" name="cost" min="0" max="9999999" required></p>
        <input type="submit" value="Відправити">
    </form>
    <?php
    if (isset($_POST['volume'])) {
        $volume = $_POST['volume'];
        $type = $_POST['engine_type'] == "gasoline" ? 50 : 75;
        $year = $_POST['year'];
        $yearcoef = $year != date("Y") ? (date("Y") - $year) : 1;
        $cost = $_POST['cost'];
        $excise = $type * ($volume / 1000) * $yearcoef;
        $newCost = $cost + $excise;
        echo "Сума акцизу: ".$excise."\nЗагальна сума: ".$newCost;
    }?>
</body>
</html>