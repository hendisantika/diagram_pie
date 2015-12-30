<?php
$server ="localhost";
$username ="root";
$password ="";
$database ="kampus";
mysql_connect("$server","$username","$password")or die("Gagalx");
mysql_select_db("$database")or die("Database tidak ditemukan");
?>
