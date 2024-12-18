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
                if (isset($_POST["abrege"], $_POST["nomProjet"], $_POST["typeProjet"])) {
                    // Validation des champs
                    $erreurs = control_form_fields($_POST["abrege"], $_POST["nomProjet"], $_POST["typeProjet"]);
                    if (empty($erreurs)) {
                        // Ajouter le projet s'il n'y a pas d'erreur
                        ajouter_projet($_POST["nomProjet"], $_POST["abrege"], $_POST["typeProjet"]);
                        // Pas besoin d'appeler liste_projets() ici pour éviter le doublon
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
        } elseif ($_GET["action"] == "modif") {
            if (isset($_POST['codeProjet'], $_POST['abrege'], $_POST['nomProjet'], $_POST['typeProjet'])) {
                $codeProjet = $_POST['codeProjet'];
                $nomProjet = $_POST['nomProjet'];
                $abrege = $_POST['abrege'];
                $typeProjet = $_POST['typeProjet'];
                
                if (!empty($codeProjet) && !empty($abrege) && !empty($nomProjet) && !empty($typeProjet)) {
                    modifier_projet($codeProjet, $abrege, $nomProjet, $typeProjet); // Modifie un projet
                    echo "<span style='color:green'>Modification réussie</span>";
                    
                } else {
                    throw new Exception("<span style='color:red'>Tous les champs doivent être remplis</span>");
                }
            } else {
                if (isset($_GET['codeProjet'])) { // Récupère l'ID du projet via GET
                    $projet = get_projet_by_id($_GET['codeProjet']);
                    if ($projet) {
                        require "vue/modifierProjet.php"; // Affiche le formulaire
                    } else {
                        throw new Exception("<span style='color:red'>Projet introuvable</span>");
                    }
                } else {
                    throw new Exception("<span style='color:red'>code  projet manquant</span>");
                }
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

