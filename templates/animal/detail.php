<main role="main">
    <div class="container">
        <div class="row">
            <?php foreach ($animals as $animal) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text"><label>Nom de l'animal  ----->  </label><?=$animal->getSurnomAnimal() ?></p>
                            <p class="card-text"><label>Type animal      ----->  </label><?= $animal->getEspeceAnimal() ?></p>
                            <p class="card-text"><label>La race          ----->  </label><?= $animal->getRaceAnimal() ?></p>
                            <p class="card-text"><label>L'age d'animal   ----->  </label><?= $animal->getAgeAnimal() ?></p>
                            <p class="card-text"><label>Couleur d'animal ----->  </label><?= $animal->getCouleurAnimal() ?></p>
                            


                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>