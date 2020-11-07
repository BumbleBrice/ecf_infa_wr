<?php   include '../inc/header.php';
		include '../inc/connect.php';

		$post = [];
		$errors = array();

		if (!empty($_POST) ) {
			$post = array_map('htmlspecialchars', $_POST);
			if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
	
				$errors[] = '@le couple identifiant et mot de passe ne correspond pas';
			}
			if (empty($post['password'])) {
				$errors[] = 'le couple identifiant et mot de passe ne correspond pas';
			}
			if(count($errors) == 0 ) {
				$reqEmail = $bdd->prepare('SELECT * from users WHERE email = :checkemail');
				$reqEmail->bindValue(':checkemail', $post['email']);
				if ($reqEmail->execute()) {
					$user = $reqEmail->fetch(PDO::FETCH_ASSOC);
					if (!empty($user)) {
						if (password_verify($post['password'], $user['password'])) {
							echo 'ça fonctionne !';
							session_start();
							$_SESSION['user'] = [
								'firstName' => $user['firstName'],
								'lastName'  => $user['lastName'],
								'city' 		=> $user['city'],
								'role' 		=> $user['role'],

							];
						} else {
							$errors[] = 'mot de passe different';
						}
					} else {
						$errors[] = 'Utilisateur introuvale';
					}
				} else {
					$errors[] = 'fail execute';
				}
			}
		}
		if (count($errors) != 0) {
			foreach ($errors as $key => $value) {
				echo $value . '<br>';
			}
		}


 ?>

<form method="POST">
	<label for=""> Votre email
		<input type="text" name="email">
	</label><br>
	<label for=""> Votre mot de passe ultra top secret
		<input type="password" name="password">
	</label><br>
	<input type="submit" value="Me connecter">
</form>