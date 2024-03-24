<?php
session_start();

// Connexion à la base de données
$serveur = "localhost"; 
$utilisateur = "root"; 
$motDePasse = ""; 
$baseDeDonnees = "template"; 

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomProjet = $_POST["nom_projet"];
    $lv = $_POST["lv"];
    $lo = $_POST["lo"];
    $lr = $_POST["lr"];
    $lt = $_POST["lt"];
    $dp = $_POST["dp"];
    $suivi = $_POST["suivi"];
    $autre = $_POST["autre"];
    

    // Insertion des données dans la table de la base de données
    $requete = "INSERT INTO creation (nom_projet, lv, lo, lr, lt, dp, suivi, autre) VALUES ('$nomProjet', '$lv', '$lo', '$lr', '$lt', '$dp', '$suivi', '$autre')";

    if ($connexion->query($requete) === TRUE) {
     // Redirection vers affichage.php après avoir inséré les données
     header("Location: affichage.php");
     exit(); // Assurez-vous de terminer le script après la redirection
 } else {
     echo "Erreur lors de l'enregistrement des données : " . $connexion->error;
 }
}

// Fermeture de la connexion à la base de données
$connexion->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Creation</title>
     <link rel="stylesheet" href="../css/creat.css">
</head>
<body>
     <header>
        <div class="container">
            <div class="logo">
                <a href="inscription.php"><img src="../assets/Outlook-signature_.png" alt="Haussmann"></a>
            </div>
            <div class="lien">
                <a href="#" id="langue">langue</a>
            </div>
            <div class="autre">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                    <g clip-path="url(#clip0_31_179)">
                        <path d="M0.730682 4.6228L9.24439 14.2447C9.28029 14.2852 9.32441 14.3177 9.37382 14.34C9.42322 14.3623 9.47679 14.3738 9.53098 14.3738C9.58517 14.3738 9.63875 14.3623 9.68815 14.34C9.73756 14.3177 9.78168 14.2852 9.81758 14.2447L18.332 4.6228" stroke="black" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_31_179">
                            <rect width="19" height="19" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="connexion">
                <a href="profil.php"><button id="conn">Profil</button></a>
            </div>
        </div>
    </header>
    <form method="POST">
     <div class="accueil">
          <div class="c1">
               <p id="titre" class="t1">Accueil:</p>
               <input type="text" placeholder="Nom du projet" name="nom_projet" id="input1" required>
               <input type="number" placeholder="Log vert" name="lv" id="input1" required>
               <input type="number" placeholder="Log orange" name="lo" id="input1" required>
               <input type="number" placeholder="Log rouge" name="lr" id="input1" required>
               <input type="number" placeholder="Log total" name="lt" id="input1" required>
          </div>
     </div>
     <div class="line">
         
     </div>
     <div class="pourcent">
          <div class="c2">
               <p id="titre">Difficulté en pourcentage</p>
               <input type="number" placeholder="Difficulté" name="dp" id="input2" required>
          </div>
     </div>
     <div class="suivi">
          <div class="c3">
               <p id="titre">Suivi du projet:</p>
               <input type="text" placeholder="suivi du projet" name="suivi" id="input2" required >
          </div>
     </div>
     <div class="autre2">
          <div class="c4">
               <p id="titre">Description:</p>
               <input type="text" placeholder="Description" name="autre" id="input2" required>
          </div>
     </div>
     <input type="submit" placeholder="Soumettre" id="env">
    </form> 
    <footer>
        <p id="r">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
    </footer>
</body>
</html>