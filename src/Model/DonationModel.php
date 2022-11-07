<?php
namespace App\Model;

use App\Entity\Donation;
use Core\Model\DefaultModel;

class DonationModel extends DefaultModel
{
    protected string $table = 'donation';
    protected string $entity = 'Donation';

    private int $cent;

    public function getByEmail(string $email) 
    {
        $stmt = "SELECT * FROM " . $this->table . " WHERE mail = $email";
        return $this->getData($stmt, true);
    }

    public function save(Donation $donation)
    {
        var_dump($donation());
        $stmt = "INSERT INTO donation (nom, prenom, adresse, codePostal, ville, tel, mail, montant) 
                 VALUES (:nom, :prenom, :adresse, :codepostal, :ville, :tel, :mail, :montant)";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->execute($donation());
    }


   
}
