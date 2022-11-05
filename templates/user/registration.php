<form class="form-signin" action="?page=connexion" method="POST">
	<img class="mb-4" src="https://i.pinimg.com/736x/32/6d/d0/326dd0cbb4adf96e7c8e24e4efe9ecb3.jpg" alt="" width="72" height="72" />
	<h1 class="h3 mb-3 font-weight-normal">Inscription :</h1>

    <label for="inputPrenom" class="visually-hidden">Prénom</label>
	<input type="text" id="inputPrenom" name="prenom" class="form-control" placeholder="Prénom" required />
	
	<label for="inputNom" class="visually-hidden">Nom</label>
	<input type="text" id="inputNom" name="nom" class="form-control" placeholder="Nom" required />

    <p>Sexe</p>
    <div class="row">
        <div class="col">
            <input type="radio" id="radioM" name="radioSexe" value="M" checked />
            <label for="radioM">M</label>
        </div>
        <div class="col">
            <input type="radio" id="radioF" name="radioSexe" value="F"/>
            <label for="radioF">F</label>
        </div>
    </div>

	<label for="inputAdresse" class="visually-hidden">Adresse</label>
	<input type="text" id="inputAdresse" name="adresse" class="form-control" placeholder="Adresse" required />
	
	<label for="inputCodePostal" class="visually-hidden">Code Postal</label>
	<input type="number" id="inputCodePostal" name="codePostal" class="form-control" placeholder="Code Postal" min="0" required />

    <label for="inputVille" class="visually-hidden">Ville</label>
	<input type="text" id="inputVille" name="ville" class="form-control" placeholder="Ville" required />

    <label for="inputTel" class="visually-hidden">Numéro de téléphone</label>
	<input type="tel" id="inputTel" name="tel" class="form-control" placeholder="Numéro de téléphone" pattern="[0-9]{10}" required />

    <label for="inputEmail" class="visually-hidden">Adresse mail</label>
	<input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Adresse mail" required autofocus />
	
	<label for="inputPassword" class="visually-hidden">Mot de passe</label>
	<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required />

    <label for="inputPasswordRpt" class="visually-hidden">Confirmer mot de passe</label>
	<input type="password" id="inputPasswordRpt" name="passwordRpt" class="form-control" placeholder="Confirmer mot de passe" required />

    <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>

</form>