<?php 
require("db.php");
$kadi = $_POST['kadi'];
$tarih = $_POST['tarih'];

$sil = $db->query("DELETE FROM gunluk WHERE kadi='$kadi' AND tarih='$tarih' ");
 
?>