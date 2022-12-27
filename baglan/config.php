<?php

$host = "localhost"; 
$veritabani_adi = "14server";
$kullanici_adi = "root";
$sifre = "";

try {
	$db = new PDO("mysql:host=$host;dbname=$veritabani_adi", "$kullanici_adi", "$sifre");
} catch ( PDOException $e ){
	print $e->getMessage();
}
?>
