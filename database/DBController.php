<?php


class DBController
{

    //properties
    protected $host;
    protected $user;
    protected $password;
    protected $database;
    public $con = null;

    //constructor to open connection
    public function __construct()
    {
        $config = include dirname(__DIR__, 1) . '/config.php';

        $this->host = $config['DB_HOST'];
        $this->user = $config['DB_USER'];
        $this->password = $config['DB_PASSWORD'];
        $this->database = $config['DB_NAME'];

        //Initializing db connection
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
