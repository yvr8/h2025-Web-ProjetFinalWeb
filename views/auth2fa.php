<?php
    require_once __DIR__."/../controller/Session2fa.controller.php";
    new $session 
?>

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
    <form action="../controller/auth2fa.redirect.php" method="post">
        <input type="text" name="2fa">
        <input type="submit" value="Verifier 2fa">
    </form>
</body>
</html>