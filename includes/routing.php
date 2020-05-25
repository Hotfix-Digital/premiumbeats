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

    public function page_index() {
        global $dbcon;

        $pages = $dbcon->get_results("SELECT pb_post.ID, pb_post.title FROM posts WHERE pb_post.type = 'page' AND posts.deleted = 0");

        if(!$pages) {
            return array(array(), array());
        }
    }

    function get_page_uri($page = 0) {
        if(!$page instanceof post) {
            $page = new post($page);
        }

        if(!$page) {
            return false;
        }


    }

    public function get_host() {
        $url = $this->url;

        return parse_url($url, PHP_URL_HOST);
    }
}