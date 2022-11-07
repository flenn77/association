<?php
namespace Core\Model;

use Core\Database\Database;
use Core\Model\InterfaceBDDModel;

abstract class DefaultModel extends Database implements InterfaceBDDModel {

    protected string $table;

    /**
     * Retourne un tableau d'éléments
     *
     * @return array<object>
     */
    public function findAll(): array
    {
        $stmt = "SELECT * FROM ". $this->table; 
        return $this->getData($stmt);
    }

    /**
     * Retourne un objet en fonction de son id
     *
     * @param integer $id
     * @return object
     */
    public function find(int $id): object
    {
        $stmt = "SELECT * FROM " . $this->table . " WHERE id = $id"; 
        return $this->getData($stmt, true);
    }

    public function findBy(string $key, $value): object
    {
        $stmt = "SELECT * FROM " . $this->table . " WHERE $key = $value"; 
        var_dump($stmt);
        return $this->getData($stmt, true);
    }

    /**
     * Modifie une colonne ciblé d'une table de la BDD
     *
     * @param string $keyModif : Colonne à modifier
     * @param [type] $valueModif : Valeur à ajouter
     * @param string $key : Colonne à identifier
     * @param [type] $value : Valeur à identifier
     * @return void
     */
    public function updateBy(string $keyModif, $valueModif, string $key, $value): void
    {
        $stmt = "UPDATE " .$this->table. " SET $keyModif = $valueModif WHERE $key = $value";
        $prepare = $this->pdo->prepare($stmt);
        $prepare->execute();
    }

    public abstract function save(object $criteria): void;
}