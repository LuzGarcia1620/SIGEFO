<?php
class PostgreSQL
{
    private $host = "localhost";
    private $port = 5432;
    private $dbname = "uaem";
    private $username = "postgres";
    private $password = "root";

    public function connect() {
        $hostDB = "pgsql:host=$this->host;port=$this->port;dbname=$this->dbname";

        try {
            return new PDO($hostDB, $this->username, $this->password);
        } catch (PDOException $e) {
            die("Conexion Fallida: " . $e->getMessage());
        }
    }
}