<?php  include '../inc/header.php';
	   include '../inc/connect.php';
	// on instancie les variables pour leur donnée une valeur de base
	$post = [];
	$errors = [];

	$showError = false;

	$firstName = '';
	$lastName = '';
	$email = '';
	$phone = '';
	$adress = '';
	$city = '';
	$cityZip = '';

	if (!empty($_POST) && isset($_POST)) {
		foreach ($_POST as $key => $value) {
			$post[$key] = htmlspecialchars($value);
		}
		if (strlen($post['firstName']) <2 || strlen($post['firstName']) > 50) {
			$errors[] = 'Le nom doit faire entre 2 et 50 caractères';
		}
		if (strlen($post['lastName']) <2 || strlen($post['lastName']) > 50) {
			$errors[] = 'Le prénom doit faire entre 2 et 50 caractères';
		}
		if (strlen($post['phone']) != 10) {
			$errors[] = 'Le numéro de téléphone n\'est pas correcte';
		}
		if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[] = 'L\'email doit faire entre 2 et 50 caractères';
		}
		if (strlen($post['adress']) <2 || strlen($post['adress']) > 50) {
			$errors[] = 'L\'addresse doit faire entre 2 et 50 caractères';
		}
		if (strlen($post['cityZip']) != 5) {
			$errors[] = 'Le code postal n\'est pas correcte';
		}
		if (strlen($post['city']) <2 || strlen($post['city']) > 50) {
			$errors[] = 'La ville doit faire entre 2 et 50 caractères';
		} 
		if ($post['password'] != $post['checkPassword']) {
			$errors[] = 'Les mots de passe ne sont pas les mêmes';
		} 
		if (count($errors) > 0 ) {
				$showError = true;

				$firstName  = $post['firstName'];
				$lastName 	= $post['lastName'];
				$email 		= $post['email'];
				$phone 		= $post['phone'];
				$adress 	= $post['adress'];
				$city 		= $post['city'];
				$cityZip 	= $post['cityZip'];
				
		} else {
			$pass_hashed = password_hash($post['password'], PASSWORD_DEFAULT);

			$requete = $bdd->prepare('INSERT INTO users 
						(firstName, lastName, email, phone, adress, city, cityZip, password) 
				VALUES 	(:firstName, :lastName, :email, :phone, :adress, :city, :cityZip, :password)');
			$requete->bindValue(':firstName', 	$post['firstName'], PDO::PARAM_STR);
			$requete->bindValue(':lastName', 	$post['lastName'], 	PDO::PARAM_STR);
			$requete->bindValue(':email', 		$post['email'], 	PDO::PARAM_STR);
			$requete->bindValue(':phone', 		$post['phone'], 	PDO::PARAM_STR);
			$requete->bindValue(':adress', 		$post['adress'], 	PDO::PARAM_STR);
			$requete->bindValue(':city', 		$post['city'], 		PDO::PARAM_STR);
			$requete->bindValue(':cityZip', 	$post['cityZip'], 	PDO::PARAM_STR);
			$requete->bindValue(':password', 	$pass_hashed, 		PDO::PARAM_STR);
			if ($requete->execute()) {
				header('Location: index.php');
			}
		} // fin du else
	} // fin vérification $_POST


 ?>

 <form method="POST">
 	<?php if ($showError) : ?>
 	<ul>
 		<?php foreach ($errors as $e) : ?>
 			<li><?= $e ?></li>
 		<?php endforeach; ?>
 	</ul>
 	<?php endif; ?>
 	<label for=""> Nom
	 	<input type="text" name="firstName" value="<?=$firstName ?>">	
 	</label><br>
 	<label for=""> Prénom
	 	<input type="text" name="lastName" value="<?= $lastName ?>">
 	</label><br>
 	<label for=""> email
	 	<input type="text" name="email" value="<?= $email ?>">	
 	</label><br>
 	<label for=""> Téléphone
	 	<input type="text" name="phone" value="<?= $phone ?>">
 	</label><br>
 	<label for=""> Adresse
	 	<input type="text" name="adress" value="<?= $adress ?>">
 	</label><br>
 	<label for=""> Code postal
	 	<input type="text" name="cityZip" value="<?= $cityZip ?>">
 	</label><br>
 	<label for=""> Ville
 		<input type="text" name="city" value="<?= $city ?>">
 	</label><br>
 	<label for=""> Mot de passe
 		<input type="text" name="password">
 	</label><br>
 	<label for=""> verifier le mot de passe
 		<input type="text" name="checkPassword">
 	</label><br>
 	<input type="submit" class="btn btn-success" value="Inscription">
 </form>