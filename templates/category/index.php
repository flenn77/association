<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
  <title>Album example for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>
    <header></header>
 

          <div class="container">
            <div class="row">
              <?php foreach ($categorie as $category) : ?>
                <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                    <p class="card-text "><?= '<img src="data:image;base64,' . base64_encode($category->imageAnimal) . '" style="width:200px;" height="200px" >'; ?>
                    <div class="card-body">
                      <p class="card-text"><?= $category->surnomAnimal ?></p>
                      <p class="card-text"><?= $category->especeAnimal ?></p>
                      <p class="card-text"><?= $category->raceAnimal ?></p>
                      <p class="card-text"><?= $category->ageAnimal ?></p>

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


    <footer></footer>
</body>

</html>