<?php

class Conexion
{
    private $pdo;
    private $pdostatement;
    private $serverName;
    private $dbName;
    private $userName;
    private $pwd;

    public function conectar()
    {
        $serverName = 'localhost';
        $dbName = 'dbkermesse';
        $userName = 'root';
        $pwd = '2503';

        
        try{
            $this->pdo = new PDO("mysql:host={$serverName};dbname={$dbName}",$userName,$pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Se conecto a kermesse exitosamente ";
            return $this->pdo;
        }
        catch(PDOException $e)
        {
            echo "La conexión falló ";
            die($e->getMessage());
        }
        
    }

    public function desconectar()
    {
        try{
            $pdo = null;
            //echo "Se desconecto de kermesse exitosamente";
            return $pdo;
        }
        catch(PDOException $e)
        {
            echo "ERROR: ";
            die($e->getMessage());
        }
    }
}

//Testing
$con = new Conexion();
$con->conectar();
$con->desconectar();