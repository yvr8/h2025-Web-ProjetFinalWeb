<?php
require_once __DIR__."/../controller/Session.abstract.php";

$session = new SessionAuth();
$session->getSession()
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <script src="/Controller/index.js"></script>
    <title>F/home</title>
</head>
<body>
<div id="main-content-container">
    <header>
        <img src="images/glados.png" alt="logo patate glados">
        <a href="#">Accueil</a>
        <a href="#">Groupes</a>
        <a href="recherche.html">Recherche</a>
        <a href="publier.html">Publier</a>
        <a href="#">Compte</a>
    </header>
    <article>

    </article>
    <footer>

    </footer>
</div>
</body>
</html>