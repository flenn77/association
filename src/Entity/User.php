<?php

namespace App\Entity;

class User
{

    /**
     * Id de la catégory
     * Il doit être PRIMARY KEY NOT NULL
     *
     * @var integer
     */
    private int $id;

    /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */
    private string $nom;

    /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */
    private string $prenom;

    /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */
    private string $adresse;

    /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var integer
     */
    private string $codePostal;



    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getCodePostal(): int
    {
        return $this->codePostal;
    }
    
}
