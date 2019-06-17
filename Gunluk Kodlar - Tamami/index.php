<!DOCTYPE html>
<html>
<head>
<title>Günlük | Giris</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="row mt30">
	<h1 class="logo"><i>Günlük</i></h1>
</div>

<div class="row mt25">
	<form method="POST" action="islem.php?action=giriskontrol">
		<div class="row giris_row">
			<div class="r05">
				<img src="icon/users.png" class="giris_img">
			</div>
			<div class="r9">
				<input type="text" name="kadi" class="giris_input" placeholder="Kullanıcı Adınız">
			</div>
		</div>

		<div class="row giris_row">
			<div class="r05">
				<img src="icon/pass.png" class="giris_img">
			</div>
			<div class="r9">
				<input type="password" name="sifre" class="giris_input" placeholder="Şifreniz">
			</div>
		</div>

		<div class="row mt10">
			<img src="icon/facebook.png" class="facebook_icon">
		</div>

		<div class="row mt10">
			<div class="w40">
				<input type="submit" class="giris_buton" value="Giriş Yap">
			</div>
			<div class="w40">
				<a href="kayitol.php"><input type="button" class="giris_buton" value="Kayıt Ol"></a>
			</div>
		</div>
	</form>
</div>

</body>
</html>
