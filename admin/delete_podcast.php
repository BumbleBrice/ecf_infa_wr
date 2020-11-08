<?php
require '../inc/session.php'; 
require '../inc/connect.php';

// pseudo sécu

if(!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin')
{
  header('Location: index.php');
}


$post = [];
$get = [];
$error = array();
$showError = false;
$title = "";
$content = '';

if(isset($_GET['id']))
{
  foreach ($_GET as $key => $value) 
  {
    $get[$key] = htmlspecialchars($value);
  }

  $requete = $bdd->prepare('DELETE FROM podcasts WHERE id = :id');
  $requete->bindValue(':id', $get['id']);

  if($requete->execute()) 
  {
    header('Location: index.php');
  }
}
?>
