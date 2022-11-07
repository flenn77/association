<br><br><br><br>
<div class="card text-center">
    <div class="card-header">
        <h3>
            <div class="card-title"><label>Nom de l'animal -----> </label><?= $animals->getSurnomAnimal() ?></div>
        </h3>
    </div>
    <div class="card-body">
        <h5>
            <div class="card-text"><label>Espece animal -----> </label><?= $animals->getEspeceAnimal() ?></div>
        </h5>
        <h5>
            <div class="card-text"><label>La race -----> </label><?= $animals->getRaceAnimal() ?></div>
        </h5>
        <h5>
            <div class="card-text"><label>L'age d'animal -----> </label><?= $animals->getAgeAnimal() ?></div>
        </h5>
        <h5>
            <div class="card-text"><label>Couleur d'animal -----> </label><?= $animals->getCouleurAnimal() ?></div>
        </h5>
        <h5>
            <div class="card-text"><label>Description -----> </label><?= $animals->getDescriptionAnimal() ?></div>
        </h5>
    </div>
</div>