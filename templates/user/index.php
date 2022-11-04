
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
              <?php foreach ($users as $user) : ?>
                <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                    <div class="card-body">
                      <p class="card-text"><?= $user->getId() ?></p>
                      <p class="card-text"><?= $user->getNom() ?></p>                
                      <p class="card-text"><?= $user->getPrenom() ?></p>
                      <p class="card-text"><?= $user->getAdresse() ?></p>
                      <p class="card-text"><?= $user->getCodePostal() ?></p>

                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

  </main>



  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
  </footer>
