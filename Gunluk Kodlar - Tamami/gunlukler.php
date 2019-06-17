<?php 
include('header.php');

$kadi = $_SESSION['kullanici_adi'];

$sql=$db->query("SELECT * FROM kullanici WHERE kadi='$kadi'");
$row = mysqli_fetch_array($sql);
$kullanici_id = $row['id'];


?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
	$(function(){
		$("#cek").click(function(){
			$.ajax({
				url:'select.php',
				type:'POST',
				data: $('#data-formu').serialize(),
				success:function(result){
					$('.veriler').html(result);
				}
			});
		});
		$("#sil").click(function(){
			$.ajax({
				url:'sil.php',
				type:'POST',
				data: $('#data-formu').serialize(),
				success:function(result){
					$('.veriler').html(result);
				}
			});
		});
	});
</script>





<!-- main -->
<div class="row mt5e">
	<form method="POST" id="data-formu">
		<div class="row g_menu_row" style='overflow:hidden;height:auto'>
			<div class="r05">
				<img src="icon/k5.png" class="giris_img">
			</div>
			<div class="r9">
				<input placeholder="Tarih" name="tarih" class="g_input" type="text" onfocus="(this.type='date')"  id="date"> 
				<input type="hidden" name="kadi" value="<?php echo $kullanici_id; ?>">
				
			</div>
			<div class="row">
				<div class="r10 text-center" style="width: 100%;">
					<div class="veriler"></div>
				</div>
			</div>
		</div>

		<div class="row menu_row ">
			<div class="r10 text-center ">
				<input type="button" id="cek" class="menu_text" value="Listele" style="background: transparent;border: 0px;">
			</div>
		</div>

		<div class="row menu_row ">
			<div class="r10 text-center ">
				<input type="button" id="sil" class="menu_text" value="Girilen Tarihteki Günlüğü Sil" style="background: transparent;border: 0px;">
			</div>
		</div>
	</form>
</div>
<?php include('footer.php'); ?>