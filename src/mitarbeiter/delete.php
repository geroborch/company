<?php



$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', 'phpp@ssw0rt');
$sql = 'DELETE FROM employees where id = :id';
//$id = $_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

