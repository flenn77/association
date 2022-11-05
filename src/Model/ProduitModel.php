<?php
namespace App\Model;

use Core\Model\DefaultModel;

class ProduitModel extends DefaultModel
{
    protected string $table = 'produit';
    protected string $entity = 'Produit';
}