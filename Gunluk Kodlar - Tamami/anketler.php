<?php 
include('header.php');

$kadi = $_SESSION['kullanici_adi'];

$sql=$db->query("SELECT * FROM kullanici WHERE kadi='$kadi'");
$row = mysqli_fetch_array($sql);
$kullanici_id = $row['id'];
$kullanici_adi = $row['kadi'];

?>

<div class="row mt5e">
	<div class="row giris_row">
		<div class="r5 pt3e5 text-center" style="width: 100%">
			<font class="k_text">Anket Oluştur</font>
		</div>
	</div>
	<form method="POST" action="islem.php?action=anketolustur">
		<div class="row giris_row">
			<div class="r5 pt3e5" style="width: 40%">
				<font class="a_text">Anket Sorusu</font>
			</div>
			<div class="r5 " style="width: 55%">
				<input type="text" name="soru" class="giris_input" placeholder="Soru Alanı" style="border-left:1px solid #d5de80 !important">
				<input type="hidden" name="id" value="<?php echo $kullanici_id; ?>">
				<input type="hidden" name="kadi" value="<?php echo $kullanici_adi; ?>">
			</div>
		</div>

		<div class="row menu_row mt5">
			<div class="r10 text-center">
				<input type="submit" class="menu_text" value="Oluştur" style="background: transparent;border: 0px;">
			</div>
		</div>
	</form>

	<div class="row giris_row mt5">
		<div class="row pt3e5 text-center">
			<font class="k_text">Anketler</font>
		</div>
	</div>


		<?php 
		$query = $db->query("SELECT * FROM anket ORDER BY id DESC");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
            	echo '
            	<div class="row giris_row mt5" style="height: 130px">
				<div class="r2 pt3e5">
				<font class="a_text">'.$row['kadi'].'</font>
				</div>
				<div class="w80 pt3e5" style="padding-top:4%;">
				'.$row['soru'].'
				</div>
				<div class="row mt15">
					<div class="r5 text-center" style="width: 45%">
						<a href="islem.php?action=anket_evet&id='.$row['id'].'" class="menu_text evet" style="text-decoration:none;padding:5%">EVET</a>
					</div>
					<div class="r5 text-center" style="width: 45%">
						<a href="islem.php?action=anket_hayir&id='.$row['id'].'" class="menu_text hayir" style="text-decoration:none;padding:5%">HAYIR</a>
					</div>
				</div>

				<div class="row" style="margin-top:25%;">
					<div class="r5 text-center" style="width: 45%">
						Toplam Evet: <b>'.$row['evet'].'</b>
					</div>
					<div class="r5 text-center" style="width: 45%">
						Toplam Hayır: <b>'.$row['hayir'].'</b>
					</div>
				</div>
			</div>';
			}
		}

	?>
	


</div>
<?php include('footer.php'); ?>