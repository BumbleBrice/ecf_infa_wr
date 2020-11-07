	<?php require '../inc/header.php' ?> <!-- On requière le fichier header.php qui se trouve dans le dossier inc -->
	<?php require '../inc/connect.php' ?> <!-- idéme ligne du dessus -->
	<?php require '../inc/session.php' ?> <!-- idéme ligne du dessus -->


	<header>
		<h1>Mon super mini site !</h1>
		<h4><a href="add_news.php">Ajouter une nouelle news</a></h4>
	</header>
	<p>Nous allons créer un super site sympas de news !</p>
	<?php 
		$response = $bdd->query('SELECT * FROM news ORDER BY ID DESC');
		$response->execute();
		$news = $response->fetchAll(PDO::FETCH_ASSOC);
	 ?>
	 <h4>Les dernières news</h4>
	 <ul>
	 <?php 
	 	foreach ($news as $n) {  ?>
	 		<li><?= $n['title']?> </li>
	 	<?php }  ?>
	 </ul>

	<?php require '../inc/footer.php' ?>