<?php
  $DB_HOST = "42-camagru.dev";
  $DB_NAME = "42-camagru";
  $DB_DSN = "mysql:host=".$DB_HOST.";dbname=".$DB_NAME.";charset=utf8";
  $DB_USER = "root";
  $DB_PASSWORD = "toor";

  $settings = array(
    "db_user" => $DB_USER,
    "db_pwd"  => $DB_PASSWORD,
    "db_dsn"  => $DB_DSN,
    "db_host" => $DB_HOST,
    "db_name" => $DB_NAME
  );

  return $settings;
?>
