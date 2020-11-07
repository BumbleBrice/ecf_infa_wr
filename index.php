	<?php require 'inc/header.php' ?> <!-- On requière le fichier header.php qui se trouve dans le dossier inc -->
	<?php require 'inc/connect.php' ?> <!-- idéme ligne du dessus -->
	<?php include 'inc/nav.php' ?> <!-- On inclue le fichier nav.php -->
		<!-- Différence entre require et include? 
		Dans les deux cas, j'appel un fichier, le require ne fera pas fonctionner la suite du code alors que l'include n'a pas d'obligation de trouver le fichier -->
	<?php 
		// je crée une variable, qui va stocker une requete query
		// la requete selectionne tout (*) les champs de la table news pour les classer par ordre ascendant avec une limite de 2 
		$response = $bdd->query('SELECT * FROM podcasts');
		// On execute la requete
		$response->execute();
		// fetch retourne un tableau qui contient les données
		$news = $response->fetchAll(PDO::FETCH_ASSOC);
		// l'opérateur de portée :: se nomme PAAMAYIM NEKUDOTAYIM
	 ?>
	<div class="container">	
    	<div id="slideshow" class="slideshow">
			<img src="https://bumbleweb.net/mlp/mlp1.jpg">
			<div class="button d-flex justify-content-center mt-3">
				<a href="#" class="prevBtn m-1">
					<img src="img/slider/_controls/prev.svg" alt="">
				</a>
				<a href="#" class="pauseBtn">
					<img src="img/slider/_controls/pause.svg" alt="">
				</a>
				<a href="#" class="nextBtn m-1">
					<img src="img/slider/_controls/next.svg" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="container">
		<h4 class="text-center m-5">Les podcasts</h4>
		<div class="card-deck row row-cols-1 row-cols-md-3">
			<?php 
		 	foreach ($news as $n) {  // On crer une boucle et on crée un alis $n de $news
		 		setlocale(LC_TIME, "fr_FR", "French"); // Permet de modifié les infos de localisation et de les traduires en français
					?>
					<div class="col mb-4">
						<div class="card">
							<a href="news.php?id=<?=$n['id']?>">
					    		<img src="img/picture_file/default_picture.jpg" class="card-img-top" alt="...">
					    		<div class="card-body">
					      				<h5 class="card-title"><?= $n['title']?></h5>
					      				<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					    		</div>
					    		<div class="card-footer">
							      <small class="text-muted">Ajouter le : <?= strftime("%A %d %B %G à %Hh%M.%S", strtotime($n['date_add'])); ?></small>
							    </div>
		 					</a>
						</div>
					</div>
		 	<?php }  ?>
			
		</div>
	 
	</div>
	<?php require 'inc/footer.php' ?> <!-- affichera autant de fois qu'on appel le fichier -->