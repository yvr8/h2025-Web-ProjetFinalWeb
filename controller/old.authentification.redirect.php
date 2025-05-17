<?php
 /**
  * Dépendances 
  */
require_once __DIR__."/../controller/Session2FA.controller.php";
require_once __DIR__."/../repository/SelectUtilisateur.classe.php";
require_once __DIR__.'/../model/Utilisateur.model.php';


{
    if (!(filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL) || filter_input(INPUT_POST,"mdp",FILTER_DEFAULT)))
    {
        //TODO: Message d'erreur quand les identifiant ne sont pas valides.
        header("Location: ../views/auth.php?invalid=true");
        exit();
    }
    $email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
    $mdp = filter_input(INPUT_POST,"mdp",FILTER_DEFAULT);
    /**
     * Requête sur la bd avec le email
     */
    $sqlUsers = new SelectUtilisateur($email); //email reçu de la requête http
    $user = $sqlUsers->select();

    if ($user == null)
    {
        header("Location: ../views/auth.php?invalid=true");
        exit();
    }

    if (password_verify($mdp, $user->getMdp()))
    {
        //OK je peux faire la session

        $session = new Session2FA();
        session_start();
        $session->setSession($email, $_SERVER['REMOTE_ADDR']);

        error_log("[".date("d/m/o H:i:s e",time())."] Authentification reussite: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");

        header("Location: ../views/auth2fa.php");
        exit();
    }else 
    {
        //Mauvais mot de passe, rediriger
        error_log("[".date("d/m/o H:i:s e",time())."] Mauvais identifiant: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
        header("Location: ../views/erreur.php?error=erreurMdp");
        exit();
    }

}else 
{
    error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormal - mail ou mdp absent: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/auth.acces.log");
    header("Location: ../views/erreur.php?error=Erreur d'identifiant");
    exit();
}


