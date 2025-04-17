<?php

class Utilisateur 
{
    private int $id;
    private string $email;
    private string $passwordhash;


    /**
     * Setter d'Utilisateur
     */
    public function setId(int $p)
    {
        $this->id = $p;
    }

    public function setCourriel(string $p)
    {
        $this->email = $p;
    }

    public function setMdp(string $p)
    {
        $this->passwordhash = $p;
    }


    /**
     * Getter d'Utilisateur
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCourriel()
    {
        return $this->email;
    }

    public function getMdp()
    {
        return $this->passwordhash;
    }
}