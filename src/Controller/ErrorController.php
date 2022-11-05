<?php
namespace App\Controller;

use Core\Controller\DefaultController;

final class ErrorController extends DefaultController {

    public function error(\Exception $e)
    {
        $this->render('error/error', [
            'exception' => $e
        ]);
    }

    public function error404()
    {
        $this->render('error/404');
    }

    // public function authentificationError($name = '', $message ='', $class = 'form-message form-message-red') {
    //     if (!empty($name)) {
    //         if (!empty($message) && empty($_SESSION['name'])) {
    //             $_SESSION[$name] = $message;
    //             $_SESSION[$name . '_class'] = $class;
    //         } else if (empty($message) && !empty($_SESSION['name'])) {
    //             $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : $class;
    //             echo '<div class="' . $class . '" >' . $_SESSION[$name] . '</div>';
    //             unset($_SESSION[$name]);
    //             unset($_SESSION[$name . '_class']);
    //         }
    //     }
    // }
}