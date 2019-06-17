<?php 
include('header.php');

$kadi = $_SESSION['kullanici_adi'];

$sql=$db->query("SELECT * FROM kullanici WHERE kadi='$kadi'");
$row = mysqli_fetch_array($sql);
$kullanici_id = $row['id'];

?>

<!-- main -->
<div class="row mt5e">
	<form action="" method="post" name="form1" enctype="multipart/form-data">
		<div class="row g_menu_row">
			<div class="r10 mt5 text-center">
				<?php 
				 $query = $db->query("SELECT * FROM fotograf WHERE kadi='$kullanici_id'");
	                if($query->num_rows > 0){ 
	                    while($row = $query->fetch_assoc()){
	                    	echo '<div class="r2">';
	                    	echo '<img src="'.$row['resim'].'" class="r2_image">';
	                    	echo '<font class="k_text"><a href="islem.php?action=fotograf_sil&id='.$row['id'].'" class="k_text" style="text-decoration:none;">Sil</a></font>';
	                    	echo '</div>';
	                    }
	                }

				?>


				<input type="hidden" name="kadi" value="<?php echo $kullanici_id; ?>">
			</div>
		</div>

		<div class="row menu_row mt7e5">
			<div class="r05">
				<img src="icon/a6.png" class="giris_img">
			</div>
			<div class="r9 text-center pt3e5">
				<input type="file" name="resim" id="img" style="display:none;"/>
				<label for="img" class="menu_text">Fotoğraf,Video Ekle</label>
			</div>
		</div>
		<div class="row menu_row ">
			<div class="r10 text-center ">
				<input type="submit" class="menu_text" value="Dosyayı Kaydet" style="border: 0px;background: transparent;">
			</div>
		</div>
	</form>
</div>

<?php

if($_POST){
    $kadi=$_POST['kadi'];

    $dosya_adi=$_FILES["resim"]["name"];

    $uret=array("as","rt","ty","yu","fg");
    $uzanti=substr($dosya_adi,-4,4);
    $sayi_tut=rand(1,10000);
    $yeni_ad="resimler/".$uret[rand(0,4)].$sayi_tut.$uzanti;
    if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
        $sorgu=$db->query("INSERT INTO fotograf (resim,kadi) VALUES ('$yeni_ad','$kadi')");
        if ($sorgu){
            header('Location: fotograf.php');
        }else{
            echo 'Kayit sirasinda hata olustu!';
        }
    }else{
        echo 'Dosya Yüklenemedi!';
    }
}

include('footer.php'); 
?>