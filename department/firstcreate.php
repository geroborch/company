<?php
if ($_SERVER["REQUEST_METHOD"] === 'GET'){
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>

    <form action='' method='post'>
        <input type='text' name='name' placeholder='Department Name'>
        <label>
            <input type='checkbox' name='is_hiring' value='1'> Hiring?
        </label>
        <input type='submit'>
    </form>



    </body>
    </html>

    <?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    // Wenn Checkbox nicht angehakt, kommt kein Wert -> Standard 0
    $is_hiring = ['is_hiring'] ?? false;
    $conn = new PDO('mysql:host=localhost;dbname=company','phpstorm','phpp@ssw0rt');
    $sql = "INSERT INTO department (name, is_hiring) VALUES (:name, :is_hiring)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':is_hiring', $is_hiring, PDO::PARAM_INT); // wichtig für INT
    $stmt->execute();

    echo 'Hier soll es in die DB';
}

?>