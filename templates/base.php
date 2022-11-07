<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- <link href="<?= CSS . "login.css"?>" rel="stylesheet" /> -->
    <!-- <link href="<?= CSS . "navbar-top-fixed.css"?>" rel="stylesheet" />         -->
    <link rel="stylesheet" href="<?= CSS .'style.css'?>" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Roboto&display=swap"
      rel="stylesheet"
    />
    <title>De A à Zèbre</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="?page= ">Accueil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=animal">Animals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=user">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=produit">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=donation">Donations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=connexion">Connexion</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        <!-- Ajouter contenu de main -->
        <?= $content ?>
    </main>

    <footer></footer>
</body>

</html>