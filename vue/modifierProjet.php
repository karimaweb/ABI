<?php
    $title = "Modifier un Projet";
    ob_start();
?>


    
    <form action="index.php?action=modif" method="post">
        <label for="abrege">abrege Projet:</label><br>
        <input type="text" id="abrege" name="abrege" value="<?= isset($projet['abrege']) ? ($projet['abrege']) : '' ?>">


        <label for="nomProjet">nom Projet :</label><br>
        <input type="text" id="nomProjet" name="nomProjet" value="<?= isset($projet['nomProjet']) ? ($projet['nomProjet']) : '' ?>">
        <label for="typeProjet">type Projet :</label><br>
        <input type="text" id="typeProjet" name="typeProjet" value="<?= isset($projet['typeProjet']) ? ($projet['typeProjet']) : '' ?>">


        <input type="hidden" name="codeProjet" value="<?= isset($projet['codeProjet']) ? ($projet['codeProjet']) : '' ?>">
        <button type="submit">Modifier</button>

    </form>

<?php
    $content = ob_get_clean();
    include "baselayout.php";
?>