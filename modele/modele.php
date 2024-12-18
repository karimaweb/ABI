<?php

    require("connect.php");

    // Connexion à la BDD
    function connect_db() {
        $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
        try {
            $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            $connexion = new PDO($dsn, USER, PASSWD, $option);
            //echo "Connexion réussie";  // Message de confirmation
        } catch (PDOException $e) {
            printf("Echec connexion : %s\n", $e->getMessage());
            exit();
        }
        return $connexion;
    }

    // Création de la liste des projets
    function get_all_projets(){

        $connexion = connect_db();
        $projets = array();
        $sql = "SELECT * from projets";

        foreach ($connexion->query($sql) as $row) {
            $projets[] = $row;
        }
        return $projets;
    }

    function get_projet_by_id($codeProjet)
{

    $connexion = connect_db();
    $sql = "SELECT * from projets WHERE codeProjet = :codeProjet";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':codeProjet', $codeProjet, PDO::PARAM_INT);
    $reponse->execute();
    return $reponse->fetch();
}

    function delete_projet_by_id($codeProjet)
    {
        $connexion = connect_db();
        $sql = " DELETE FROM projets WHERE codeProjet = :codeProjet ";
        $reponse = $connexion->prepare($sql);
        $reponse->bindValue(":codeProjet", intval($codeProjet), PDO::PARAM_INT);
        $reponse->execute();
    }

    function insert_projet($abrege, $nomProjet, $typeProjet) {
        $connexion = connect_db();
        $sql = "INSERT INTO projets(abrege, nomProjet, typeProjet) VALUES (:abrege, :nomProjet, :typeProjet)";
        $reponse = $connexion->prepare($sql);
        $reponse->bindParam(':abrege', $abrege);
        $reponse->bindParam(':nomProjet', $nomProjet);
        $reponse->bindParam(':typeProjet', $typeProjet);
        $reponse->execute();
    }
    function  update_projet($codeProjet, $abrege, $nomProjet, $typeProjet) {
        $connexion = connect_db();
        $sql = "UPDATE projets SET nomProjet = :nomProjet ,abrege = :abrege , typeProjet= :typeProjet WHERE codeProjet = :codeProjet";
        $reponse = $connexion->prepare($sql);
        $reponse->bindValue(":codeProjet", $codeProjet, PDO::PARAM_INT);
        $reponse->bindValue(":abrege", $abrege, PDO::PARAM_STR);
        $reponse->bindValue(":nomProjet", $nomProjet, PDO::PARAM_STR);
        $reponse->bindValue(":typeProjet", $typeProjet, PDO::PARAM_STR);
        $reponse->execute();

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