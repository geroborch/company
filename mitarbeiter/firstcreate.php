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
        <input type='text' name='fname' placeholder='fname'>
        <input type='text' name='lname' placeholder='lname'>
        <input type='submit'>
    </form>



    </body>
    </html>

    <?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $conn = new PDO('mysql:host=localhost;dbname=company','phpstorm','phpp@ssw0rt');
    $sql = "INSERT INTO employees (fname, lname) VALUES (:fname, :lname)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fname',$fname);
    $stmt->bindParam(':lname',$lname);
    $stmt->execute();
    echo 'Hier soll es in die DB';
}
?>