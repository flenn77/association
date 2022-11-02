<?php
namespace App\Manager;

use Core\Database\Database;

class CategoryManager {

    /**
     * Récupère les catégories et les affiches sur une page
     *
     * @return void
     */
    public function getCategories(): void
{
        // On charge PDO
        $pdo = (new Database)->getPdo();
        // On récupère nos catégories
        $stmt = "SELECT * FROM user ORDER BY id ASC";
        $query = $pdo->query($stmt, \PDO::FETCH_OBJ);
        $categorie = $query->fetchAll();

        // On affiche notre liste de catégories sur une page
        require_once ROOT."/templates/category/index.php";
    }
}