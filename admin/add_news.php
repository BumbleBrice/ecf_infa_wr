	<?php require '../inc/header.php' ?>
	<?php require '../inc/connect.php' ?>
	<?php require '../inc/session.php'; 
	
var_dump($_SESSION);
	$post = [];
	$error = array();
	$showError = false;
	$title = "";
	$content = '';


	if (!empty($_POST) && isset($_POST)) {
		foreach ($_POST as $key => $value) {
			$post[$key] = htmlspecialchars($value);
		}
		if (empty($post['title'])) {
			$error[] = 'Le titre ne peu pas être vide';
		}
		if (empty($post['content'])) {
			$error[] = 'Le contenu ne peu pas être vide';
		}
		if (count($error) > 0 ) {
			$showError = true;
			$title = $post['title'];
			$content = $post['content'];
		} else {
			$requete = $bdd->prepare('INSERT INTO news (title, contenu) VALUES (:titre, :contenu)');
			$requete->bindValue(':titre', $post['title'], PDO::PARAM_STR);
			$requete->bindValue(':contenu', $post['content'], PDO::PARAM_STR);
			if ($requete->execute()) {
				header('Location: news_list.php');
			}
		}

	}
	/*$title = 'Un autre super  titre';
	$content = 'Hop hop je change de mon contenu super hyper mega top';
	$requete = $bdd->prepare('INSERT INTO news(title, contenu) VALUES (:titre, :contenu)');
	$requete->bindValue(':titre', $title, PDO::PARAM_STR);
	$requete->bindValue(':contenu', $content, PDO::PARAM_STR);
	if ($requete->execute()) {
		echo 'Donnée envoyer en base de données !';
	}*/
	?>
		<?php 
		if ($showError == true) {
			echo implode('<br>', $error);
		}
?>
	<form method="POST">
		<h1>Ajouter une news</h1>
		<label for="title">Titre de la news
			<input name="title" id="title" type="text" value="<?=$title ?>">
		</label>
		<label for="content">Contenu de la news
			<input name="content" id="content" type="text" value="<?= $content?>">
		</label>
		<input type="submit" value="Envoyer la news">
	</form>
	<?php require '../inc/footer.php' ?> <!-- affichera autant de fois qu'on appel le fichier -->