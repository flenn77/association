<?php

use App\Controller\UserController;

?>



<form class="form-signin" method="POST">
	<img class="mb-4" src="https://i.pinimg.com/736x/32/6d/d0/326dd0cbb4adf96e7c8e24e4efe9ecb3.jpg" alt="" width="72" height="72" />
	<h1 class="h3 mb-3 font-weight-normal">Inscription :</h1>

    <label for="inputPrenom" class="visually-hidden">Prénom</label>
	<input type="text" id="inputPrenom" name="prenom" class="form-control <?php echo (!empty($prenom_err)) ? 'is-invalid' : ''; ?>" placeholder="Prénom" />
    <span class="invalid-feedback"><?php echo $prenom_err; ?></span>
	
	<label for="inputNom" class="visually-hidden">Nom</label>
	<input type="text" id="inputNom" name="nom" class="form-control <?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>" placeholder="Nom" />
    <span class="invalid-feedback"><?php echo $nom_err; ?></span>

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
	<input type="text" id="inputAdresse" name="adresse" class="form-control <?php echo (!empty($adresse_err)) ? 'is-invalid' : ''; ?>" placeholder="Adresse" />
    <span class="invalid-feedback"><?php echo $adresse_err; ?></span>
	
	<label for="inputCodePostal" class="visually-hidden">Code Postal</label>
	<input type="number" id="inputCodePostal" name="codePostal" class="form-control <?php echo (!empty($codePostal_err)) ? 'is-invalid' : ''; ?>" placeholder="Code Postal" />
    <span class="invalid-feedback"><?php echo $codePostal_err; ?></span>

    <label for="inputVille" class="visually-hidden">Ville</label>
	<input type="text" id="inputVille" name="ville" class="form-control <?php echo (!empty($ville_err)) ? 'is-invalid' : ''; ?>" placeholder="Ville" />
    <span class="invalid-feedback"><?php echo $ville_err; ?></span>

    <label for="inputTel" class="visually-hidden">Numéro de téléphone</label>
	<input type="tel" id="inputTel" name="tel" class="form-control <?php echo (!empty($tel_err)) ? 'is-invalid' : ''; ?>" placeholder="Numéro de téléphone" />
    <span class="invalid-feedback"><?php echo $tel_err; ?></span>

    <label for="inputEmail" class="visually-hidden">Adresse mail</label>
	<input type="email" id="inputEmail" name="mail" class="form-control <?php echo (!empty($mail_err)) ? 'is-invalid' : ''; ?>" placeholder="Adresse mail" />
	<span class="invalid-feedback"><?php echo $mail_err; ?></span>

	<label for="inputPassword" class="visually-hidden">Mot de passe</label>
	<input type="password" id="inputPassword" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Mot de passe" />
    <span class="invalid-feedback"><?php echo $password_err; ?></span>

    <label for="inputPasswordRpt" class="visually-hidden">Confirmer mot de passe</label>
	<input type="password" id="inputPasswordRpt" name="passwordRpt" class="form-control <?php echo (!empty($passordRpt_err)) ? 'is-invalid' : ''; ?>" placeholder="Confirmer mot de passe" />
    <span class="invalid-feedback"><?php echo $passwordRpt_err; ?></span>

    <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>

</form>