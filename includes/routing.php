<?php
class routing {
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

    public function init() {
        $host_url = str_replace('www.', '', parse_url($url, PHP_URL_HOST));
        $home_url = str_replace('www.', '', parse_url(SITE_HOME, PHP_URL_HOST));
    }

    public function is_404() {

    }

    public function is_search() {
        global $url;

        if(preg_match("/(s)=(\d+)/", $url, $data)) {
            if($data) {
                return true;
            }
        }

        return false;
    }

    public function is_home() {
        global $url;

        
    }

    public function is_page() {
        global $url;

        $path = parse_url($url, PHP_URL_PATH);
        $path = explode("/", $path);

        if(count($path) > 2) {
            return true;
        }

        return false;
    }
}