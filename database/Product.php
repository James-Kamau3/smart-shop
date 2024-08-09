<?php

class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        //dependency injection
        if (!isset($db->con) == null);
        $this->db = $db;
    }

    //fetch data from database
    public function getData($table = 'product')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        //fetch items one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    //get product into cart
    public function getProduct($item_id = null, $table = 'product')
    {
        if (isset($item_id)) {
            $result  = $this->db->con->query("SELECT * FROM {$table} WHERE item_id = {$item_id}");
            $resultArray = array();

            //fetch items one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }
}
