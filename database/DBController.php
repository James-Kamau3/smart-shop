<?php

class DBController
{

    //properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'ecomm';
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
