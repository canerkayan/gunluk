<?php 
include('header.php'); 

$kadi = $_SESSION['kullanici_adi'];

$sql=$db->query("SELECT * FROM kullanici WHERE kadi='$kadi'");
$row = mysqli_fetch_array($sql);
$kullanici_id = $row['id'];

?>

<div class="row mt5e">

	<?php
		$query = $db->query("SELECT * FROM arkadaslarim WHERE kadi = '$kullanici_id' AND durum=0");
		if($query->num_rows > 0){
			while ($row = $query->fetch_assoc()) {
				$kid = $row['parent_kadi'];

				//die($kid);

				$query2 = $db->query("SELECT * FROM kullanici WHERE id='$kid'");
				while ($row2 = $query2->fetch_assoc()){
					echo '<div class="row giris_row">
					<div class="r5 pt3e5" style="width: 50%">
						<font class="k_text">'.$row2['kadi'].'</font>
					</div>';
					echo '<div class="r5 pt4" style="width: 40%">
								<a href="islem.php?action=onayla&onay_id='.$row['id'].'" style="text-decoration:none;color:green">İsteği Kabul Et</a>
							</div>
						</div>';
				}
			} 
		} 
	?>
	
</div>


<?php include('footer.php'); ?>