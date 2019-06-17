<?php
include('header.php');

$kadi = $_SESSION['kullanici_adi'];

$sql=$db->query("SELECT * FROM kullanici WHERE kadi='$kadi'");
$row = mysqli_fetch_array($sql);
$kullanici_id = $row['id'];
?>

<!-- main -->
<div class="row mt5e">
	<div class="row g_menu_row arkadas_row">
		<div class="row">
			<input type="hidden" name="kadi" value="<?php echo $kullanici_id; ?>">
		</div>

		<?php 
		$query = $db->query("SELECT * FROM kullanici WHERE id<>'$kullanici_id'");
		if($query->num_rows > 0){
			while($row = $query->fetch_assoc()){
				$kullanicim = $row['id'];
			
				echo '<div class="row fl">
					<div class="a1">
						<img src="icon/user.png" style="width: 100%;">
					</div>';

					$query2 = $db->query("SELECT * FROM arkadaslarim WHERE parent_kadi = '$kullanici_id' AND kadi='$kullanicim'");
					if($query2->num_rows > 0){
						while ($row2 = $query2->fetch_assoc()) {
							$durum = $row2['durum'];
							if ($durum==1) {
								echo	'<div class="a2">
											<a href="kprofil.php?id='.$row['id'].'" style="text-decoration:none;color:#ffb061">'.$row['kadi'].'</a>
										</div>';

								echo '<div class="a3">
											<img src="icon/star.png" style="width: 50%;">
										</div>
									</div>';
							} else {
								echo	'<div class="a2">
											'.$row['kadi'].'
										</div>';
								echo '<div class="a3">
											<img src="icon/star_no.png" style="width: 50%;">
										</div>
									</div>';
							}
						} 
					} else {
						echo	'<div class="a2">
											'.$row['kadi'].'
										</div>';
						echo '
						<div class="a3">
						<a href="islem.php?action=arkadasekle&kid='.$row['id'].'&kparent='.$kullanici_id.'"><img src="icon/star_yes.png" style="width: 50%;"></a>
							</div>
						</div>';
					}
			}
		}
		?>


	</div>

</div>

<?php include('footer.php'); ?>