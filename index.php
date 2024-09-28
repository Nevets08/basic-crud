<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Mes articles</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Accueil</a></li>
            </ul>
        </header>
    </div>
</body>

</html>

<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=basic-crud", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$datas = $conn->query("SELECT * FROM articles")->fetchAll();

foreach ($datas as $data) {
    echo 
        '<div class="card mb-3">
            <div class="card-header">Crée le ' . $data['created_at'] . '</div>
        <div class="card-body">
            <h5 class="card-title"> ' . $data['name'] . ' </h5>
            <p class="card-text">' . substr($data['description'], 0, 160) . '...' . '</p>
            <a href="#" class="btn btn-primary">Voir plus</a>
            <a href="#" class="btn btn-warning">Modifier</a>
            <a href="#" class="btn btn-danger">Supprimer</a>
            </div>
        </div>';
}

?>