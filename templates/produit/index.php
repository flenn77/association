<h1 class="text-center">Produit Dans la Base de donnée</h1>
<table class="table table-striped table-hover">
    <thead><br>
        <tr>
            <th>Nom du produit </th>
            <th>Marque</th>
            <th>Description</th>
            <th>Quantité</th>
            <th>Prix (en €) </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produits as $produit) : ?>
            <tr>
                <td><?= $produit->getLibelleProduit() ?></td>
                <td><?= $produit->getMarqueProduit() ?></td>
                <td><?= $produit->getQuantiteProduit() ?></td>
                <td><?= $produit->getQuantiteProduit() ?></td>
                <td><?= $produit->getPrixProduit() ?> €</td>
                <td><a href="?page=infoproduit&id=<?= $produit->getId() ?>"><button class="btn btn-info">Voir plus</button></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</section>
<br><br><br><br><br><br>