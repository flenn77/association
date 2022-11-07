<?php
namespace App\Model;

use App\Entity\Donation;
use Core\Model\DefaultModel;

final class DonationModel extends DefaultModel
{
    protected string $table = 'donation';
    protected string $entity = 'Donation';

    public function getByEmail(string $email) 
    {
        $stmt = "SELECT * FROM " . $this->table . " WHERE mail = $email";
        return $this->getData($stmt, true);
    }

    public function save(object $criteria): void
    {
        // var_dump($criteria());
        $stmt = "INSERT INTO donation (nom, prenom, adresse, codePostal, ville, tel, mail, montant) 
                 VALUES (:nom, :prenom, :adresse, :codepostal, :ville, :tel, :mail, :montant)";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->execute($criteria());
    }

    public function Somme(): object
    {
        $stmt = "SELECT SUM(montant) FROM " . $this->table;
        return $this->getData($stmt, true);
    }
}
