<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * Model permettant de récupérer et ajouter des réservations dans la BDD
 * 
 * @method void save() -> Ajoute des informations dans la BDD
 */
final class ReservationModel extends DefaultModel
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    protected string $table = 'reservation';
    protected string $entity = 'Reservation';

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