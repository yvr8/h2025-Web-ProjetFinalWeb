<?php
 /**
  * Dépendances 
  */
require_once __DIR__."/../controller/Session2fa.controller.php";
require_once __DIR__ . "/../controller/SessionAuth.controller.php";
require_once __DIR__."/../repository/SelectUtilisateur.classe.php";

/*verifier si 2fa est set*/
if (empty($_POST['2faCode']))
{
    error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormal - code 2fa absent : Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth2fa.acces.log");
    header('Location: ../views/erreur.php?error=422&info=paramettre non-defini');
    exit;
}

if (!filter_input(INPUT_POST,'2faCode', FILTER_VALIDATE_INT, ))
{
    error_log("[".date("d/m/o H:i:s e",time())."] Mauvais format d'identifiant identifiant: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth2fa.acces.log");
    header('Location: ../views/auth.php?invalid=true');
    exit;
}

$session2fa = new Session2FA();
$session2fa->GetSession();

$email = $_SESSION['courriel'];

if ($_SESSION['2faCode'] == $_POST['2faCode'])
{
    $session2fa->DeleteSession();

    $sessionAuth = new SessionAuth();
    $sessionAuth->setSession($email, $_SERVER['REMOTE_ADDR']);
    error_log("[".date("d/m/o H:i:s e",time())."] Code 2fa correct: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth2fa.acces.log");
    header("Location: ../views/index.php");
}
else
{
    error_log("[".date("d/m/o H:i:s e",time())."] Tentative de connection avec un mauvais 2fa code: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth2fa.acces.log");
    header("Location: ../views/auth2fa.php?invalid=true");
    die();
}