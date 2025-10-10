<?php

$request = explode('/',$_SERVER["REQUEST_URI"]);
//var_dump($request);



$entity = $request[1] ?? '';
$method = $request[2] ?? '';
$id     = $request[3] ?? null;


if($entity === ""){
    require_once '../public/index.php';
    exit;
}



    if ($entity === 'department' and $method === 'create') {
        require_once "../src/department/create.php";
    } elseif ($entity === 'department' and $method === 'read') {
        require_once "../src/department/read.php";
    } elseif ($entity === 'department' and $method === 'delete') {
        require_once "../src/department/delete.php";
    } elseif ($entity === 'department' and $method === 'update') {
        require_once "../src/department/update.php";
    } elseif ($entity === 'mitarbeiter' and $method === 'create') {
        require_once "../src/mitarbeiter/create.php";
    } elseif ($entity === 'mitarbeiter' and $method === 'read') {
        require_once "../src/mitarbeiter/read.php";
    } elseif ($entity === 'mitarbeiter' and $method === 'delete') {
        require_once "../src/mitarbeiter/delete.php";
    } elseif ($entity === 'mitarbeiter' and $method === 'update') {
        require_once "../src/mitarbeiter/update.php";
    } else {
        echo '404';
    }


?>

