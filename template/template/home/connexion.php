<?php
session_start();

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "template";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Recherche de l'utilisateur dans la base de données
    $select_query = "SELECT id, nom, prenoms, password FROM utilisateurs WHERE email = ?";
    $stmt = $connexion->prepare($select_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $user_nom = $row["nom"];
        $user_prenoms = $row["prenoms"];
        $hashed_password = $row["password"];

        // Vérification du mot de passe
        if (password_verify($password, $hashed_password)) {
            // Authentification réussie
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_nom"] = $user_nom;
            $_SESSION["user_prenoms"] = $user_prenoms;

            // Rediriger vers la page d'accueil après la connexion
            header("Location: ../home/home.php");
            exit;
        } else {
            $message_erreur = "Échec de la connexion. Vérifiez vos informations d'identification.";
        }
    } else {
        $message_erreur = "Échec de la connexion. Vérifiez vos informations d'identification.";
    }

    $stmt->close();
}

// Fermeture de la connexion
$connexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion_Haussmann</title>
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>
<header>
        <div class="container">
            <div class="logo">
                <a href="connexion.php"><img src="../assets/Outlook-signature_.png" alt="Haussmann"></a>
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
                <a href="inscription.php"><button id="conn">Inscription</button></a>
            </div>
        </div>
    </header>     
    <p id="description">Ravi de vous revoir sur la plateforme dédiée au reporting</p>
    <div class="container2">
        <div class="form-container sign-in-container">
            <form action="connexion.php" method="post">
                <p id="titre">Connectez-vous</p>
                <input type="text" placeholder="Email" name="email" id="input" required>
                <input type="password" placeholder="Mot de passe" name="password" id="input" required>
                <input type="submit" value="Se connecter" id="env">
            </form>
            <?php
                if (isset($message_erreur)) {
                    echo '<p id="erreur">' . $message_erreur . '</p>';
                }
            ?>
        </div>
    </div>
    <footer>
        <p id="r">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
        <p id="r4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui vero quia, nihil officia dolorem odit, minima est eum fuga rem commodi nisi ex unde, maxime laborum recusandae magnam praesentium!</p>
    </footer>
</body>
</html>
