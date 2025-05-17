<?php

require_once __DIR__."/../controller/Session.abstract.php";
require_once  __DIR__."/../repository/SelectUtilisateur.classe.php";

class SessionAuth extends Session
{
    /*initialiser les parametres de session*/
    public function __construct()
    {
        session_name("Authentified");
        parent::__construct();
    }

    /**
     * premiere appelle de la session. normallement utilise au moments ou l'utilisateur rentre ses identifiants
     */
    public function setSession(string $p, string $remote)
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        session_regenerate_id();
        $_SESSION['authentified'] = 0;
        $_SESSION['courriel'] = $p;
        $_SESSION['ip'] = $remote;
        $_SESSION['delai'] = time();
    }

    /**
     * valider si la session appartient bien au client
     * retourne un bool pour la validite de la session.
     * note: rediriger l'utilisateur quand il est false vers le contenus souhaite
     */
    public function getSession()
    {

        //demarrer la session si elle n'est pas encore demarre
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // verifier si
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
        if (time() - $_SESSION['delai'] > 60*60*24*7) {
            $this->supprimer();
            return false;
        }

        // mettre a jour le timeout et demarrer la session
        $select = new SelectUtilisateur($_SESSION['courriel']);
        $select
        $_SESSION['delai'] = time();
        $_SESSION['authentified'] =
        return true;
    }

    public function DeleteSession()
    {
        $this->supprimer();
    }
}
?>