<!DOCTYPE html>
<html>
<head>
<title>Günlük | Kayit Ol</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="row mt5e">
	<h1 class="logo_kayit"><i>Günlük</i></h1>
</div>

<div class="row mt5e">
	<form method="POST" action="islem.php?action=kayitol">
		<div class="row giris_row">
			<div class="r05">
				<img src="icon/k1.png" class="giris_img">
			</div>
			<div class="r9">
				<input type="text" name="kadi" class="giris_input" placeholder="Kullanıcı Adı">
			</div>
		</div>

		<div class="row giris_row">
			<div class="r05">
				<img src="icon/k2.png" class="giris_img">
			</div>
			<div class="r9">
				<input type="password" name="sifre" class="giris_input" placeholder="Şifre">
			</div>
		</div>

		<div class="row giris_row">
			<div class="r05">
				<img src="icon/k2.png" class="giris_img">
			</div>
			<div class="r9">
				<input type="password" class="giris_input" placeholder="Şifre Onay">
			</div>
		</div>

		<div class="row giris_row">
			<div class="r05">
				<img src="icon/k3.png" class="giris_img">
			</div>
			<div class="r9">
				<input type="text" name="eposta" class="giris_input" placeholder="E-Posta">
			</div>
		</div>

		<div class="row giris_row">
			<div class="r05">
				<img src="icon/k4.png" class="giris_img">
			</div>
			<div class="r9">
				<input type="text" name="tel" class="giris_input" placeholder="Cep Telefonu">
			</div>
		</div>

		<div class="row giris_row">
			<div class="r05">
				<img src="icon/k5.png" class="giris_img">
			</div>
			<div class="r9">
				<input placeholder="Doğum Tarihi" name="dtarih" class="giris_input" type="text" onfocus="(this.type='date')"  id="date"> 
			</div>
		</div>

		<div class="row giris_row">
			<div class="r5 pt3e5" style="width: 50%">
				<font class="k_text">Yaşadığınız Şehir</font>
			</div>
			<div class="r5" style="width: 30%">
				<select name="sehir" class="giris_input_no_border">
					<option>Seçiniz</option>
					<option value="İstanbul">İstanbul</option>
					<option value="Ankara">Ankara</option>
					<option value="Elazığ">Elazığ</option>
					<option value="Rize">Rize</option>
				</select>
			</div>
		</div>

		<div class="row mt20">
			<div class="w40_kayit">
				<input type="submit" class="kayit_buton" value="Kayıt Ol">
			</div>
		</div>
	</form>
</div>

</body>
</html>
