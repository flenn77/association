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
    protected ?\PDO $pdo;

    /**
     * Nom de l'entité associée au chargement des données
     *
     * @var string
     */
    protected string $entity;

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
     * Retourne l'instance de connexion à la BDD
     *
     * @return \PDO|null
     */
    public function getPdo(): ?\PDO
    {
        return $this->pdo;
    }

    /**
     * Récupère les données en BDD
     *
     * @param string $stmt requête à exécuter
     * @param boolean $one définit si une seule donnée est à récupérer ou non
     * @return array<object>|object
     */
    protected function getData (string $stmt, bool $one = false): array|object
    {
        $query = $this->pdo->query($stmt, \PDO::FETCH_CLASS, "App\Entity\\". $this->entity);
        if ($one) {
            $data = $query->fetch();
        } else {
            $data = $query->fetchAll();
        }
        // // Je récupère les données de la table catégorie
        // // SELECT * FROM category
        // $data = [
        //     0 => [
        //         'id' => 1,
        //         'name' => "lorem ipsum"
        //     ]
        // ];
        // // Les données doivent être associée à la classe App\Entity\Category
        // // La class Category a 2 properties => $id et $name =>
        // // $category[0] => $id = $data[0]['id']
        // // $category[0] => $name = $data[0]['name']
        // $data = [
        //     new Categorie()
        // ];

        return $data ? 
            $data : 
            throw new \Exception("Aucune donnée n'a été trouvée");
    }
}