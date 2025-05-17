<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if ($_GET["invalid"])
    {
        echo "Mauvais mot de passe ou courriel";
    }
?>
    <!-- TODO: faire la verification d'email cote client-->
    <form action="../controller/auth.redirect.php" method="post">
        <input type="text" name="email">
        <input type="password" name="mdp">
        <input type="submit" value="S'authentifier">
    </form>
</body>
</html>