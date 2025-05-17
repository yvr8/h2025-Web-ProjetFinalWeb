<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
</head>
<body>
    <?php
        echo "<h1>Erreur ".$_GET['error']."</h1>";
        echo "<p>".$_GET['info']."</p>"
    ?>
</body>
</html>