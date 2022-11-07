<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

final class Reservation extends DefaultEntity
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Id de la reservation
     * Il doit être PRIMARY KEY NOT NULL
     *
     * @var integer
     */
    private int $id;

    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Get il doit être PRIMARY KEY NOT NULL
     *
     * @return  integer
     */ 
    public function getId()
    {
        return $this->id;
    }
}