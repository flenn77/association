<?php
namespace App\Model;

use App\Entity\User;
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

    public function save(User $user)
    {
        // var_dump($user());
        $stmt = "INSERT INTO user (nom, prenom, sexe, adresse, codePostal, ville, tel, mail, password, statut) 
                 VALUES (:nom, :prenom, :sexe, :adresse, :codepostal, :ville, :tel, :mail, :password, :statut)";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->execute($user());
    }
}