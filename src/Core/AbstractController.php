<?php

namespace App\Core;

use App\Core\SessionManager;

//Clase abstracta del Controller que cada uno heredará. Contiene las funciones para renderizar un TWIG y guardar variables de sesión.
abstract class AbstractController
{

    private $twig;
    protected $sessionManager;
    public function __construct()
    {
        $this->sessionManager = new SessionManager();

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
        $this->twig = new \Twig\Environment($loader);
        $this->sessionManager->setTemplateEngineAvailable($this->twig);
    }

    public function render($template, $params)
    {
        $template = $this->twig->load($template);
        echo $template->render($params);
    }
}
