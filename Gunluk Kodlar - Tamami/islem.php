<!DOCTYPE html>
<html>
<head>
<title>Günlük | Anasayfa</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="text-align: center;">

<div class="row mt5e">
	<h1 class="logo_kayit"><i>Günlük</i></h1>
</div>

<?php
include('db.php');


if ($_REQUEST['action']=='giriskontrol') {
	session_start();
	$gelen_kullanici_adi=$_POST['kadi']; 
	$gelen_kullanici_sifre=$_POST['sifre']; 
	mysql_connect("localhost","teknogoz_gunluk","R@6(HbZv9,{N"); 
	mysql_select_db("teknogoz_gunluk"); 

	$sorgu="SELECT * FROM kullanici WHERE kadi='$gelen_kullanici_adi' AND sifre='$gelen_kullanici_sifre'";
	$kontrol=mysql_query($sorgu); 
	$sayi=mysql_num_rows($kontrol); 
	if ($sayi!=0) { 
		$_SESSION['oturum']=true; 
		$_SESSION['kullanici_adi']= $gelen_kullanici_adi; 
		header("refresh: 0; url=anasayfa.php"); 
	} elseif($gelen_kullanici_adi=="" && $gelen_kullanici_sifre=="") {
		echo"Kullanıcı Adı ve Şifre Boş Geçilemez"; 
		header("refresh: 3; url=index.php");
	} elseif(empty($gelen_kullanici_adi)) {
		echo"Kullanıcı Adı Boş Geçilemez"; 
		header("refresh: 3; url=index.php");
	} elseif(empty($gelen_kullanici_sifre)) {
		echo"Şifre Boş Geçilemez"; 
		header("refresh: 3; url=index.php");
	} else {
		echo"Kullanıcı Adı Veya Şifre Yanlış"; 
		header("refresh: 3; url=index.php"); 
	} 
} elseif($_REQUEST['action']=='cikis') {
	session_start();
	$_SESSION = array();
	session_destroy();
	header("refresh: 0; url=index.php");
} elseif($_REQUEST['action']=='kayitol') {
	$kadi = $_POST['kadi'];
	$sifre = $_POST['sifre'];
	$eposta = $_POST['eposta'];
	$tel = $_POST['tel'];
	$dtarih = $_POST['dtarih'];
	$sehir = $_POST['sehir'];

	$sorgu = $db->query("SELECT * FROM kullanici WHERE kadi='$kadi'");
	$row = mysqli_fetch_array($sorgu);
	$kullanici_adi = $row['kadi'];

	if ($kadi === $kullanici_adi) {
	    header("refresh: 3; url=kayitol.php");
		echo "Aynı kullanıcı adı bulunduğundan dolayı kaydınız gerçekleşmemektedir.";
	} else {
		$kayit = $db->query("INSERT INTO kullanici (kadi, sifre, eposta, tel, dtarih, sehir) VALUES ('$kadi', '$sifre', '$eposta', '$tel', '$dtarih', '$sehir')");

		if($kayit){
	        header("Location: index.php");
	    }else{
	        header("Location: hata.php");
	    }
	}

} elseif($_REQUEST['action']=='fotograf_sil') {
	$id = $_GET['id'];

	$sil = $db->query("DELETE FROM fotograf WHERE id='$id'");

	if ($sil) {
		header("Location: fotograf.php");
	} else {
		header("Location: hata.php");
	}
} elseif($_REQUEST['action']=='anketolustur') {
	$kid = $_POST['id'];
	$kadi = $_POST['kadi'];
	$soru = $_POST['soru'];
	$evet = 0;
	$hayir = 0;

	$kayit = $db->query("INSERT INTO anket (soru, kadi, kid, evet, hayir) VALUES ('$soru','$kadi','$kid','$evet','$hayir')");

	if ($kayit) {
		header("Location: anketler.php");
	} else {
		header("Location: hata.php");
	}
} elseif($_REQUEST['action']=='arkadasekle') {
	$kid = $_GET['kid'];
	$kparent = $_GET['kparent'];
	$durum = '0';

	$kayit = $db->query("INSERT INTO arkadaslarim (parent_kadi, kadi, durum) VALUES ('$kparent','$kid','$durum')");

	$kayit2 = $db->query("INSERT INTO arkadaslarim (parent_kadi, kadi, durum) VALUES ('$kid','$kparent','1')");

	if ($kayit) {
		header("Location: arkadaslarim.php");
	} else {
		header("Location: hata.php");
	}
} elseif ($_REQUEST['action']=='onayla') {
	$onay_id = $_GET['onay_id'];
	$islem = $onay_id;

	$guncelle = $db->query("UPDATE arkadaslarim SET durum='1' WHERE id='$onay_id'");
	if ($guncelle) {
		header("Location: arkadas_istekleri.php");
	} else {
		header("Location: hata.php");
	}
} elseif ($_REQUEST['action']=='anket_evet') {
	$anket_id = $_GET['id'];

	$arama = $db->query("SELECT * FROM anket WHERE id='$anket_id'");
	$row = mysqli_fetch_array($arama);
	$evet = $row['evet'];
	$islem = $evet + 1;
	echo "string";
	//$guncelle = $db->query("UPDATE anket FROM evet='$islem' WHERE id='$anket_id'");
	$guncelle = $db->query("UPDATE anket SET evet='$islem' WHERE id='$anket_id'");

	if ($guncelle) {
		header("Location: anketler.php");
	} else {
		header("Location hata.php");
	}
} elseif ($_REQUEST['action']=='anket_hayir') {
	$anket_id = $_GET['id'];

	$arama = $db->query("SELECT * FROM anket WHERE id='$anket_id'");
	$row = mysqli_fetch_array($arama);
	$hayir = $row['hayir'];
	$islem = $hayir + 1;
	echo "string";
	//$guncelle = $db->query("UPDATE anket FROM evet='$islem' WHERE id='$anket_id'");
	$guncelle = $db->query("UPDATE anket SET hayir='$islem' WHERE id='$anket_id'");

	if ($guncelle) {
		header("Location: anketler.php");
	} else {
		header("Location hata.php");
	}
}

?>

</body>
</html>