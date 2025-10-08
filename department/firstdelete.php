<?php



$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', 'phpp@ssw0rt');
$sql = 'DELETE FROM department where id = :id';
$id = $_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:firstread.php');

