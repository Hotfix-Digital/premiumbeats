<?php
class dbcon {
    var $display_errors = false;

    public $num_rows;
    public $insert_id;
    public $last_query;
    public $last_error;
    public $last_result = array();
    public $affected_rows;

    protected $results;

    protected $dbconn; // Database Connection
    protected $dbhost; // Database Host
    protected $dbuser; // Database User
    protected $dbpass; // Database Password
    protected $dbname; // Database Name

    public function __construct($dbhost, $dbuser, $dbpass, $dbname) {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;

        $this->connect();
    }
 
    public function __destruct() {
        return true;
    }

    public function reset() {
        $this->last_error    = '';
        $this->last_query    = null;
        $this->last_result   = array();
        $this->affected_rows = $this->insert_id = $this->num_rows = 0;
    }

    public function connect() {
        if(DEBUG_MODE) {
            $this->dbconn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass);
        } else {
            $this->dbconn = @mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass);
        }

        if(!$this->dbconn) {
            /** Should be killing/bailing */
            $this->last_error = "Error connecting to database.";
        } else {
            $this->database($this->dbname);
        }
    }

    public function clean_string($string) {
        if($this->dbconn) {
            $clean = "'" . $this->dbconn->real_escape_string($string) . "'";
        } else {
            $clean = "'" . addslashes($string) . "'";
        }

        return $clean;
    }

    public function database($dbname, $dbconn = null) {
        if(is_null($dbconn)) {
            $dbconn = $this->dbconn;
        }

        $dbconn->select_db($dbname);
    }

    public function select($table, $data, $where, $output = "assoc") {
        if(!is_array($data) || !is_array($where)) {
            return false;
        }
        
        $fields = $conditions = array();
        foreach($data as $field => $value) {
            if(!is_numeric($value)) {
                $value = $this->clean_string($value);
            }
            $fields[] = "`$field` = $value";
        }

        foreach($where as $field => $value) {
            if(!is_numeric($value)) {
                $value = $this->clean_string($value);
            }
            $conditions[] = "`$field` = $value";
        }

        $SQL = "SELECT $fields FROM $table WHERE $conditions";

        $this->query($SQL);

        if($object == "array") {
            s;
        } elseif($object == "assoc") {
            a;
        }

        return null;
    }

    public function insert($table, $data, $type = 'INSERT') {
        $this->insert_id = 0;

        $fields = $values = array();
        foreach($data as $field => $value) {
            if(!is_numeric($value)) {
                $value = $this->clean_string($value);
            }

            $fields[] = implode(", ", $fields);
            $values[] = implode(", ", $values);
        }

        $SQL = "$type INTO `$table` ($fields) VALUES ($values)";
        $this->query($SQL);
    }

    public function update($table, $data, $where) {
        if(!is_array($data) || !is_array($where)) {
            return false;
        }

        $fields = $conditions = array();
        foreach($data as $field => $value) {
            if(!is_numeric($value)) {
                $value = $this->clean_string($value);
            }
            $fields[] = "`$field` = $value";
        }

        foreach($where as $field => $value) {
            if(!is_numeric($value)) {
                $value = $this->clean_string($value);
            }
            $conditions[] = "`$field` = $value";
        }

        $fields     = implode(", ", $fields);
        $conditions = implode(" AND ", $conditions);

        $SQL = "UPDATE `$table` SET $fields WHERE $conditions";

        $this->query($SQL);
    }

    public function query($query) {
        $this->reset();

        $this->last_query = $query;

        if(!empty($this->dbconn)) {
            $this->dbconn->query($query);
        }

        if(preg_match('/^\s*(insert|update)\s/i', $query)) {
            $this->affected_rows = $this->dbconn->affected_rows;
            if(preg_match( '/^\s*(insert|replace)\s/i', $query)) {
                $this->insert_id = $this->dbconn->insert_id;
            }

            $response = $this->affected_rows;
        } elseif(preg_match('/^\s*(select)\s/i', $query)) {
            $response = $this->dbconn->num_rows;
        }

        return $response;
    }
}
