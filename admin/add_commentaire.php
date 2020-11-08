<?php
  // on initialise la session (toujours en tout premier !!!)
  session_start();

  // vérifie si l'utilisateir est connecter
  if(!isset($_SESSION['user']) || empty($_SESSION['user']))
  {
    header('Location: /');
  }

  if(!empty($_POST))
  {
    $post = array_map('htmlspecialchars', $_POST);

    var_dump($post);
  }
?>