<?php
class post {
    public $ID = 0;
    public $author_id = 0;
    public $created = '0000-00-00 00:00:00';
    public $title = '';
    public $content = '';
    public $slug = '';
    public $type = '';
    public $status = '';
    public $deleted = 0;
    public $modified = '0000-00-00 00:00:00';

    public function __construct($post = null) {
        if($post) {
            foreach($post->fetch_array() as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function get_data($ID) {
        global $dbcon;

        if(empty($ID) || !is_numeric($ID)) {
            return false;
        }

        $post = $dbcon->get_row("SELECT * FROM pb_post WHERE pb_post.ID = $ID LIMIT 1");

        if($post) {
            return $post;
        } else {
            return false;
        }
    }
}