<?php 
include('header.php');

$id = $_GET['id'];

$sql=$db->query("SELECT * FROM kullanici WHERE id='$id'");
$row = mysqli_fetch_array($sql);
$kullanici_id = $row['id'];
$kullanici_ad = $row['kadi'];


?>

<div class="row mb5">
<h1 class="green_title"><i><b><?php echo $kullanici_ad; ?><br><font style="font-size: 25px;">Fotoğrafları & Videoları</font></b> </i></h1>
</div>

<div class="row mt5e g_menu_row" style="padding-top: 2%;overflow: hidden;height: auto">

	<?php 
	$query = $db->query("SELECT * FROM fotograf WHERE kadi='$kullanici_id'");
	if($query->num_rows > 0){ 
	    while($row = $query->fetch_assoc()){
	    	echo '<div class="r2 text-center" style="width:100%;margin-left:0px;padding-bottom:2%;border-bottom:0.1px solid #3d7c7b;margin-bottom:3%">';
	    	echo '<img src="'.$row['resim'].'" class="r2_image" style="height:auto;width:75%">';
	    	echo '</div>';
	    }
	}

	?>
</div>

<?php include('footer.php'); ?>