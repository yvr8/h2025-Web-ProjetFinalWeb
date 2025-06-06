<?php

require_once __DIR__."/../controller/Session.abstract.php";

class Session2FA extends Session
{
    /*initialiser les parametres de session*/
    public function __construct()
    {
        session_name("2fa");
        parent::__construct();
    }

    /**
     * premiere appelle de la session. normallement utilise au moments ou l'utilisateur rentre ses identifiants
     * @throws \Random\RandomException
     */
    public function SetSession(string $p, string $remote)
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        session_regenerate_id();
        $_SESSION['courriel'] = $p;
        $_SESSION['ip'] = $remote;
        $_SESSION['delai'] = time();
        $_SESSION['2faCode'] = random_int(100000, 999999);
    }

    /**
     * valider si la session appartient bien au client
     * retourne un bool pour la validite de la session.
     * note: rediriger l'utilisateur quand il est false vers le contenus souhaite
     */
    public function GetSession()
    {
        //demarrer la session si elle n'est pas encore demarre
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }

        // verifier si les variable de session sont initie
        if (!isset($_SESSION['courriel'], $_SESSION['ip'], $_SESSION['delai'])
        ) {
            $this->supprimer();
            return false;
        }

        // verifier ip client
        if ($_SESSION['ip'] !== $_SERVER['REMOTE_ADDR']) {
            $this->supprimer();
            return false;
        }

        // verifier le timeout
        if (time() - $_SESSION['delai'] > 60*30) {
            $this->supprimer();
            return false;
        }

        // mettre a jour le timeout
        $_SESSION['delai'] = time();
        return true;
    }

    public function DeleteSession()
    {
        $this->supprimer();
    }
}
