<?php
namespace App\Model;

use App\Entity\User;
use Core\Model\DefaultModel;

/**
 * Model permettant de récupérer et ajouter des utilisateurs dans la BDD
 * 
 * @method object findMailDuplicate(string $bindParam) -> Vérifie si un mail est déjà présent dans la BDD
 * @method void save() -> Ajoute des informations dans la BDD
 * @method object searchUser(string $bindParam) -> Recherche un utilisateur en particulier dans la BDD
 */
final class UserModel extends DefaultModel {
    
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    protected string $table = 'user';
    protected string $entity = 'User';
    
    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Undocumented function
     *
     * @param string $bindParam
     * @return object
     */
    public function findMailDuplicate(string $bindParam): object 
    {
        $stmt = "SELECT id FROM " . $this->table . " WHERE mail = :mail";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->bindParam(":mail", $bindParam, \PDO::PARAM_STR);
        $prepare->execute();

        return $prepare;
    }

    public function searchUser(string $bindParam): object
    {
        $stmt = "SELECT id, mail, password FROM " . $this->table . " WHERE mail = :mail";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->bindParam(":mail", $bindParam, \PDO::PARAM_STR);
        $prepare->execute();

        return $prepare;
    }

    public function save(object $criteria): void
    {
        // var_dump($user());
        $stmt = "INSERT INTO user (nom, prenom, sexe, adresse, codePostal, ville, tel, mail, verifMail, password, statut) 
                 VALUES (:nom, :prenom, :sexe, :adresse, :codepostal, :ville, :tel, :mail, :verifmail, :password, :statut)";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->execute($criteria());
    }

}