<?php
require_once 'modele/modele.php';

function liste_clients(){
    $clients = get_all_clients();
    require "vue/listesclients.php";
}
