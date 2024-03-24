<?php
$article = true;
include_once("main.php");

// Vérifie si l'identifiant de l'article à supprimer est passé via la méthode GET
if (!empty($_GET["id"])) {
    $id = (int)$_GET["id"]; // Transformation de l'id en int pour faire la suppression 

    // Commande de suppression de l'article
    $query = "DELETE FROM article WHERE idArticle = :id";
    $objstmt = $pdo->prepare($query);
    $objstmt->execute(['id' => $id]);

    // Rediriger vers la page article après la suppression
    header("Location: article.php");
    exit; // Assurez-vous de terminer le script après la redirection
}
?>
