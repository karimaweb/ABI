<?php

    include 'modele/modele.php';
    
    function liste_projets(){
        $projets = get_all_projets();
        require "vue/listeProjets.php";
    }

    function ajouter_projet($abrege, $nomProjet, $typeProjet) {
        // Appel de la fonction renommée dans le modèle
        insert_projet($abrege, $nomProjet, $typeProjet);
    
        // Recharge la liste des projets après l'ajout
        $projets = get_all_projets();
    
        // Affiche la liste des projets dans la vue
        require "vue/listeProjets.php";
    }
    // fonction pour supprimer un projet
    function supprimer_projet($codeProjet){

        delete_projet_by_id($codeProjet);
        $projets = get_all_projets();
        require "vue/listeProjets.php";
    
    }
    // fonction modifier projet
    function modifier_projet($codeProjet, $abrege, $nomProjet, $typeProjet){
        update_projet($codeProjet, $abrege, $nomProjet, $typeProjet);
        $projets = get_all_projets();
        require "vue/modifierProjet.php";
    }
    // fonction pour controler les champs saisis
    function control_form_fields($abrege, $nomProjet, $typeProjet) {
        $tErreurs = []; // initialise le tableau d'erreurs
        if (empty($abrege)) {// je teste le champ prenom
            $tErreurs['abrege'] = "Il faut remplir le champ abrege.";
        } elseif (!preg_match("/^[a-zA-Z-]{2,}$/", $abrege)) {// perg_match expression reguliere
            $tErreurs['abrege'] = "Le champ abrege doit comporter au moins 3 caractères .";
        }
        if (empty( $nomProjet)) {
            $tErreurs['nomProjet'] = "Il faut remplir le champ nomProjet.";
        } elseif (!preg_match("/^[a-zA-Z-]{4,}$/", $nomProjet)) {
            $tErreurs['nomProjet'] = "Le nomProjet doit comporter au moins 4 caractères alphabétiques .";
        }
        if (empty( $typeProjet)) {
            $tErreurs['typeProjet'] = "Il faut remplir le champ typeProjet.";
        } elseif (!preg_match("/^[a-zA-Z-]{4,}$/", $typeProjet)) {
            $tErreurs['typeProjet'] = "Le typeProjet doit comporter au moins 4 caractères alphabétiques .";
        }
        return $tErreurs; // elle me retourne un tableau d'erreurs qui fera un element de test dans mon routeur index.php
    }

    function liste_clients(){
    $clients = get_all_clients();
    require "vue/listesclients.php";
    }

    function accueil(){
       require 'vue/login.php';
    }
        
?>










