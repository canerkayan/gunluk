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
			<div class="r05">
				<img src="icon/k5.png" class="giris_img">
			</div>
			<div class="r9">
				<input placeholder="Tarih" name="tarih" class="g_input" type="text" onfocus="(this.type='date')"  id="date" required> 
				<textarea class="g_input_text_area" name="icerik" style="margin-top: 2%" placeholder="Yapılan Etkinlik"></textarea>
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
				<input type="submit" class="menu_text" value="Günlüğü Kaydet" style="background: transparent;border: 0px;">
			</div>
		</div>
	</form>

</div>

<?php

if($_POST){
    $tarih=$_POST["tarih"];
    $icerik=$_POST["icerik"];
    $kadi=$_POST['kadi'];

    $dosya_adi=$_FILES["resim"]["name"];

    $uret=array("as","rt","ty","yu","fg");
    $uzanti=substr($dosya_adi,-4,4);
    $sayi_tut=rand(1,10000);
    $yeni_ad="resimler/".$uret[rand(0,4)].$sayi_tut.$uzanti;
    if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
        //echo 'Dosya basariyla yüklendi.';
        $sorgu=$db->query("INSERT INTO gunluk (resim,icerik,tarih,kadi) VALUES ('$yeni_ad','$icerik','$tarih','$kadi')");
        if ($sorgu){
            header('Location: gunlukler.php');
        }else{
            echo 'Kayit sirasinda hata olustu!';
        }
    }else{
        // echo 'Dosya Yüklenemedi!';
        $sorgu=$db->query("INSERT INTO gunluk (icerik,tarih,kadi) VALUES ('$icerik','$tarih','$kadi')");
        if ($sorgu){
            header('Location: gunlukler.php');
        }else{
            echo 'Kayit sirasinda hata olustu!';
        }
    }
}

include('footer.php'); 
?>