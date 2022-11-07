<?php
namespace App\Model;

use App\Entity\Donation;
use Core\Model\DefaultModel;

/**
 * Model permettant de récupérer et ajouter des dons dans la BDD
 * 
 * @method void Somme() -> Récupère la somme de tous les dons effectués
 * @method void save() -> Ajoute des informations dans la BDD
 */
final class DonationModel extends DefaultModel
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Nom de la table correspondant aux donations dans la BDD
     *
     * @var string
     */
    protected string $table = 'donation';

    /**
     * Nom de l'entity correspondant aux dons
     *
     * @var string
     */
    protected string $entity = 'Donation';

    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Ajoute des informations dans la BDD
     *
     * @param object $criteria -> Valeurs à ajouter
     * @return void
     */
    public function save(object $criteria): void
    {
        // var_dump($criteria());
        $stmt = "INSERT INTO donation (nom, prenom, adresse, codePostal, ville, tel, mail, montant) 
                 VALUES (:nom, :prenom, :adresse, :codepostal, :ville, :tel, :mail, :montant)";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->execute($criteria());
    }

    /**
     * Récupère et additionne la valeur des dons dans la BDD
     *
     * @param object $criteria -> Valeurs à ajouter
     * @return object
     */
    public function Somme(): object
    {
        $stmt = "SELECT SUM(montant) FROM " . $this->table;
        return $this->getData($stmt, true);
    }
}
