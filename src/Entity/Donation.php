<?php

namespace App\Entity;

use Core\Entity\DefaultEntity;

final class Donation extends DefaultEntity
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Id du Don
     * @var integer
     */
    private int $id;

    /**
     * Nom du Donateur
     * @var string
     */
    private string $nom;

    /**
     * Prénom du Donateur
     * @var string
     */
    private string $prenom;

    /**
     * Adresse du Donateur
     * @var string
     */
    private string $adresse;

    /**
     * Code postal du Donateur
     * @var integer
     */
    private int $codePostal;

    /**
     * ville du Doanteur
     *
     * @var string
     */
    private string $ville;

    /**
     * Numéro de téléphone du Donateur
     *
     * @var string
     */
    private string $tel;

    /**
     * Mail du Donateur
     *
     * @var string
     */
    private string $mail;

    /**
     * Montant du Don
     *
     * @var integer
     */
    private int $montant;

    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    // Récuperation de la valeur du champs Id
    public function getId(): int
    {
        return $this->id;
    }

    // Récuperation de la valeur du champs Nom
    public function getNom(): string
    {
        return $this->nom;
    }

    // Récuperation de la valeur du champs Prénom
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    // Récuperation de la valeur du champs Adresse
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    // Récuperation de la valeur du champs CodePostal
    public function getCodePostal(): int
    {
        return $this->codePostal;
    }

    // Attribution de valeur au champs Nom
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    // Attribution de valeur au champs Prenom
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
    }

    // Attribution de valeur au champs Adresse
    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;
    }

    // Attribution de valeur au champs codePostal
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }


    // Récuperation de la valeur du champs Ville
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

    // Récuperation de la valeur du champs Mail
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


    // Récuperation de la valeur du champs Montant
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

    
    // public function hydrateUser(array $data)
    // {
    //     if (isset($data['id'])) {
    //         $this->id = $data['id'];
    //     }
    //     if (isset($data['nom'])) {
    //         $this->nom = $data['nom'];
    //     }
    //     if (isset($data['prenom'])) {
    //         $this->prenom = $data['prenom'];
    //     }        
    //     if (isset($data['adresse'])) {
    //         $this->adresse = $data['adresse'];
    //     }
    //     if (isset($data['codePostal'])) {
    //         $this->codePostal = $data['codePostal'];
    //     }
    //     if (isset($data['ville'])) {
    //         $this->ville = $data['ville'];
    //     }
    //     if (isset($data['tel'])) {
    //         $this->tel = $data['tel'];
    //     }
    //     if (isset($data['mail'])) {
    //         $this->mail = $data['mail'];
    //     }
    //     if (isset($data['montant'])) {
    //         $this->montant = $data['montant'];
    //     }
        
    // }

    // Récuperation de la valeur du champs Tel
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
}
