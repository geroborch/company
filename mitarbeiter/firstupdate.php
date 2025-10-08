<?php

if ($_SERVER["REQUEST_METHOD"] === 'GET') {


    $id = $_GET['id'];
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', 'phpp@ssw0rt');
    $sql = 'Select * from employees where id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $fname = $result['fname'];
    $lname = $result['lname'];
    $id = $result['id'];
    var_dump($result);

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
    <input type='text' name='fname' placeholder='fname' value='<?= $fname ?>'>
    <input type='text' name='lname' placeholder='lname' value='<?= $lname?>'>
    <input type='hidden' name='id' value='<?= $id ?>'>
    <input type='submit'>
</form>
    <?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = $_POST['id'];
    $conn = new PDO('mysql:host=localhost;dbname=company','phpstorm','123456');
    $sql = "UPDATE  employees set fname = :fname , lname = :lname where id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fname',$fname);
    $stmt->bindParam(':lname',$lname);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
}
?>