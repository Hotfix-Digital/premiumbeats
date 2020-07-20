<?php
class user {
    public $ID;
    public $data;

    public function __construct($ID = 0, $username = "") {
        if(!empty($ID) && !is_numeric($ID)) {
            $username = $ID;
            $ID = 0;
        }

        if($ID) {
            $data = $this->get_data_by('ID', $ID);
        } else {
            $data = $this->get_data_by('username', $username);
        }

        if($data) {
            $this->init($data);
        }
    }

    public function init($data) {
        $this->data = $data;
        $this->ID   = $data->ID;
    }

    public function get_data_by($type, $value) {
        global $dbcon;

        if($type === 'ID') {
            if(!is_numeric($value)) {
                return false;
            }
        }

        switch($type) {
            case "ID":
                $field = "ID";
            break;
            case "email":
                $field = "email";
            break;
            case "username":
                $field = "username";
            break;
            default:
                return false;
        }

        $user = $dbcon->get_row("SELECT * FROM users WHERE $field = $value");

        if(!$user) {
            return false;
        }

        return $user;
    }
}