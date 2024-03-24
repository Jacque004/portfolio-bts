<?php
include_once("connexionC.php");

if(isset($_POST['inscrire'])) {
    // Vérifier si les champs requis sont définis dans $_POST
    if(isset($_POST['inputnom'], $_POST['inputpseudo'], $_POST['inputemail'], $_POST['inputmdp'], $_POST['confirmmdp'])) {
        // Récupérer les valeurs des champs
        $nom = $_POST['inputnom'];
        $pseudo = $_POST['inputpseudo'];
        $email = $_POST['inputemail'];
        $mdp = $_POST['inputmdp'];
        $cmdp = $_POST['confirmmdp'];
        
        // Vérifier si les mots de passe correspondent
        if($mdp !== $cmdp) {	
            echo 'Veuillez vérifier le mot de passe';
        } else {
            // Exécuter la requête d'insertion dans la base de données
            $query = "INSERT INTO `utilisateur` (`Nom`, `pseudo`, `email`, `mdp`) VALUES (:nom, :pseudo, :email, :mdp)";
            $pdostmt = $pdo->prepare($query);
            $pdostmt->execute([':nom' => $nom, ':pseudo' => $pseudo, ':email' => $email, ':mdp' => $mdp]);
            $pdostmt->closeCursor();
            header('Location: acceuil.html');
            exit;
        }
    } else {
        echo 'Veuillez remplir tous les champs obligatoires';
    }
}
?>
