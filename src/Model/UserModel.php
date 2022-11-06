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

    public function findMailDuplicate(string $bindParam) {
        $stmt = "SELECT id FROM " . $this->table . " WHERE mail = :mail";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->bindParam(":mail", $bindParam, \PDO::PARAM_STR);
        $prepare->execute();

        return $prepare;
    }

    public function searchUser(string $bindParam) {
        $stmt = "SELECT id, mail, password FROM " . $this->table . " WHERE mail = :mail";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->bindParam(":mail", $bindParam, \PDO::PARAM_STR);
        $prepare->execute();

        return $prepare;
    }

    public function save(User $user)
    {
        // var_dump($user());
        $stmt = "INSERT INTO user (nom, prenom, sexe, adresse, codePostal, ville, tel, mail, verifMail, password, statut) 
                 VALUES (:nom, :prenom, :sexe, :adresse, :codepostal, :ville, :tel, :mail, :verifmail, :password, :statut)";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->execute($user());
    }

}