<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">association</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Voir les details</a>
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
                   
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="?page=detail" class="btn btn-primary my-2">Voir les details</a></button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <nav aria-label="navigation">
    <ul class="pagination mt-50 mb-70">
        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
        <?php
        $cnt = 0;
        for ($i = 1; $i <= $nbr; $i++) { ?>
        <!-- karamzo parametre fa link ? --> 
            <li class="page-item"><a class="page-link" href="shop.php?page=<?php echo $i;
                                                                 ?>"><?php echo $i;
                                                                $cnt++ ?></a></li>
            <?php if ($cnt == 3 && $nbr > $i) { ?>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#"><?php echo $nbr; ?></a></li>
            <?php break;
            } ?>
        <?php } ?>
        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
    </ul>
</nav>
          </div>
        </div>
</main>



