<?php
namespace App\Model;

use Core\Model\DefaultModel;

final class ReservationModel extends DefaultModel
{
    protected string $table = 'reservation';
    protected string $entity = 'Reservation';

    public function save(object $criteria): void
    {
    }
}