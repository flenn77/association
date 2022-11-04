<form class="form-signin" method="POST">
	<img class="mb-4" src="https://i.pinimg.com/736x/32/6d/d0/326dd0cbb4adf96e7c8e24e4efe9ecb3.jpg" alt="" width="72" height="72" />
	<h1 class="h3 mb-3 font-weight-normal">Inscription :</h1>

    <label for="inputPrenom" class="sr-only">Prénom</label>
	<input type="text" id="inputPrenom" name="prenom" class="form-control" placeholder="Prénom" required />
	
	<label for="inputNom" class="sr-only">Nom</label>
	<input type="text" id="inputNom" name="nom" class="form-control" placeholder="Nom" required />

    <p class="sr-only">Sexe</p>
    <div class="row">
        <div class="col">
            <input type="radio" id="radioM" name="radioSexe" checked />
            <label for="radioM">M</label>
        </div>
        <div class="col">
            <input type="radio" id="radioF" name="radioSexe"/>
            <label for="radioF">F</label>
        </div>
    </div>

	<label for="inputAdresse" class="sr-only">Adresse</label>
	<input type="text" id="inputAdresse" name="adresse" class="form-control" placeholder="Adresse" required />
	
	<label for="inputCodePostal" class="sr-only">Code Postal</label>
	<input type="number" id="inputCodePostal" name="codePostal" class="form-control" placeholder="Code Postal" required />

    <label for="inputVille" class="sr-only">Ville</label>
	<input type="text" id="inputVille" name="ville" class="form-control" placeholder="Ville" required />

    <label for="inputTel" class="sr-only">Numéro de téléphone</label>
	<input type="tel" id="inputTel" name="tel" class="form-control" placeholder="Numéro de téléphone" required />

    <label for="inputEmail" class="sr-only">Adresse mail</label>
	<input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Adresse mail" required autofocus />
	
	<label for="inputPassword" class="sr-only">Mot de passe</label>
	<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required />
	
	<div class="checkbox mb-3">
		<input type="checkbox" value="remember-me" id="checkboxRememberMe"/> 
		<label for="checkboxRememberMe">Remember me</label>
	</div>

	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>