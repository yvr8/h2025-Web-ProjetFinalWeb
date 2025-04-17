<?php

require_once __DIR__.'/../repository/Select.abstract.php';
require_once __DIR__.'/../model/Utilisateur.model.php';

class SelectUtilisateur extends Select
{
    protected string $email;
    protected string $mdp;
    protected Utilisateur $user;

    public function __construct(string $email)
    {
        $this->email = $email;
        $this->user = new Utilisateur();
        parent::__construct(); 
    }
    

    
    /**
     * Sélection du user selon le courriel
     */
    public function select()
    {
        try {
            $pdoRequete = $this->connexionRead->prepare("select * from Users where email=:email");
    
            $pdoRequete->bindParam(":email",$this->email,PDO::PARAM_STR);
        
            $pdoRequete->execute();
    
            $user = $pdoRequete->fetch(PDO::FETCH_OBJ);

            $this->user->setId($user->idUsers);
            $this->user->setCourriel($user->Email);
            $this->user->setMdp($user->PasswordHash);

            return $this->user;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }        
    }



    /**
     * Sélection de plusieurs users
     */

     public function selectMultiple()
     {
        null;
     }
}


