<?php

require_once __DIR__ ."/../controller/Session.abstract.php";

$session = new SessionAuth();
$session->getSession();

class InsertArticle extends Insert
{
    protected string $username;
    protected string $tag;
    protected string $date;
    protected string $content;

    public function __construct(string $email)
    {
        parent::__construct();
    }

    /**
     * Sélection du user selon le courriel
     */
    public function insert()
    {
        try {
            $pdoRequete = $this->connexionWrite->prepare("Insert Into Publication (IdUser, Titre, Article, Enabled) VALUES (:IdUser, :Titre, :Article, true)");

            $pdoRequete->bindParam(":email",$this->email,PDO::PARAM_STR);

            $pdoRequete->execute();

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }
    }

    /*Sélection de plusieurs users*/
    public function selectMultiple()
    {
        return null;
    }

    function Insert()
    {
        // TODO: Implement Insert() method.
    }
}


