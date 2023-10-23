<?php
    require_once('bd/connex.php');
    require_once('classe/CRUD.php');

    /* Affichage des messages. */
    session_start();
    if (isset($_SESSION['message'])) {
        /* addslashes utilisé pour échaper caractères spéciaux*/
        echo "<script>alert('" . addslashes($_SESSION['message']) . "');</script>";
        unset($_SESSION['message']);
    }

    $crud = new CRUD;
    $categorie_data = $crud->select('categories', 'categorie_nom');
    $fournisseur_data = $crud->select('fournisseurs', 'fournisseur_nom');
    $produit_data = $crud->select('produits', 'produit_nom');
    $ville_data = $crud->select('villes', 'ville_nom');

    $numItems1 = count($categorie_data);
    $numItems2 = count($fournisseur_data);
    $numItems3 = count($produit_data);
    $numItems4 = count($ville_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Serge Brodeur e2296529">
    <title>Programmation Web avancée TP1</title>
    
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="conteneur-produit">
        <!-- Fourmulaire ajouter un produit -->    
        <form action="ajouter-produit.php" method="post">
            <h1>Entrer un produit</h1>

            <div class="conteneur-deDiv">
                <div class="div1">
                    <h3>Choisir une catégorie</h3>  
                    <select name="categorie_nom" id="cat">
                        <?php foreach($categorie_data as $row): ?>
                            <option value="<?= $row['categorie_nom']; ?>"><?= $row['categorie_nom']; ?></option>;
                        <?php endforeach; ?>
                    </select>
                    <h3>Choisir une fournisseur</h1>  
                    <select name="fournisseur_nom" id="four">
                        <?php foreach($fournisseur_data as $row): ?>
                            <option value="<?= $row['fournisseur_nom']; ?>"><?= $row['fournisseur_nom']; ?></option>;
                        <?php endforeach; ?>
                    </select> 
                </div>    
                <div class="div2">
                    <label>Nom</label>    
                    <input type="text" name="produit_nom">
                    <label>Description</label>
                    <input type="text" name="produit_description">
                    <label>Prix</label>
                    <input type="text" name="produit_prix">
                    <label>Quantité</label>
                    <input type="text" name="produit_quantite">
                    <input type="submit" value="Ajouter">

                    <div class="conteneur-table">
                        <table class="listbox3">
                            <thead>
                                <tr>
                                    <th>Catégorie nom</th>
                                    <th>Fournisseur nom</th>
                                    <th>Produit nom</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Quantités</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produit_data as $row): ?>
                                    <tr>
                                        <td><?= $row['categorie_nom']; ?></td>
                                        <td><?= $row['fournisseur_nom']; ?></td>
                                        <td><?= $row['produit_nom']; ?></td>
                                        <td><?= $row['produit_description']; ?></td>
                                        <td><?= $row['produit_prix']; ?></td>
                                        <td><?= $row['produit_quantite']; ?></td>
                                        <td class = "edit-delete">
                                            <a href="edit-produit.php?id=<?= $row['id']; ?>">Éditer</a> | 
                                            <a href="delete-produit.php?id=<?= $row['id']; ?>">Suprimer</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Nombre d'items: <?= $numItems3 ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                </div> 
            </div>       
        </form>
    </div>

    <div class="conteneur-catFour">
        <!-- Fourmulaire ajouter une catégorie -->
        <form action="ajouter-categorie.php" method="post">
            <h1>Ajouter une catégorie</h1>    
            <label>Nom
                <input type="text" name="categorie_nom">
            </label>
            <input type="submit" value="Ajouter">
            <div class="conteneur-table">
                <table class="listbox1">
                    <thead>
                        <tr>
                            <th>Catégorie nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categorie_data as $row): ?>
                            <tr>
                                <td><?= $row['categorie_nom']; ?></td>
                                <td class = "edit-delete">
                                    <a href="edit-categorie.php?id=<?= $row['id']; ?>">Éditer</a> | 
                                    <a href="delete-categorie.php?id=<?= $row['id']; ?>">Suprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Nombre d'items: <?= $numItems1 ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>

        <!-- Fourmulaire ajouter un fournisseur -->
        <form action="ajouter-fournisseur.php" method="post">
            <h1>Ajouter un fournisseur</h1>    
            <label>Nom</label>
            <input type="text" name="fournisseur_nom">
            <label>Téléphone</label>
            <input type="text" name="fournisseur_telephone">
            <label>Courriel</label>
            <input type="text" name="fournisseur_courriel">
            <select name="fournisseur_ville" id="ville">
                <?php foreach($ville_data as $row): ?>
                    <option value="<?= $row['ville_nom']; ?>"><?= $row['ville_nom']; ?></option>;
                <?php endforeach; ?>
            </select> 
            <input type="submit" value="Ajouter">

            <div class="conteneur-table">
                <table class="listbox2">
                    <thead>
                        <tr>
                            <th>Fournisseur nom</th>
                            <th>Téléphone</th>
                            <th>Courriel</th>
                            <th>Ville</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($fournisseur_data as $row): ?>
                            <tr>
                                <td><?= $row['fournisseur_nom']; ?></td>
                                <td><?= $row['fournisseur_telephone']; ?></td>
                                <td><?= $row['fournisseur_courriel']; ?></td>
                                <td><?= $row['fournisseur_ville']; ?></td>
                                
                                <td class = "edit-delete">
                                    <a href="edit-fournisseur.php?id=<?= $row['id']; ?>">Éditer</a> | 
                                    <a href="delete-fournisseur.php?id=<?= $row['id']; ?>">Suprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Nombre d'items: <?= $numItems2 ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </div>

    <!-- Fourmulaire ajouter une ville -->
    <form action="ajouter-ville.php" method="post">
            <h1>Ajouter une ville</h1>    
            <label>Nom
                <input type="text" name="ville_nom">
            </label>
            <input type="submit" value="Ajouter">
            <div class="conteneur-table">
                <table class="listbox1">
                    <thead>
                        <tr>
                            <th>Ville</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ville_data as $row): ?>
                            <tr>
                                <td><?= $row['ville_nom']; ?></td>
                                <td class = "edit-delete">
                                    <a href="edit-ville.php?id=<?= $row['id']; ?>">Éditer</a> | 
                                    <a href="delete-ville.php?id=<?= $row['id']; ?>">Suprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Nombre d'items: <?= $numItems4 ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
</body>
</html>

  