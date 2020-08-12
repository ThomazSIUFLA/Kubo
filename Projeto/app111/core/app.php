<?php

class App{

    protected $controller = "home";

    protected $mothod = "index";

    protected $param = [];

    public function __construct(){
        $url = self::parseUrl(isset ($_GET['url'])? $_GET['url'] : null);

        if (file_exists("app/Controllers/". $url[0].".php")){
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once 'app/Controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        if(isset($url[1]) && method_exists($this->controller, $url[1])){
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->param = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method], $this->param);


    }

    private function parseUrl($url){
        return explode("/", filter_var(rtrim($url),FILTER_SANITIZE_URL));

    }

}

?>