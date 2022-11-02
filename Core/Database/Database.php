<?php
namespace Core\Database;

class Database {

    /**
     * host de la BDD
     *
     * @var string
     */
    private string $host;

    /**
     * Nom de la BDD
     *
     * @var string
     */
    private string $dbname;

    /**
     * Identifiant de l'utilisateur de la BDD
     *
     * @var string
     */
    private string $user;

    /**
     * Password de l'utilisateur
     *
     * @var string
     */
    private string $password;

    /**
     * Connexion à la BDD
     *
     * @var \PDO|null
     */
    private ?\PDO $pdo;

    /**
     * Exécute la connexion à la BDD
     */
    public function __construct()
    {
        try {
            $this->getConfig();
            $this->pdo = new \PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->user, 
                $this->password,
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Récupère les identifiants de connexion à la BDD
     *
     * @return void
     */
    private function getConfig(): void
    {
        if (file_exists(ROOT. "/config/dbConfig.php")) {
            require_once ROOT. "/config/dbConfig.php";
            $this->host = $dbConfig['host'];
            $this->dbname = $dbConfig['db'];
            $this->user = $dbConfig['user'];
            $this->password = $dbConfig['password'];
        } else {
            throw new \Exception("Le fichier de config de la BDD est manquant", 1);
        }
    }

    /**
     * Retourne la connexion à la BDD
     *
     * @return \PDO|null
     */
    public function getPdo(): ?\PDO
    {
        return $this->pdo;
    }
}