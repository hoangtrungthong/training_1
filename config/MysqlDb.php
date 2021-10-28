<?php
require 'ConfigDb.php';

class MysqlDb
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get($table)
    {
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($this->conn, $sql);
       return mysqli_fetch_assoc($query);
    }

    public function getOne($table, $key, $value)
    {
        $sql = "SELECT * FROM $table WHERE $key = '$value'";
        $query = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($query);
    }

    public function insert($table, $data)
    {
        $sql = "INSERT INTO $table ";
        $sql.= "(".implode(",",array_keys($data)).') ';
        $sql.= "VALUES ('".implode("','",array_values($data))."')";
        mysqli_query($this->conn, $sql);
    }

    public function update($table, $data=[], $id, $value)
    {
        $sql = "";
        foreach ($data as $key=>$values) {
            $sql.= "$key = '$values',";
        }
        $sql = "UPDATE $table SET " . trim($sql,','). " WHERE $id = $value ";

        mysqli_query($this->conn, $sql);
    }

    public function delete($table, $value)
    {
        $sql = "DELETE FROM $table WHERE id = $value";
        mysqli_query($this->conn, $sql);
    }

}
