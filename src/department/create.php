<?php


if ($_SERVER["REQUEST_METHOD"] === 'GET') {

    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Department</title>
    </head>
    <body>
    <h1>Create Department</h1>
    <form method="POST" action="">
        <label>Department</label>
        <input type = text id = department name = department><br><br>
        <label> hiring
            <input type= checkbox name="is_hiring" value="1">
        </label><br><br>
        <label>Onsite
            <input type = radio name = work_mode value = onsite >
        </label><br><br>
        <label> remote
            <input type = radio name = work_mode value = remote >
        </label><br><br>
        <label> hybrid
            <input type = radio name = work_mode value = hybrid >
        </label><br><br>

        <input type="submit" value="Create">

    </form>
    </body>
    </html>

    <?php
}



elseif ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $name_department = $_POST["department"];
    $is_hiring = $_POST["is_hiring"] ?? 0;
    $work_mode = $_POST["work_mode"];

    $conn = new PDO("mysql:host=localhost;dbname=company", "phpstorm", "phpp@ssw0rt");
    $sql = /** @lang text */
        "INSERT INTO department (name, is_hiring, work_mode) VALUES (:name_department, :is_hiring, :work_mode)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name_department', $name_department);
    $stmt->bindParam(':is_hiring', $is_hiring);
    $stmt->bindParam(':work_mode', $work_mode);
    $stmt->execute();
    echo "✅ Department wurde eingetragen!";
    header("refresh:1;url=/read.php"); // nach 2 Sekunden weiterleiten
    exit();
}

?>