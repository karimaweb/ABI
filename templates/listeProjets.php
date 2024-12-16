<?php
$title = "Les Projets";
ob_start();
?>
<h1>Liste des Projets ABI</h1>
<br>
<table>
    <tr>
        <th>code Projet</th>
        <th>abrege</th>
        <th>nom Projet</th>
        <th>type Projet</th>
    </tr>
    <?php
   
    foreach ($projets as $projet) {
        echo "<tr>";
        echo "<td>{$projet['codeProjet']}</td>";
        echo "<td>{$projet['abrege']}</td>"; 
        echo "<td>{$projet['nomProjet']}</td>";
        echo "<td>{$projet['typeProjet']}</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
$content = ob_get_clean();
include "baselayout.php";  // Inclure le baselayout avec le contenu
?>
