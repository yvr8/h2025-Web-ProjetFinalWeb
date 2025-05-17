<?php

class Article
{
    private int $idArticle;
    private int $idUser;
    private string $username;
    private string $titre;
    private string $article;

    /**
     * Setter d'article
     */
    public function setIdArticle(?int $p)
    {
        $this->idArticle = $p;
    }
    public function setIdUser(?int $p)
    {
        $this->idUser = $p;
    }
    public function setUsername(?string $p)
    {
        $this->username = $p;
    }
    public function setTitre(?string $p)
    {
        $this->titre = $p;
    }

    public function setArticle(?string $p)
    {
        $this->article = $p;
    }

    /**
     * Getter d'Utilisateur
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getArticle()
    {
        return $this->idArticle;
    }
}