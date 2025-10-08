<?php


if ($_SERVER["REQUEST_METHOD"] === 'GET') {


    $id = $_GET['id'];
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', 'phpp@ssw0rt');
    $sql = 'Select * from department where id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $result['name'];

    $id = $result['id'];


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
    <input type='text' name='name' placeholder='name' value='<?= $name ?>'>
    <input type='hidden' name='id' value='<?= $id ?>'>
    <input type='submit'>
</form>

<?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $name = $_POST['name'];
    $id = $_POST['id'];
    $conn = new PDO('mysql:host=localhost;dbname=company','phpstorm','phpp@ssw0rt');
    $sql = "UPDATE  department set name = :name where id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
}
header('location:firstread.php');
?>


