<?php
namespace App\Model;

use Core\Model\DefaultModel;

final class ProduitModel extends DefaultModel
{
    protected string $table = 'produit';
    protected string $entity = 'Produit';

    public function save(object $criteria): void
    {
    }
}