<?php
namespace App\Model;

use Core\Model\DefaultModel;

class DonationModel extends DefaultModel
{
    protected string $table = 'donation';
    protected string $entity = 'Donation';
}