<?php
namespace libs;

class View
{
    function fetchPartial($template, $params = [])
    {
        extract($params);
        ob_start();
        include VIEWS_BASEDIR . $template . '.php';
        return ob_get_clean();
    }

    function renderPartial($template, $params = [])
    {
        echo $this->fetchPartial($template, $params);
    }

    function fetch($template, $params = [])
    {
        $content = $this->fetchPartial($template, $params);
        return $this->fetchPartial('layout', ['content' => $content]);
    }

    function render($template, $params = [])
    {
        echo $this->fetch($template, $params);
    }
}