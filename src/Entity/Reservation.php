<?php
namespace App\Entity;

class Reservation
{
    /**
     * Id de la reservation
     * Il doit être PRIMARY KEY NOT NULL
     *
     * @var integer
     */
    private int $id;

/**************************************************************** */

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