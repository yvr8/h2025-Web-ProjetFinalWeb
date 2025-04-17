<?php

require_once __DIR__."/../../../config/config.bd.include.php"; // Extérieur au dossier public:  /home/user/dossierConfigApp

class Connexion
{
    /** Retourne une connexion avec le driver Mariabd sur la bd. */
    function getConnexionBdWrite()
    {
        try {
            $chaineConnexion = "mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR;

            return new PDO($chaineConnexion,BDUTILISATEURREAD,BDMDP);

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }
    }
    function getConnexionBdRead()
    {
        try {
            $chaineConnexion = "mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR;

            return new PDO($chaineConnexion,BDUTILISATEURWRITE,BDMDP);

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }
    }
}
