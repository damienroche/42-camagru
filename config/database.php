<?php
	$DB_DSN = "mysql:host=42-camagru.dev;dbname=42-camagru;charset=utf8";
	$DB_USER = "root";
	$DB_PASSWORD = "toor";

  try {
    $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
?>
