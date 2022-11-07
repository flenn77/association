<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

final class Animal extends DefaultEntity
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Id de la catégory
     * Il doit être PRIMARY KEY NOT NULL
     *
     * @var integer
     */
    private int $id;

    /**
     * Le surnom de l'animal
     *
     * @var string
     */
    private string $surnomAnimal;

    /**
     * L'espece de l'animal
     *
     * @var string
     */
    private string $especeAnimal;

    /**
     * La race de l'animal
     *
     * @var string
     */
    private string $raceAnimal;

    /**
     * L'âge de l'animal
     *
     * @var string
     */
    private string $ageAnimal;


    /**
     * La couleur de l'animal
     *
     * @var string
     */
    private string $couleurAnimal;
    
    /**
     * La description de l'animal
     *
     * @var string
     */
    private string $descriptionAnimal;


    /**
     * L'image de l'animal
     *
     * @var string
     */
    private string $imageAnimal;
        
    /**
         * La date d'arrivée de l'animal
         *
         * @var string
         */
    private string $dateArivee;
       
    
    /**
     * Le statut de l'animal
     *
     * @var string
     */
    private string $statutAnimal;

    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    // Récuperation de la valeur du champs Id
    public function getId(): int
    {
        return $this->id;
    }

    // Récuperation de la valeur du champs Surnom
    public function getSurnomAnimal(): string
    {
        return $this->surnomAnimal;
    }

    // Récuperation de la valeur du champs Espece
    public function getEspeceAnimal(): string
    {
        return $this->especeAnimal;
    }

    // Récuperation de la valeur du champs Race
    public function getRaceAnimal(): string
    {
        return $this->raceAnimal;
    }

    // Récuperation de la valeur du champs Age
    public function getAgeAnimal(): int
    {
        return $this->ageAnimal;
    }

    // Récuperation de la valeur du champs Couleur
    public function getCouleurAnimal(): string
    {
        return $this->couleurAnimal;
    }

    // Récuperation de la valeur du champs Description
    public function getDescriptionAnimal(): string
    {
        return $this->descriptionAnimal;
    }

    // Récuperation de la valeur du champs Image
    public function getImageAnimal(): string
    {
        return $this->imageAnimal;
    }

    // Récuperation de la valeur du champs DateArivee
    public function getDateArivee(): string
    {
        return $this->dateArivee;
    }

    // Récuperation de la valeur du champs StatutAnimal
    public function getStatutAnimal(): string
    {
        return $this->statutAnimal;
    }
}
