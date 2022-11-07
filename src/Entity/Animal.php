<?php
namespace App\Entity;

final class Animal
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
    private string $surnomAnimal;

    /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */
    private string $especeAnimal;

    /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */
    private string $raceAnimal;

    /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var integer
     */
    private string $ageAnimal;


        /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */
    private string $couleurAnimal;
        /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */

    private string $descriptionAnimal;


        /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */
    private string $imageAnimal;
        /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var integer
     */
    private string $dateArivee;
       
    
    /**
     * Nom de la catégorie
     * UNIQUE string 65
     *
     * @var string
     */
    private string $statutAnimal;

    



    public function getId(): int
    {
        return $this->id;
    }

    public function getSurnomAnimal(): string
    {
        return $this->surnomAnimal;
    }

    public function getEspeceAnimal(): string
    {
        return $this->especeAnimal;
    }

    public function getRaceAnimal(): string
    {
        return $this->raceAnimal;
    }

    public function getAgeAnimal(): int
    {
        return $this->ageAnimal;
    }

    public function getCouleurAnimal(): string
    {
        return $this->couleurAnimal;
    }

    public function getDescriptionAnimal(): string
    {
        return $this->descriptionAnimal;
    }

    public function getImageAnimal(): string
    {
        return $this->imageAnimal;
    }

    public function getDateArivee(): string
    {
        return $this->dateArivee;
    }

    public function getStatutAnimal(): string
    {
        return $this->statutAnimal;
    }
}
