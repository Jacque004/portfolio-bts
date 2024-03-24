
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/affichage.css">
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
                <a href="profil.php"><button id="conn">profil</button></a>
            </div>
        </div>
    </header> 
    <div class="t"><h1 id="titre">Reporting!!</h1></div>
    <?php
    session_start();
    // Connexion à la base de données
    $serveur = "localhost"; 
    $utilisateur = "root"; 
    $motDePasse = "root"; 
    $baseDeDonnees = "template"; 

    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    // Vérification de la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }

    // Requête SQL pour récupérer les données de la base de données
    $requete = "SELECT * FROM creation ORDER BY id DESC LIMIT 1";

    $resultat = $connexion->query($requete);

    if ($resultat->num_rows > 0) {
        // Affichage des données
        while ($row = $resultat->fetch_assoc()) {
            echo "<p id='titre'><strong>" . $row["nom_projet"] . "</p>";
        
     
            echo "<p id='Description'><strong>Description :</strong> " . $row["autre"] . "</p>";
            echo "<p id='log'><strong>Log vert :<br></strong id='number'> " . $row["lv"] . "</p>";
            echo "<p id='log1'><strong>Log orange :<br></strong id='number'> " . $row["lo"] . "</p>";
            echo "<p id='log2'><strong>Log rouge :<br></strong id='number'> " . $row["lr"] . "</p>";
            echo "<p id='log3'><strong>Log total :<br></strong id='number'> " . $row["lt"] . "</p>";
            echo "<p id='diff'><strong>Difficulté en pourcentage :<br></strong id='number'> " . $row["dp"] . "</p>";
            echo "<p id='suivi'><strong>Suivi du projet :</strong> " . $row["suivi"] . "</p>";
          
        
        }
    } else {
        echo "Aucun enregistrement trouvé dans la base de données.";
    }

    // Fermeture de la connexion à la base de données
    $connexion->close();
    ?>
    <footer>
        <p id="r">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
    </footer>
</body>
</html>