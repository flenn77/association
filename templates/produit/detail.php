<main role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <p class="card-text "><?= '<img src="data:image;base64,' . base64_encode($produits->getImageProduit()) . '" style="width:200px;" height="200px" >'; ?>
                        <p class="card-text"><label>Nom de l'animal  ----->  </label><?=$produits->getLibelleProduit() ?></p>
                        <p class="card-text"><label>Type animal      ----->  </label><?= $produits->getMarqueProduit() ?></p>
                        <p class="card-text"><label>La race          ----->  </label><?= $produits->getDescriptionProduit() ?></p>
                        <p class="card-text"><label>L'age d'animal   ----->  </label><?= $produits->getQuantiteProduit() ?></p>
                        <p class="card-text"><label>Couleur d'animal ----->  </label><?= $produits->getPrixProduit() ?> €</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>