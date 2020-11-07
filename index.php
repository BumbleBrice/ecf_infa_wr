	<?php require 'inc/header.php' ?> <!-- On requière le fichier header.php qui se trouve dans le dossier inc -->
	<?php require 'inc/connect.php' ?> <!-- idéme ligne du dessus -->
	<header>
		<h1>Mon super mini site !</h1>
		<?php include 'inc/nav.php' ?> <!-- On inclue le fichier nav.php -->
		<!-- Différence entre require et include? 
		Dans les deux cas, j'appel un fichier, le require ne fera pas fonctionner la suite du code alors que l'include n'a pas d'obligation de trouver le fichier -->
	</header>
	<p>Nous allons créer un super site sympas de news !</p>
	<?php 
		// je crée une variable, qui va stocker une requete query
		// la requete selectionne tout (*) les champs de la table news pour les classer par ordre ascendant avec une limite de 2 
		$response = $bdd->query('SELECT * FROM news');
		// On execute la requete
		$response->execute();
		// fetch retourne un tableau qui contient les données
		$news = $response->fetchAll(PDO::FETCH_ASSOC);
		// l'opérateur de portée :: se nomme PAAMAYIM NEKUDOTAYIM

	 ?>
	 <h4>Les dernières news</h4>
	 <?php 
	 	foreach ($news as $n) {  // On crer une boucle et on crée un alis $n de $news
	 		setlocale(LC_TIME, "fr_FR", "French"); // Permet de modifié les infos de localisation et de les traduires en français
				?>
	 		<br><?= $n['title']?> <!-- récupère le champs title de la news -->
	 		<br>Ajouter le : <?= strftime("%A %d %B %G à %Hh%M.%S", strtotime($n['date_creation'])); ?> 
	 		<!-- strftime permet de configurer le format de la date  -->
	 		<!-- strtotime transforme un texte anglais en timestamp -->
	 		<br><a href="news.php?id=<?=$n['id']?>">Lire l'article</a>
	 		<!-- cible la news donc l'id est récupérer avec $n['id'] -->
	 		<br><a href="news.php?id=<?php echo $n['id']?>">Lire l'article suite</a>
	 		<!-- Fait la même chpose, mais on peu faire le echo php avec le raccourci < ?= => -->
	 		<hr>
	 	<?php }  ?>

	<?php require 'inc/footer.php' ?> <!-- affichera autant de fois qu'on appel le fichier -->