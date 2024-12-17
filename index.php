<?php

require_once 'controleur/controleur.php';
// PENSEZ A COMMENTER ET DECOMMENTER LE TRY/CATCH POUR TEST SES PAGES SANS AVOIR A PASSER PAR LA CONNEXION EN ATTENDANT QUE J'AI FINI


// -------DEBUT TRY/CATCH A COMMENTER/DECOMMENTER
// -------DEBUT TRY/CATCH A COMMENTER/DECOMMENTER
// -------DEBUT TRY/CATCH A COMMENTER/DECOMMENTER

try {
    if (!isset($_GET["action"])) {
        // Action par défaut : afficher la liste des projets
        liste_projets();
    } else {
        // Vérifie quelle action est demandée
        if ($_GET["action"] == "suppr") {
            if (isset($_GET["codeProjet"])) {
                // Supprimer un projet
                supprimer_projet($_GET["codeProjet"]);
            } else {
                throw new Exception("<span style='color:red'>Aucun code projet n'a été envoyé</span>");
            }
        } elseif ($_GET["action"] == "ajouter") {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Vérifie si tous les champs nécessaires sont fournis
                if (isset($_POST["abrege"]) && isset($_POST["nomProjet"]) && isset($_POST["typeProjet"])) {
                    // Validation des champs
                    $erreurs = control_form_fields($_POST["abrege"], $_POST["nomProjet"], $_POST["typeProjet"]);
                    if (empty($erreurs)) {
                        // Ajouter le projet s'il n'y a pas d'erreur
                        ajouter_projet($_POST["nomProjet"], $_POST["abrege"], $_POST["typeProjet"]);
                        // Afficher la liste des projets après ajout
                        liste_projets();
                    } else {
                        // Affiche le formulaire avec les erreurs
                        require "vue/ajoutProjet.php";
                    }
                } else {
                    // Affiche le formulaire si des champs sont manquants
                    require "vue/ajoutProjet.php";
                }
            } else {
                // Affiche le formulaire d'ajout si aucune requête POST n'est reçue
                require "vue/ajoutProjet.php";
            }
        } else {
            // Si l'action est inconnue, lève une exception
            throw new Exception("<h1>Action inconnue : {$_GET['action']}</h1>");
        }
    }
} catch (Exception $e) {
    // Gestion des erreurs
    $msgErreur = $e->getMessage();
    echo "<div style='color:red; font-weight:bold;'>Erreur : {$msgErreur}</div>";
}

// --------FIN TRY/CATCH A COMMENTER/DECOMMENTER-------------
// --------FIN TRY/CATCH A COMMENTER/DECOMMENTER-------------
// --------FIN TRY/CATCH A COMMENTER/DECOMMENTER-------------


// ------------CODE POUR TESTER SIMPLEMENT DES LES PAGES-------------

   // if (!isset($_GET["action"])) 
        
    //    liste_clients();




   // try {
   //     if (!isset($_GET["action"])) { 
   //        accueil();
   //     }









   // } catch(Exception $e) {

   // }

?>

