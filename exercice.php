<?php
// démarrage de la session OBLIGATOIRE !!!
session_start();


// initialisiation variable firstname
$first_name = "";

// si bouton reset est cliqué, on efface la session
if (isset($_POST["reset"])) {
    unset($_SESSION["newbabe"]);
}

// Priorité à POST d'abord (si un prénom a été soumis via le formulaire)
if (isset($_POST["first_name"])) { // isset verifie l'existence d'un post
    $first_name = $_POST["first_name"];
    $_SESSION["newbabe"] = $first_name; // Sauvegarde dans la session
} elseif (isset($_GET["first_name"])) {  // Si pas de POST, priorité à GET
    $first_name = $_GET["first_name"];
} elseif (isset($_SESSION["newbabe"])) {  // Enfin, vérification dans la session
    $first_name = $_SESSION["newbabe"];
}

// var_dump($_POST); // Affiche ce que contient $_POST

if (!empty($first_name)) { // si la var first_name est initialisée
    echo "Bonjour $first_name"; // alors affichage first_name
} else {
    echo "Bonjour anonyme"; // else si vide
}


?>

<form action="exercice.php" method="post">
    <p>What's your name, dear ? <input type="text" name="first_name" <?php echo $first_name?>/></p>
    <p><input type="submit" value="Press it !"></p>
    <p><input type="submit" name="reset" value="Clear it !"></p>
</form>