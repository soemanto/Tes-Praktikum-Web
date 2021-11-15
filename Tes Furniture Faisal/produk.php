<?php 
error_reporting(0);
	include("library.php");
	$library = new library();
	$count = $library->countData();
	$read = $library->readData();
	if (isset($_GET["search"]) or isset($_GET["kat"])) {
		//$read = $library->search($_GET["keyword"]);
		if($_GET['search'] != '' || $_GET['kat'] != ''){
			//$search = $_GET['cari'];
			//$kategori = $_GET['kategori'];
			$read = $library->readSearchCategoryData($_GET['search'], $_GET['kat']);
			$count = $library->countsDatabySearch($_GET['search'], $_GET['kat']);
		}
	}
	
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
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
				<?php 
					if($count > 0){
					while($p = $read->fetch(PDO::FETCH_OBJ)){
				?>	
					<a href="detail-produk.php?id=<?php echo $p->id ?>">
						<div class="col-4">
							<img src="asset/<?= $p->category; ?>/<?= $p->photo; ?>">
							<p class="nama"><?php echo substr($p->name, 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format($p->price) ?></p>
						</div>
					</a>
				<?php }}?>
					
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
