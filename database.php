<?php 
class database {
    private $host;
    private $dbusername;
    private $dbpassword;
    private $dbname;

    protected function connect() {
        $this -> host = "localhost";
        $this -> dbusername = "root";
        $this -> dbpassword = "";
        $this -> dbname = "crud";

        $con = new mysqli($this -> host , $this -> dbusername , $this -> dbpassword , $this -> dbname);

        return $con;
    }
}

class query extends database {
    public function getData($field , $table ,  $condition , $like , $order_by_field , $order_by_type , $limit) {
        $sql = "SELECT * FROM $table";
        $result = $this -> connect() -> query($sql);
        if ($result -> num_rows > 0) {
            $arr = array();
            while ($row = $result -> fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        }
        else {
            return 0;
        }
    }
}

/*
SELECT $field FROM $table WHERE $condition LIKE $like ORDER BY $order_by_field $order_by_type LIMIT $limit;
$field -> * name , email
$table -> user 
*/

?>