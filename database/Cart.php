<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con) == null);
        $this->db = $db;
    }

    //insert into funcrion
    public function insertIntoCart($params = null, $table = 'cart')
    {
        if ($this->db->con != null) {
            if ($params != null) {
                //insert into cart() values()
                $columns = implode(', ', array_keys($params));
                $values = implode(', ', array_values($params));

                //query to insert to db
                $query = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $columns, $values);
                $result = $this->db->con->query($query);
                return $result;
            }
        }
    }
    //get user_id and item_id and add to cart
    public function addToCart($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array('user_id' => $userid, 'item_id' => $itemid);
            $result = $this->insertIntoCart($params);
            if ($result) {
                //Reload cart
                header('Location: ' . $_SERVER['PHP_SELF']);
            }
        }
    }

    //get total price in cart
    public function getTotalPrice($arr)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    //delete item from cart
    public function deleteItem($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id}");

            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    //get item_id's of cart
    public function getCartId($cartArr = null)
    {
        if ($cartArr != null) {
            $cart_id = array_map(function ($value) {
                return $value['item_id'];
            }, $cartArr);
            return $cart_id;
        }
    }

    //insert to wishlist
    public function saveForLater($item_id = null, $saveTo = 'wishlist', $removeFrom = 'cart')
    {
        if ($item_id != null) {
            $query = "INSERT INTO {$saveTo} SELECT * FROM {$removeFrom} WHERE item_id ={$item_id};";
            $query .= "DELETE FROM {$removeFrom} WHERE item_id ={$item_id};";

            $result = $this->db->con->multi_query($query);

            if ($result) {
                header("Location :" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}
