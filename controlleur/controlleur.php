<?php
require_once 'modele.php';
    
    function liste_projets(){
        $projets = get_all_projets();


        require "templates/listeProjets.php";
    }
?>