<?php 
include('header.php');

$kadi = $_SESSION['kullanici_adi'];

$sql=$db->query("SELECT * FROM kullanici WHERE kadi='$kadi'");
$row = mysqli_fetch_array($sql);
$kullanici_id = $row['id'];
$kullanici_adi = $row['kadi'];
$kullanici_sehir = $row['sehir'];
$kullanici_dt = $row['dtarih'];
$kullanici_tel = $row['tel'];
$kullanici_eposta = $row['eposta'];
$kullanici_sifre = $row['sifre'];
$kullanici_kadi = $row['kadi'];

?>

<div class="row mt5e">
	<div class="row giris_row">
		<div class="r5 pt3e5" style="width: 50%">
			<font class="k_text">Kullanıcı Adı</font>
		</div>
		<div class="r5 pt4" style="width: 30%">
			<?php echo $kullanici_kadi; ?>
		</div>
	</div>

	<div class="row giris_row">
		<div class="r5 pt3e5" style="width: 50%">
			<font class="k_text">Şifre</font>
		</div>
		<div class="r5 pt4" style="width: 30%">
			<?php echo $kullanici_sifre; ?>
		</div>
	</div>

	<div class="row giris_row">
		<div class="r5 pt3e5" style="width: 50%">
			<font class="k_text">E-Posta</font>
		</div>
		<div class="r5 pt4" style="width: 30%">
			<?php echo $kullanici_eposta; ?>
		</div>
	</div>

	<div class="row giris_row">
		<div class="r5 pt3e5" style="width: 50%">
			<font class="k_text">Cep Telefonu</font>
		</div>
		<div class="r5 pt4" style="width: 30%">
			<?php echo $kullanici_tel; ?>
		</div>
	</div>

	<div class="row giris_row">
		<div class="r5 pt3e5" style="width: 50%">
			<font class="k_text">Doğum Tarihi</font>
		</div>
		<div class="r5 pt4" style="width: 30%">
			<?php echo $kullanici_dt; ?>
		</div>
	</div>

	<div class="row giris_row">
		<div class="r5 pt3e5" style="width: 50%">
			<font class="k_text">Yaşadığınız Şehir</font>
		</div>
		<div class="r5 pt4" style="width: 30%">
			<?php echo $kullanici_sehir; ?>
		</div>
	</div>

	<div class="row menu_row mb2e5 mt2e5">
		<div class="r10 text-center ">
			<a href="arkadas_istekleri.php?id=<?php echo $kullanici_id; ?>"><input type="submit" class="menu_text" value="Arkadaş İstekleri" style="width: 100%;background: transparent;border: 0px;""></a>
		</div>
	</div>
	<div class="row menu_row mt5">
		<div class="r10 text-center ">
			<a href="islem.php?action=cikis"><input type="submit" class="menu_text" value="Çıkış Yap" style="width: 100%;background: transparent;border: 0px;"></a>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>