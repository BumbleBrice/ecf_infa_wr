	<?php require '../inc/header.php' ?> <!-- On requière le fichier header.php qui se trouve dans le dossier inc -->
	<?php require '../inc/connect.php' ?> <!-- idéme ligne du dessus -->
	<?php require '../inc/session.php' ?> <!-- idéme ligne du dessus -->
	<?php require '../inc/admin_nav.php' ?> <!-- idéme ligne du dessus -->


	<div class="container">
		
	<p>Liste des Podcasts</p>
	<?php 
		$response = $bdd->query('SELECT * FROM podcasts ORDER BY ID DESC');
		$response->execute();
		$podcast = $response->fetchAll(PDO::FETCH_ASSOC);
	 ?>
	 <ul class="list-group list-group-flush">
	 <?php 
	 	foreach ($podcast as $p) {  ?>
	 		<li class="list-group-item d-flex justify-content-between">
	 			<div class="text-uppercase">
	 				<?= $p['title']?>
	 			</div>
	 			<div class="text-uppercase">
	 				<button class="text-uppercase btn btn-warning">midifier le podcast</button>
	 				<button class="text-uppercase btn btn-danger">Supprimer le podcast</button>
	 			</div>
	 		</li>
	 	<?php }  ?>
	 </ul>

	</div>
	<?php require '../inc/footer.php' ?>