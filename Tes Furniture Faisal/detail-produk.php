<?php 
	include("library.php");
    $library = new library();
	$read = $library->detailP($_GET['id']);
    $p = $read->fetch(PDO::FETCH_OBJ);
    

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="index.php">Bukawarung</a></h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- search -->


	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="asset/<?= $p->category; ?>/<?= $p->photo; ?>" width="100%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->name ?></h3>
					<h4>Rp. <?php echo number_format($p->price) ?></h4>
					<p>Deskripsi :<br>
						<?php echo $p->description ?>
					</p>
					<p>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p>Jl. RS. Fatmawati Raya, Pd. Labu, Kec. Cilandak, Kota Depok, Daerah Khusus Ibukota Jakarta 12450</p>

			<h4>Email</h4>
			<p>Mejaku@gmail.com</p>

			<h4>No. Hp</h4>
			<p>089666378899</p>
			<small>Copyright &copy; 2020 - Bukawarung.</small>
		</div>
	</div>
</body>
</html>