<?php
class router {
    public $url;
    public $path;

    public function __contruct(){
        $this->url  = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->path = array();

        if(isset($this->url)){
            $request_path = explode('?', $_SERVER['REQUEST_URI']);
            
            $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
            $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
            $path['call'] = utf8_decode($path['call_utf8']);
            if($path['call'] == basename($_SERVER['PHP_SELF'])){
                $path['call'] = '';
            }
            $path['parameters'] = explode('/', $path['call']);
        }
        return $path;
    }

    public function get_host() {
        $url = $this->url;

        return parse_url($url, PHP_URL_HOST);
    }
}