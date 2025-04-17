<?php

/**
 * Dépendances
 */
require_once __DIR__ . "/../repository/QueryMaster.classe.php";


abstract class Select
{
    protected PDO $connexionRead;

    public function __construct()
    {
        $connexionRead = new Connexion();
        $this->connexionRead = $connexionRead->getConnexionBdRead();
    }

    /**
     * Signature de la fonction de sélection d'un enregistrement.
     */
    abstract function select();

    /**
     * Signature de la fonction de sélection de plusieurs enregistrements.
     */
    abstract function selectMultiple();
}