<?php


if ($_SERVER["REQUEST_METHOD"] === 'GET') {

    //$id = $_GET['id'] ?? 1; // Beispiel: edit_department.php?id=3
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', 'phpp@ssw0rt');
    $sql = 'Select * from department where id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);




if ($result) {
    $name = $result['name'];
    $is_hiring = $result['is_hiring'];
    $work_mode = $result['work_mode'];
    $checked = $is_hiring ? 'checked' : '';
} else {
    $name = '';
    $is_hiring = 0;
    $work_mode = '';
    $checked = '';
}


    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Department</title>
    </head>
    <body>
    <h1>Update Department</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

        <label>
            Name:
            <input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($name) ?>">
        </label><br><br>

        <label>
            Is hiring?
            <input type="checkbox" name="is_hiring" value="1" <?= $checked ?>>
        </label><br><br>

        <label>
            <input type="radio" name="work_mode" value="onsite" <?= $work_mode === 'onsite' ? 'checked' : '' ?>> Onsite
        </label><br>
        <label>
            <input type="radio" name="work_mode" value="remote" <?= $work_mode === 'remote' ? 'checked' : '' ?>> Remote
        </label><br>
        <label>
            <input type="radio" name="work_mode" value="hybrid" <?= $work_mode === 'hybrid' ? 'checked' : '' ?>> Hybrid
        </label><br><br>

        <input type="submit" value="Submit">
    </form>
    </body>
    </html>
<?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $name = $_POST['name'];
    $id = $_POST['id'];
    $is_hiring = isset($_POST['is_hiring']) ? 1 : 0;
    $work_mode = $_POST['work_mode'] ?? null;

    $conn = new PDO('mysql:host=localhost;dbname=company','phpstorm','phpp@ssw0rt');
    $sql = "UPDATE  department
            set name = :name, is_hiring = :is_hiring, work_mode = :work_mode
            where id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':is_hiring', $is_hiring, PDO::PARAM_INT);
    $stmt->bindParam(':work_mode', $work_mode);
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->execute();

    echo "✅ Daten wurden erfolgreich aktualisiert!";
//header("refresh:2;url=read.php"); // nach 2 Sekunden weiterleiten
exit();
}
$stamp = new Datetime('now')
?>

