<?php include 'inc/header.php' ?>
<?php include 'inc/connect.php' ?>
<?php include 'inc/nav.php' ?>

<div class="main__top container">
<h2>Les Podcats de la Web & Radio!</h2>
<!-- Portfolio Item Heading -->
  	<?php 
	if (isset($_GET['id'])) { // 03
		$id_podcast = (int) $_GET['id'];
		$req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(date_add, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM podcasts WHERE id = ?');
		$req->execute([$id_podcast]);
		$podcast = $req->fetchAll(PDO::FETCH_ASSOC);
		if (empty($podcast)) {
			echo 'Pas de news à afficher! ';
		} else { // 02
			foreach ($podcast as $p) { // 01 ?>
  <h1 class="my-4"><?=$p['title'] ?>
    <small>Le podcast !</small>
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">
    <div class="col-md-8">
      <img class="img-fluid" src="img/picture_file/default_picture.jpg" alt="">
    </div>
    <div class="col-md-4">
      <h3 class="my-3">Project Description</h3>
      <p><?= $p['content'] ?></p>
      <h3 class="my-3">Project Details</h3>
      <ul>
        <li><?= $p['date_creation_fr'] ?></li>
      </ul>
    </div>

  </div>
  <!-- /.row -->

			<?php } //01 ferme le foreach 
		} // 02 ferme le else ligne 16
	} // 03 ferme le if ligne 9
	?>
</div>
<?php include 'inc/footer.php' ?>