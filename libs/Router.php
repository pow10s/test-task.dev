<?php
namespace libs;
class Router
{
    public function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $url = $this->getURI();
        $positionOfQuestionMark = strpos($url, '?');
        if ($positionOfQuestionMark == true) {
            $url = substr($url, 0, $positionOfQuestionMark);
        }
        $url = explode('/', $url);
        $controller = ucfirst(array_shift($url)) . 'Controller';
        $action = 'action' . ucfirst(array_pop($url));
        $param = $url;
        $controllerFile = strtok(ROOT . '/controllers/' . $controller . '.php', '?');

        if (file_exists($controllerFile)) {
            include($controllerFile);
            if (!is_callable([$controller, $action])) {
                echo 'Error 404';
            } else {
                $object = new $controller;
                $object->$action();
            }
        }
    }
}
