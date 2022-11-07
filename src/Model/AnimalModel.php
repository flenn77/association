<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * Model permettant de récupérer les catégories
 * 
 * @method array<object> findAll()
 * @method object find(int $id)
 */
final class AnimalModel extends DefaultModel{
    
    protected string $table = 'animal';
    protected string $entity = 'Animal';

    public function save(object $criteria): void
    {
    }
}