<?php 
/*	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk); */
include("library.php");
$library = new library();
$id = $_GET['id'];
extract($library->editData($id));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Bukawarung</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-product.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Edit Data Produk</h3>
			<div class="box">
				<form action="proses.php?action=edit" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id; ?>">
					<input type="hidden" name="foto_lama" value="<?= $photo; ?>">
					<input type="hidden" name="kategori_lama" value="<?= $category; ?>">

					<select class="input-control" name="category" required>
						<option value="">--Pilih--</option>
						<option value="Meja" <?php if($category == "Meja"):?> selected <?php endif ?>>Meja</option>
						<option value="Kursi" <?php if($category == "Kursi"):?> selected <?php endif ?>>Kursi</option>
						<option value="Lemari" <?php if($category == "Lemari"):?> selected <?php endif ?>>Lemari</option>
					</select>

					<input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?= $name; ?>" required>
					<textarea class="input-control" name="description" placeholder="Deskripsi" required><?= $description;?></textarea><br>
					<input type="number" name="price" class="input-control" placeholder="Harga" value="<?= $price; ?>" required>
					<input type="number" name="quantity" class="input-control" placeholder="Jumlah" value="<?= $quantity;?>" required>

					<img src="asset/<?= $category;?>/<?= $photo; ?>" width="100px">
					<input type="file" name="photo" class="input-control">

					<input type="submit" value="Save" class="btn">
				    <a href="data-product.php"><input type="button" value="Cancel" class="btn"></a>
					
				</form>
				
			
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - Bukawarung.</small>
		</div>
	</footer>
	<script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>