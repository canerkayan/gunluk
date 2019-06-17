<?php include('header.php'); ?>
	<?php 
		echo"Bir hata ile karşılaştınız, yeniden giriş yapmanız gerekmektedir."; 
		header("refresh: 3; url=index.php"); 
	?>
<?php include('footer.php'); ?>