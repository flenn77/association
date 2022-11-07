<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * Model permettant de récupérer, modifier et ajouter les animaux dans la BDD
 * 
 * @method void save() -> Ajoute des informations dans la BDD
 */
final class AnimalModel extends DefaultModel{
    
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Nom de la table correspondant aux animaux dans la BDD
     *
     * @var string
     */
    protected string $table = 'animal';

    /**
     * Nom de l'entity correspondant aux animaux
     *
     * @var string
     */
    protected string $entity = 'Animal';


    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Ajoute des informations dans la BDD
     *
     * @param object $criteria -> Valeurs à ajouter
     * @return void
     */
    public function save(object $criteria): void
    {
    }
}