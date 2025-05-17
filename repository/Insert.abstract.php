<?php
/**
 * Dépendances
 */
require_once __DIR__ . "/../repository/QueryMaster.classe.php";

abstract class Insert
{
    protected PDO $connexionRead;

    public function __construct()
    {
        $connexionRead = new Connexion();
        $this->connexionRead = $connexionRead->getConnexionBdWrite();
    }

    /**
     * Signature de la fonction de insertion d'un enregistrement.
     */
    abstract function Insert();
}