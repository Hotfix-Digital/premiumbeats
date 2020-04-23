<?php
class dbcon {
    /**
     * 
     * The number of rows returned
     * 
     */
    public $rows;

    /**
     * 
     * The number of queries made
     * 
     */
    public $queries;

    /**
     * 
     * The number of rows affected
     * 
     */
    public $affected;



    /**
     * 
     * Database host
     * 
     */
    protected $dbhost;

    /**
     * 
     * Database name
     * 
     */
    protected $dbname;

    /**
     * 
     * Database user
     * 
     */
    protected $dbuser;

    /**
     * 
     * Database password
     * 
     */
    protected $dbpass;

    /**
     * 
     * Database handler
     * 
     */
    protected $dbhand;

    /** Connect to database server, then specified database */
    public function __construct($dbhost, $dbname, $dbuser, $dbpass) {
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;

        $this->connect();
    }

    public function __destruct() {
        return true;
    }

    public function connect() {
        mysqli_real_connect($this->dbhand, $this->host, $this->dbuser, $this->dbpass);

        if($dbhand->connect_erron){
            $dbhand = null;
        }
    }
}