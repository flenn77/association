<?php
namespace App\Controller;

use Core\Controller\DefaultController;

/**
 * Controller permettant d'afficher des messages d'erreurs
 * 
 * @method void error() -> Renvoie l'utilisateur sur une page d'erreur
 * @method void erroe404() -> Renvoie l'utilisateur sur une page d'erreur 404
 */
final class ErrorController extends DefaultController 
{
    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Renvoie l'utilisateur sur une page d'erreur avec les détails affichés de celui-ci
     *
     * @param \Exception $e -> objet contenant le code et détail de l'erreur occasionnée
     * @return void
     */
    public function error(\Exception $e)
    {
        // Affichage de la page 'error/error.php' avec des données contenues dans un array
        $this->render('error/error', [
            'exception' => $e
        ]);
    }

    /**
     * Renvoie l'utilisateur sur une page d'erreur 404 exliquant que la page est introuvable
     *
     * @return void
     */
    public function error404()
    {
        // Affichage de la page 'error/404.php'
        $this->render('error/404');
    }
}