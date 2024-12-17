<?php
require_once 'controlleur/controlleur.php';

try {
    // Vérifie si le paramètre action est défini dans l'URL
    if (!isset($_POST["action"])) {
        // Appelle la fonction par défaut pour afficher la liste des projets
        liste_projets();
    } else {
        // Vérifie l'action spécifiée dans l'URL
        if ($_POST["action"] == "ajouter") {
            // Gère l'ajout de projet
            if (isset($_POST["abrege"]) && isset($_POST["nomProjet"])&&($_POST["typeProjet"])) {
                // Vérification des champs du formulaire
                $erreurs = control_form_fields($_POST["abrege"], $_POST["nomProjet"], $_POST["typeProjet"]);

                if (empty($erreurs)) {
                    // Si aucune erreur, ajouter le projet
                    ajouter_projet($_POST["nomProjet"], $_POST["abrege"], $_POST["typeProjet"]);
                    // Afficher la liste des projets après ajout
                    liste_projets();
                } else {
                    // Si des erreurs existent, réafficher le formulaire d'ajout
                    require "templates/ajoutProjet.php";
                }
            } else {
                // Affiche le formulaire d'ajout si aucune donnée n'est envoyée
                require "templates/ajoutProjet.php";
            }
        } else {
            // Si l'action est inconnue, générer une erreur
            throw new Exception("<h1>Action inconnue : {$_GET['action']}</h1>");
        }
    }
} catch (Exception $e) {
    // Gestion des erreurs
    $msgErreur = $e->getMessage();
    echo "<div style='color:red; font-weight:bold;'>Erreur : {$msgErreur}</div>";
}
?>
