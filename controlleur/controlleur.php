<?php
include 'modele/modele.php';
    
    function liste_projets(){
        $projets = get_all_projets();


        require "templates/listeProjets.php";
    }
    function ajouter_projet($abrege, $nomProjet, $typeProjet) {
        // Appel de la fonction renommée dans le modèle
        insert_projet($abrege, $nomProjet, $typeProjet);
    
        // Recharge la liste des projets après l'ajout
        $projets = get_all_projets();
    
        // Affiche la liste des projets dans la vue
        require "templates/listeProjets.php";
    }
    


        
?>