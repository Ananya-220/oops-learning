<?php
class database
{
    private $host;
    private $dbusername;
    private $dbpassword;
    private $dbname;

    protected function connect()
    {
        $this->host = "localhost";
        $this->dbusername = "root";
        $this->dbpassword = "";
        $this->dbname = "crud";

        $con = new mysqli($this->host, $this->dbusername, $this->dbpassword, $this->dbname);

        return $con;
    }
}

class query extends database
{
    public function getData($table , $field = '*' ,  $condition_arr = '', $order_by_field = '', $order_by_type = 'desc', $limit = '')
    {
        $sql = "SELECT $field FROM $table";

        if ($condition_arr != '') {
            $sql .= ' WHERE ';
            $c = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key = '$val'";
                } else {
                    $sql .= "$key = '$val' AND ";
                }
            }
        }

        if ($order_by_field != '') {
            $sql .= " ORDER BY $order_by_field $order_by_type ";
        }

        if ($limit != '') {
            $sql .= " LIMIT $limit ";
        }

        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return 0;
        }
    }

    public function insertData($table , $condition_arr)
    {
        $fieldArr = array();
        $valueArr = array();

        if ($condition_arr != '') {
            $c = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {
                $fieldArr[] = $key;
                $valueArr[] = $val;
            }
            $field = implode(" , ", $fieldArr);
            $value = implode("' , '", $valueArr);
            $value = "'" . $value . "'";
            $sql = "INSERT INTO $table ($field) VALUES ($value)";
            $result = $this -> connect() -> query($sql);
        }
    }

    public function deleteData($table , $condition_arr)
    {

        if ($condition_arr != '') {
            $sql = "DELETE FROM $table WHERE ";
            $c = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key = '$val'";
                } else {
                    $sql .= "$key = '$val' AND ";
                }
            }
            $result = $this -> connect() -> query($sql);
        }
    }

    public function updateData($table , $condition_arr , $where_field , $where_value)
    {

        if ($condition_arr != '') {
            $sql = "UPDATE $table SET ";
            $c = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key = '$val'";
                } else {
                    $sql .= "$key = '$val' , ";
                }
            }
            $sql .= " WHERE $where_field = '$where_value'";
            $result = $this -> connect() -> query($sql);
        }
    }

    public function get_safe_str($str){
		if($str!=''){
			return mysqli_real_escape_string($this->connect(),$str);
		}
	}
}

/*
SELECT $field FROM $table WHERE $condition LIKE $like ORDER BY $order_by_field $order_by_type LIMIT $limit;
$field -> * name , email
$table -> user 
*/
