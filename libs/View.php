<?php
namespace libs;

class View
{
    function fetchPartial($template,$params = array())
    {
        extract($params);
        ob_start();
        include VIEWS_BASEDIR . $template .'.php';
        return ob_get_clean();
    }

    function renderPartial($template, $params = array())
    {
        echo $this->fetchPartial($template,$params);
    }

    function fetch($template, $params = array())
    {
        $content = $this->fetchPartial($template, $params = array());
        return $this->fetchPartial('layout', array('content' => $content));
    }
    
    function render($template, $params = array())
    {
        echo $this->fetch($template, $params);
    }
}