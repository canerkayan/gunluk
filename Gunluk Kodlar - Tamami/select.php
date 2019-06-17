<?php 
require("db.php");
$kadi = $_POST['kadi'];
$tarih = $_POST['tarih'];

$cek = $db->query("SELECT * FROM gunluk WHERE kadi='$kadi' AND tarih='$tarih' ");
if($cek->fetch_assoc()){
	foreach($cek as $row){
		extract($row);
		echo '<img src="'.$row['resim'].'" style="width:25%;text-align:center;margin-bottom:-3%;">';
		echo '<p>'.$row['icerik'].'</p>';
	}
}
 
 
?>