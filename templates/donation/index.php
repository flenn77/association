<form class="form-signin" method="POST">
	<h1 class="h3 mb-3 font-weight-normal">donation :</h1>

	<label for="inputPrenom" class="visually-hidden">Prénom</label>
	<input type="text" id="inputPrenom" name="prenom" class="form-control" placeholder="Prénom" required />
	<bR>
	<label for="inputNom" class="visually-hidden">Nom</label>
	<input type="text" id="inputNom" name="nom" class="form-control" placeholder="Nom" required />
	<bR>
	<label for="inputAdresse" class="visually-hidden">Adresse</label>
	<input type="text" id="inputAdresse" name="adresse" class="form-control" placeholder="Adresse" required />
	<bR>
	<label for="inputCodePostal" class="visually-hidden">Code Postal</label>
	<input type="number" id="inputCodePostal" name="codePostal" class="form-control" placeholder="Code Postal" min="0" required />
	<bR>
	<label for="inputVille" class="visually-hidden">Ville</label>
	<input type="text" id="inputVille" name="ville" class="form-control" placeholder="Ville" required />
	<bR>
	<label for="inputEmail" class="visually-hidden">Adresse mail</label>
	<input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Adresse mail" required autofocus />
	<bR>
	<label for="inputTel" class="visually-hidden">Numéro de Votre carte bancaire</label>
	<input type="tel" id="inputTel" name="tel" class="form-control" placeholder="Numéro de Votre carte bancaire" pattern="[0-9]{16}" required />
	<bR>
	<label for="inputMontant" class="visually-hidden">Montant</label>
	<input type="number" id="inputMontant" name="montant" class="form-control" placeholder="montant" min="0" required />
	<bR>
	
	<button class="btn btn-lg btn-primary btn-block" type="submit">Réaliser un DON </button>

</form>