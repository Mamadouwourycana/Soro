<?php
session_start();
if (!isset($_SESSION["produits"])) {
    $_SESSION["produits"] = [
        ["nom" => "Clavier Logitech", "prix" => 4500, "categorie" => "Informatique"],
        ["nom" => "Souris Logitech", "prix" => 3000, "categorie" => "Informatique"],
        ["nom" => "Écran Samsung", "prix" => 75000, "categorie" => "Informatique"]
    ];
}

// c'est la partie qui nous permet d'ajoute des trucs
if (isset($_POST["ajouter"])) {

    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $categorie = $_POST["categorie"];

    if (!empty($nom) && !empty($prix) && !empty($categorie)) {

        $_SESSION["produits"][] = [
            "nom" => $nom,
            "prix" => $prix,
            "categorie" => $categorie
        ];
    }
}

$produits = $_SESSION["produits"];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestion des produits</title>

</head>

<body>

    <div class="container">
        <div class="nene">
            <div>
                <h2>Gest-Boutique</h2>
                <p>Gestion des produits</p>
            </div>

            <strong>TechE21</strong>

        </div>
        <!-- c'est la partie formulaire -->
        <div class="form-container">

            <h2>Ajouter un produit</h2>

            <form action="" method="POST" class="form">

                <div class="champ">
                    <label for="nom">Nom du produit</label>
                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        placeholder="Ex : Clavier Logitech" required>

                </div>
                <div class="champ">

                    <label for="prix">Prix</label>
                    <input
                        type="number"
                        id="prix"
                        name="prix"
                        placeholder=" Ex : 10.000 FcFA"
                        required>

                </div>
                <div class="champ">

                    <label for="categorie">Catégorie</label>

                    <select id="categorie" name="categorie" required>

                    <option value="">Vuiellez entre votre choix</option>

                    <option value="Informatique">
                        Informatique
                    </option>

                    <option value="Téléphone">
                        Téléphone
                    </option>

                    <option value="Accessoires">
                        Accessoires
                    </option>

                    <option value="Bureautique">
                        Bureautique
                    </option>

                </select>

                </div>
                <a href="Ajouter" class="btn">+ Ajouter le produit</a>
            </form>

        </div>


        <!-- Ici c'est la partie Tableau -->
        <div class="table-container">

            <h2>Liste des produits</h2>

            <table>

                <thead>

                    <tr>
                        <th>Nom du produit</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                    </tr>

                </thead>
                <tbody>

                    <?php foreach ($produits as $index => $produit) { ?>

                        <tr>
                            <td>
                                <?php echo $produit["nom"]; ?>
                            </td>

                            <td class="prix">
                                <?php echo $produit["prix"]; ?> FCFA
                            </td>

                            <td>
                                <?php echo $produit["categorie"]; ?>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>