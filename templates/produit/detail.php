<br><br><br><br>




<div class="card text-center">
    <div class="card-header">
        <h3>
            <div class="card-title"><label>Nom du produit -----> </label><?= $produits->getLibelleProduit() ?></div>
        </h3>
    </div>
    <div class="card-body">
        <h5>
            <div class="card-text"><label>Marque -----> </label><?= $produits->getMarqueProduit() ?></div>
        </h5>
        <h5>
            <div class="card-text"><label>Prix -----> </label> <?= $produits->getPrixProduit() ?> €</div>
        </h5>
        <h5>
            <div class="card-text"><label>Quantite -----> </label><?= $produits->getQuantiteProduit() ?></div>
        </h5>
        <h5>
            <div class="card-text"><label>Description -----> </label><?= $produits->getDescriptionProduit()  ?></div>
        </h5>

    </div>

</div>