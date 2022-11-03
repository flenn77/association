<?php
namespace Core\Controller;

class DefaultController {

    protected function render(string $viewPath, array $parameters = [])
    {
        // $parameters = [
        //     'categories' => [
        //         // categories
        //     ],
        //     'posts' => [],
        //     'users' => []
        //     ];
        
        //     foreach ($parameters as $key => $value) {
        //        $$key = $value;
        //        $categories = $value;
        //     }

        // Créé une mémoire tampon
        ob_start();
            // extract() permet de générer des variables à partir des données d'un tableau associatif,
            // la clé devient le nom de la variable.
            extract($parameters);
            // On charge le template appelé dans le controller
            require ROOT. "/templates/$viewPath.php";
        // ob_get_clean récupère les données contenues après le ob_start et les stocke dans la variable $content
        // ob_get_clean vide ensuite la mémoire tampon
        $content = ob_get_clean();
        require_once ROOT . "/templates/base.php";
    }

}