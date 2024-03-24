<?php
// Informations de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "127_0_0_1";

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);
    // Définir le mode d'erreur PDO à exception pour les erreurs de connexion
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, affichez un message d'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}

// La suite de votre code PHP va maintenant fonctionner correctement avec PDO
$client = true;
include_once("header.php");
include_once("main.php");
$count = 0;

// Requête SQL pour récupérer les données des utilisateurs
$query = "SELECT * FROM `utilisateur`";
$pdostmt = $pdo->prepare($query);
$pdostmt->execute();

// Affichage des résultats dans un tableau HTML
?>
<h1 class="mt-5" style="font-family: Georgia, serif">Clients</h1>
<a href="addUser.php" class="btn btn-success" style="float: right; margin-bottom: 10px">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
    </svg>
</a>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>MDP</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!--boucle while pour recupérer toute les lignes de la table-->
        <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)) :
            $count++;
        ?>
            <tr>
                <td><?php echo $ligne['idUser'] ?></td>
                <td><?php echo $ligne['Nom'] ?></td>
                <td><?php echo $ligne['Adresse'] ?></td>
                <td><?php echo $ligne['pseudo'] ?></td>
                <td><?php echo $ligne['email'] ?></td>
                <td><?php echo $ligne['mdp'] ?></td>
                <td>
                    <a href="editUser.php?id=<?php echo $ligne['idUser'] ?>" class="btn btn-primary">
                        Modifier
                    </a>
                    <a href="delete.php?id=<?php echo $id ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
include_once("footer.php");
?>
