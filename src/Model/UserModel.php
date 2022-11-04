<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * Model permettant de récupérer les catégories
 * 
 * @method array<object> findAll()
 * @method object find(int $id)
 */
class UserModel extends DefaultModel {
    
    protected string $table = 'user';
    protected string $entity = 'User';

    public function getByEmail(string $email) 
    {
        $stmt = "SELECT * FROM " . $this->table . " WHERE mail = $email";
        return $this->getData($stmt, true);
    }
}