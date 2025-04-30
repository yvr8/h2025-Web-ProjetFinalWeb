<?php
 /**
  * Dépendances 
  */
require_once __DIR__."/../controller/Session2fa.controller.php";
require_once __DIR__."/../repository/SelectUtilisateur.classe.php";
require_once __DIR__.'/../model/Utilisateur.model.php';


if (!empty($_POST['2fa']))
{
    if (!(filter_input(INPUT_POST,"2fa", FILTER_VALIDATE_INT)))
    {
        //TODO: Message d'erreur quand les identifiant ne sont pas valides.
        header("Location: ../views/auth.php?invalid=true");
        exit();
    }

    $session = new Session2FA();
    session_start();
    $session->validerSession();

    if ($_SESSION['2faCode'] == $_POST['2fa'])
    {
        //OK je peux faire la session

        $session = new SessionFinale();
        session_start();
        $session->setSession($email, $_SERVER['REMOTE_ADDR']);

        error_log("[".date("d/m/o H:i:s e",time())."] Authentification 2FA reussite: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
        header("Location: ../views/index.php");
        exit();
    }else 
    {
        //Mauvais mot de passe, rediriger
        error_log("[".date("d/m/o H:i:s e",time())."] Mauvais 2FA: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
        header("Location: ../views/auth2fa?invalid=true");
        exit();
    }

}else 
{
    error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormal - mail ou mdp absent: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
    header("Location: ../views/erreur.php?error=Erreur d'identifiant");
    exit();
}


