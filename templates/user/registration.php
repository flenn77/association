<form class="form-signin" method="POST">
	<img class="mb-4" src="https://i.pinimg.com/736x/32/6d/d0/326dd0cbb4adf96e7c8e24e4efe9ecb3.jpg" alt="" width="72" height="72" />
	<h1 class="h3 mb-3 font-weight-normal">Connectez-vous :</h1>

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