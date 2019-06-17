<?php 
include('header.php');

$id = $_GET['id'];

$sql=$db->query("SELECT * FROM kullanici WHERE id='$id'");
$row = mysqli_fetch_array($sql);
$kullanici_id = $row['id'];
$kullanici_ad = $row['kadi'];


?>

<div class="row mb5">
<h1 class="green_title"><i><b><?php echo $kullanici_ad; ?></b> Günlükleri</i></h1>
</div>

<div class="row mt5e">
	<?php 

	$query = $db->query("SELECT * FROM gunluk WHERE kadi='$id' ORDER BY id DESC");
	if($query->num_rows > 0){
		while($row = $query->fetch_assoc()){
			echo '<div class="row giris_row krow">
					<div class="r5 pt3e5 text-center kic">
						<font class="k_text">'.$row['tarih'].'</font>
					</div>
					<div class="r5 pt4 kicon" >
						<img src="'.$row['resim'].'" class="k100">
					</div>
					<div class="r5 pt4 ktext">
						'.$row['icerik'].'
					</div>
				</div>';
		}
	}

	?>
</div>

<?php include('footer.php'); ?>