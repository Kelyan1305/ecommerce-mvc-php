<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link rel="stylesheet" href="../../ecommerce/public/css/style_produits.css"> 
</head>
<body>

<header class="header-entete">    
    <a href="/ecommerce/public/" class="products-link">← Retour à l'accueil</a><br>
    <h1>
        Nos Produits
   </h1>
   <h2>
    <a class="img-article" href="index.php?action=cart">
            <img width="10%" src="./images/panier.png" alt="panier"> Mon panier
    </a> </h2>

    <form action="index.php" method="get">
        <input type="hidden" name="action" value="search">
        <input type="text" name="query" placeholder="Recherchez un produit...">
        <button type="submit" class="button_maj">Rechercher</button>
    </form>

</header>

<div class="products"> 
    <?php if (isset($products) && is_array($products) && count($products) > 0): ?>
        <?php foreach ($products as $product): ?>
            <div class="product">   
                <h2 class="h2-produits"><?php echo $product['name']; ?></h2>
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="width:100px;">
                <p><?php echo $product['description']; ?></p>
                <p>Prix : <?php echo $product['price']; ?> €</p>
                <a href="index.php?action=add_to_cart&id=<?php echo $product['id']; ?>&quantity=1&<?php echo $product['name']; ?>">Ajouter au panier</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun produit n'est disponible pour le moment.</p>
    <?php endif; ?>
</div>
</body>
</html>


