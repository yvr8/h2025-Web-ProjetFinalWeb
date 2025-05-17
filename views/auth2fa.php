<?php
    require_once __DIR__."/../controller/Session2fa.controller.php";
    $session = new Session2FA();
    $session->GetSession()
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
    if (isset($_GET["invalid"]))
    {
        echo "Mauvais code 2fa";
    }
    echo "<p>Code : ".$_SESSION['2faCode']."</p>"
?>
    <form action="../controller/auth2fa.redirect.php" method="post">
        <input type="text" name="2faCode">
        <input type="submit" value="Verifier 2fa">
    </form>
</body>
</html>