<?php

namespace App\Entity;

use Core\Entity\DefaultEntity;

class Donation extends DefaultEntity
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
    private int $codePostal;

    private string $ville;

    private string $tel;

    private string $mail;

    private int $montant;


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

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
    }

    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;
    }

    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }


    /**
     * Get the value of ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }


    /**
     * Get the value of montant
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @return  self
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    
    public function hydrateUser(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['nom'])) {
            $this->nom = $data['nom'];
        }
        if (isset($data['prenom'])) {
            $this->prenom = $data['prenom'];
        }        
        if (isset($data['adresse'])) {
            $this->adresse = $data['adresse'];
        }
        if (isset($data['codePostal'])) {
            $this->codePostal = $data['codePostal'];
        }
        if (isset($data['ville'])) {
            $this->ville = $data['ville'];
        }
        if (isset($data['tel'])) {
            $this->tel = $data['tel'];
        }
        if (isset($data['mail'])) {
            $this->mail = $data['mail'];
        }
        if (isset($data['montant'])) {
            $this->montant = $data['montant'];
        }
        
    }



}
