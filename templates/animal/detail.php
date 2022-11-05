<main role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <p class="card-text "><?= '<img src="data:image;base64,' . base64_encode($animals->getImageAnimal()) . '" style="width:200px;" height="200px" >'; ?>
                        <p class="card-text"><label>Nom de l'animal  ----->  </label><?=$animals->getSurnomAnimal() ?></p>
                        <p class="card-text"><label>Type animal      ----->  </label><?= $animals->getEspeceAnimal() ?></p>
                        <p class="card-text"><label>La race          ----->  </label><?= $animals->getRaceAnimal() ?></p>
                        <p class="card-text"><label>L'age d'animal   ----->  </label><?= $animals->getAgeAnimal() ?></p>
                        <p class="card-text"><label>Couleur d'animal ----->  </label><?= $animals->getCouleurAnimal() ?></p>
                    </div>
                    <div class="card-footer">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="?page=reservation&id=<?=$animals->getId()?>" class="btn btn-primary my-2">Adopter</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>