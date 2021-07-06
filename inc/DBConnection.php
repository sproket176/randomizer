<?php

namespace Randomizer;

use PDO;
use PDOException;

class DBConnection
{
    private string $db_host = '';
    private string $db_username = '';
    private string $db_password = '';
    private string $db_name = '';
    private array $includeTables = [];

    public $conn;

    public function __construct()
    {
        $this->db_host = 'localhost';
        $this->db_name = 'randomizer';
        $this->db_username = 'root';
        $this->db_password = '';
    }

    public function connect()
    {
        try {
            $this->conn = new PDO( 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_username, $this->db_password );
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo 'Unable to connect';
        }
    }

    public function list_tables()
    {
        try {
            $tableList = array();
            $result = $this->conn->query( "SHOW TABLES" );
            while ( $row = $result->fetch( PDO::FETCH_NUM ) ) {
                $tableList[] = $row[0];
            }
            return $tableList;
        } catch ( PDOException $e ) {
            echo $e->getMessage();
        }
    }

    public function update( $table, array $setvals, array $condition )
    {
        try {
            $i = 0;

            foreach ( $setvals as $key => $value ) {
                $setExp[$i] = $key . "='" . $value . "'";
                $i++;
            }

            $setExp = implode( ", ", $setExp );
            $a = 0;

            foreach ( $condition as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }


            $setCondition = implode( " AND ", $setCondition );
            $this->conn->query( "UPDATE $table SET $setExp WHERE $setCondition" );
            echo "Rows updated successfully";
        } catch ( Exception $e ) {
            echo $e->getMessage();
        }
    }

    public function getRowCount( $table )
    {
        $result = $this->conn->query( "SELECT * FROM $table" );
        return $result->rowCount();
    }
}