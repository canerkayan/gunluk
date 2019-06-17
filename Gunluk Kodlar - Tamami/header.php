<?php 

session_start();
if (isset($_SESSION['oturum'])) {
  echo "";
} else {
  header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Günlük | Anasayfa</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include('db.php'); ?>

<?php 
	if (isset($_SESSION['oturum'])) {
	  echo '<a href="anasayfa.php" style="text-decoration: none;">
			<div class="row mt5e">
				<h1 class="logo_kayit"><i>Günlük</i></h1>
			</div>
		</a>';
	} else {
	  echo '<div class="row mt5e">
				<h1 class="logo_kayit"><i>Günlük</i></h1>
			</div>';
	}
?>


<div class="row mb5">
	<?php
		$link = $_SERVER['SCRIPT_NAME'];
		$dizin = '/mobilapp/';

		if ($link == $dizin.'anasayfa.php') {
			echo '<h1 class="green_title"><i>Hoşgeldiniz '.$_SESSION['kullanici_adi'].' :)</i></h1>';
		} elseif($link == $dizin.'gunluk_yaz.php') {
			echo '<h1 class="green_title"><i>Günün Nasıl Geçti ?</i></h1>';
		} elseif($link == $dizin.'arkadaslarim.php') {
			echo '<h1 class="green_title"><i>Arkadaşlarım</i></h1>';
		} elseif($link == $dizin.'gunlukler.php') {
			echo '<h1 class="green_title"><i>Yazdığım Günlükler</i></h1>';
		} elseif($link == $dizin.'anketler.php') {
			echo '<h1 class="green_title"><i>Anketler</i></h1>';
		} elseif($link == $dizin.'profilim.php') {
			echo '<h1 class="green_title"><i>Profil Bilgilerim</i></h1>';
		} elseif($link == $dizin.'fotograf.php') {
			echo '<h1 class="green_title"><i>Fotoğraf,Video Ekle</i></h1>';
		} elseif ($link == $dizin.'kprofil.php') {
			echo '<h1 class="green_title"><i>Arkadaşlarım</i></h1>';
		} elseif ($link == $dizin.'arkadas_istekleri.php') {
			echo '<h1 class="green_title"><i>Arkadaş İstekleri</i></h1>';
		}
	?>
</div>