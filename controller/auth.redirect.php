<?php
/*Dependances*/
require_once __DIR__."/../controller/session.controller.php";
require_once __DIR__."/../repository/SelectUtilisateur.classe.php";

/*verifier si email et mdp sont set*/
if (empty($_POST['email']) || empty($_POST['mdp']))
{
    error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormal - mail ou mdp absent: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
    header('Location: ../views/erreur.php?error=422&info=paramettre non-defini');
    die();
}

/*verifier si les parametres sont valides*/
if (!filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL) || !filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT))
{
    //TODO: message quand les identifiants ne sont pas valide dans le view
    error_log("[".date("d/m/o H:i:s e",time())."] Mauvais format d'identifiant identifiant: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
    header('Location: ../views/auth.php?invalid=true');
    die();
}

$email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
$mdp = filter_input(INPUT_POST,"mdp",FILTER_DEFAULT);

// note: contient la class Utilisateur
$selectUser = new SelectUtilisateur($email);
$user = $selectUser->select();

if ($user == null)
{
    error_log("[".date("d/m/o H:i:s e",time())."] Tentative de connection avec un mauvais mot de passe: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
    header("Location: ../views/auth.php?invalid=true");
    die();
}

// Verifie si le mot de passe est correct.
if (!password_verify($mdp, $user->getMdp()))
{
    error_log("[".date("d/m/o H:i:s e",time())."] Mauvais identifiant: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
    header("Location: ../views/erreur.php?error=erreurMdp");
    die();
}

// Si tout est correct -> cree la session et rediriger vers la page de 2fa et envoyer le email avec le code de 2fa
$session = new Session2FA();
$session->setSession($email, $_SERVER['REMOTE_ADDR']);

// Envoie d'un email de double authentification

$subject = 'Code de vérification';
$headers =
    'From: 2fa@techinfo420.ca' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$message = "Votre code de double authentification est : ".$_SESSION['2faCode'];
//TODO: remettre la bonne ligne en commentaire
//mail($_SESSION['courriel'], $subject, $message, $headers);
mail("sigraph@proton.me", $subject, $message, $headers);
error_log("[".date("d/m/o H:i:s e",time())."] Authentification reussite: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
header("Location: ../views/auth2fa.php");