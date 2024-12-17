<?php
require_once("connect.php");

// Connexion à la BDD
function connect_db()
{
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    try {
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $connexion = new PDO($dsn, USER, PASSWD,$option);
    } catch (PDOException $e) {
        printf("Echec connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

// Création de la liste des clients
function get_all_clients(){

    $connexion = connect_db();
    $clients = array();
    $sql = "SELECT * from clients";

    foreach ($connexion->query($sql) as $row) {
        $clients[] = $row;
    }
    return $clients;
}
?>