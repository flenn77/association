<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">association</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">


        <div class="container">
          <div class="row">
            <?php foreach ($animals as $animal) : ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <div class="card-body">
                    <p class="card-text"><?= $animal->getSurnomAnimal() ?></p>
                    <p class="card-text"><?= $animal->getEspeceAnimal() ?></p>
                    <p class="card-text"><?= $animal->getRaceAnimal() ?></p>
                    <p class="card-text"><?= $animal->getAgeAnimal() ?></p>
                    <p class="card-text"><?= $animal->getCouleurAnimal() ?></p>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="?page=detail" class="btn btn-primary my-2">Main call to action</a></button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
</main>



