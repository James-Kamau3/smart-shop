<?php

class DBController
{

    //properties
    // protected $host = '	sql200.infinityfree.com';
    // protected $user = 'if0_37044196';
    // protected $password = 'Storenow100';
    // protected $database = 'if0_37044196_ecomm';
    // public $con = null;
    
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'ecomm_store';
    public $con = null;

    //constructor to open connection
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if ($this->con->connect_error) {
            echo "Error connecting to server" . $this->con->connect_error;
        }
    }

    //destructor to close connection
    public function __destruct()
    {
        $this->closeConnection();
    }

    protected function closeConnection()
    {
        if ($this->con != null) {
            $this->con->close();
            $this->con = null;
        }
    }
}
