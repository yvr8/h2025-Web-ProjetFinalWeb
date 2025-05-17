<?php

abstract class Session
{
    /**
     * Initialise les paramètres de session.
     */
    public function __construct()
    {
        require_once __DIR__."/../../../config/config.bd.include.php";
                
        ini_set("session.cookie_lifetime", DUREE_SESSION); // Durée de la session en secondes
        ini_set("session.use_cookies", 1);
        ini_set("session.use_only_cookies" , 1);
        ini_set("session.use_strict_mode", 1);
        ini_set("session.cookie_httponly", 1);
        ini_set("session.cookie_secure", 1);// 0 pour docker local. 1 en production sur techninfo420.
        ini_set("session.cookie_samesite" , "Strict");
        ini_set("session.cache_limiter" , "nocache");
        ini_set("session.hash_function" , "sha256");

    }

    /** cree la session
     * @param string $sessionName Nom de la session a cree
     * @return void
     */
    public function setSession(string $sessionName)
    {
        session_name($sessionName);

        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }

        session_regenerate_id();
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['proxyip'] = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? null;
        $_SESSION['delai'] = time();
    }

    /** resume la session et de verifier sa validite
     * @param string $sessionName Nom de la session a resume
     * @return bool retourne si la creation de la session c'est bien effectue
     */
    public function getSession(string $sessionName)
    {
        session_name($sessionName);

        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }

        // verifier si les variable sont attribue
        if (!isset($_SESSION['ip'], $_SESSION['proxyip'], $_SESSION['delai'])
        ) {
            $this->supprimer();
            return false;
        }

        // verifier ip client et ip proxy
        if ($_SESSION['ip'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['proxyip'] !== $_SERVER['HTTP_X_FORWARDED_FOR'] ?? null) {
            $this->supprimer();
            return false;
        }

        // verifier le timeout
        if (time() - $_SESSION['delai'] > 60*60*6) {
            $this->supprimer();
            return false;
        }

        // mettre a jour le timeout et demarrer la session
        $_SESSION['delai'] = time();
        return true;
    }
    /**
     * Supprime la session active et antidate le cookie.
     */
    public function supprimer(string $sessionName)
    {
        session_name($sessionName);

        // Une session doit être active et ce doit être la même session que celle qui est à détruire
        if (session_status() == PHP_SESSION_ACTIVE){

            $parametresSession = session_get_cookie_params(); //Pour antidater (détruire) le cookie

            setcookie(
                session_name(), '', time()-60*60*24*30,
                $parametresSession["path"], $parametresSession["domain"],
                $parametresSession["secure"], $parametresSession["httponly"]
            );

            session_destroy(); //La session est effacée
            $_SESSION = array(); //La variable superglobale est supprimée
        }
    }
}


