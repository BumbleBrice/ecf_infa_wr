<?php include 'inc/header.php' ?>
<?php include 'inc/connect.php' ?>
<?php include 'inc/nav.php' ?>

<h2>Ma super news !</h2>

<?php 
	if (isset($_GET['id'])) { // 03
		$id_news = (int) $_GET['id'];
		$req = $bdd->prepare('SELECT id, title, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM news WHERE id = ?');
		$req->execute([$id_news]);
		$news = $req->fetchAll(PDO::FETCH_ASSOC);
		if (empty($news)) {
			echo 'Pas de news à afficher! ';
		} else { // 02
			foreach ($news as $n) { // 01 ?>
				<h1><?=$n['title'] ?></h1>
				<p><?= $n['contenu'] ?></p>
				<p><?= $n['date_creation_fr'] ?></p>
			<?php } //01 ferme le foreach 
		} // 02 ferme le else ligne 16
	} // 03 ferme le if ligne 9
 include 'inc/footer.php' ?>