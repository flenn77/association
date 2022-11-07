<?php
	if(!isset($_SESSION)) {
		session_start();
	}
?>

<?php 
	if(!empty($login_err)){
		echo '<div class="alert alert-danger">' . $login_err . '</div>';
	}        
?>

<form class="form-signin" method="POST">
	<img class="mb-4" src="https://i.pinimg.com/736x/32/6d/d0/326dd0cbb4adf96e7c8e24e4efe9ecb3.jpg" alt="" width="72" height="72" />
	<h1 class="h3 mb-3 font-weight-normal">Connexion :</h1>

	<label for="inputEmail" class="visually-hidden">Adresse mail</label>
	<input type="email" id="inputEmail" name="mail" class="form-control <?php echo (!empty($mail_err)) ? 'is-invalid' : ''; ?>" placeholder="Adresse mail" autofocus />
	<span class="invalid-feedback"><?php echo $mail_err; ?></span>
	
	<label for="inputPassword" class="visually-hidden">Mot de passe</label>
	<input type="password" id="inputPassword" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Mot de passe" />
	<span class="invalid-feedback"><?php echo $password_err; ?></span>
<!-- 	
	<div class="checkbox mb-3">
		<input type="checkbox" value="remember-me" id="checkboxRememberMe"/> 
		<label for="checkboxRememberMe">Se souvenir</label>
	</div>
 -->
	<button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>

    <a href="">S'inscrire</a>
</form>