<?php

define("DB_SERVER", "127.0.0.1");
  define("DB_USERNAME", "root");
  define("DB_PASSWORD", null);
  define("DB_DATABASE", "hotel");
//$conn=@mysqli_connect($server_name,$mysql_password,$mysql_username,$db_name);
$conn=@mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>