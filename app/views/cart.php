<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" href="../../ecommerce/public/css/style_produits.css">      
</head>
<body>
<header>
    <h1>Votre panier</h1>
    <a href="index.php?action=products" class="products-link">← Retour aux produits</a>
</header>
 
<div>     
    <table border="1" class="table_tableau">
         <thead class="table_entete">
            <tr>
                <th>ID du produit</th>
                <th>Nom du produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
                <th>Modifier la quantité</th>
                <th>
                    <!-- Bouton pour vider le panier -->
                    <form action="index.php?action=clear_cart" method="post">
                        <button type="submit" class="button">Vider le panier</button>
                     </form>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($cartItems)): ?>
                <tr>
                    <td colspan="6">Votre panier est vide.</td>
                </tr>
            <?php else: ?>
                <?php 
                $totalPrice = 0; // Variable pour calculer le prix total
                foreach ($cartItems as $item):
                    $itemTotal = $item['price'] * $item['quantity']; // Calcul du total pour chaque produit
                    $totalPrice += $itemTotal; // Ajouter au prix total
                ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo number_format($item['price'], 2, ',', ' ') . " €"; ?></td>
                        <td><?php echo number_format($itemTotal, 2, ',', ' ') . " €"; ?></td>
                        <td>
                            <!-- Formulaire pour modifier la quantité -->
                            <form action="index.php?action=update_cart" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="0" required>
                                <button type="submit" class="button_maj">Mettre à jour</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <?php if (!empty($cartItems)): ?>
        <h3 class="table_tableau">Prix total : <?php echo number_format($totalPrice, 2, ',', ' ') . " €"; ?>
            <form action="index.php" method="post">
                <button type="submit" class="button">Payer</button>
            </form>
        </h3>
    <?php endif; ?>     
    
   </div>
</body>
</html>
