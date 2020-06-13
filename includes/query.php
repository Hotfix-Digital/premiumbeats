<?php
class query {
    public $query;
    public $query_vars;

    public $is_404    = false;
    public $is_home   = false;
    public $is_page   = false;
    public $is_search = false;

    public function reset() {
        $this->is_404    = false;
        $this->is_home   = false;
        $this->is_page   = false;
        $this->is_search = false;
    }

    public function parse() {
        
    }
}