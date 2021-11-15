<?php 
//	session_start();
//	include 'db.php';
//	if($_SESSION['status_login'] != true){
//		echo '<script>window.location="login.php"</script>';
//	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<style>
			.pagination {
			display: inline-block;
			
			}

			.pagination a {
			color: black;
			float: left;
			padding: 8px 16px;
			text-decoration: none;
			}

			.pagination a.active {
			background-color: #4CAF50;
			color: black;
			}

			.pagination a:hover:not(.active) {background-color: #ddd;}
	</style>
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
			<h3>Data Produk</h3>
			<div class="box">
				<p><a href="add-product.php">Tambah Data</a></p>
                
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Foto</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    include("library.php");
                    $library = new library();
					$jumlahdataperhalaman = 5;
                    $no = 0;
                    $count = $library->countData();
					$jumlahHalaman = ceil($count/$jumlahdataperhalaman);
					$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
					$awaldata = ($jumlahdataperhalaman * $halamanAktif)-$jumlahdataperhalaman;
					$read = $library->readDatap($awaldata, $jumlahdataperhalaman);
                    if($count > 0){
                    while ($data = $read->fetch(PDO::FETCH_OBJ)) {
                        $no++;
                    ?>
                        <tr>
                           
                            <td><?= $no + $awaldata; ?></td>
                            <td><?= $data->name; ?></td>
                            <td><?= $data->category; ?></td>
                            <td><?= $data->price; ?></td>
                            <td><?= $data->quantity; ?></td>
                            <td><img src="asset/<?= $data->category; ?>/<?= $data->photo; ?>" height="100" width="100"></td>
                            <td>
                                <a href="edit-product.php?id=<?= $data->id; ?>">EDIT</a>
                                ||
                                <a href="proses.php?action=delete&id=<?= $data->id; ?>">DELETE</a>
                            </td>
                        </tr>
                        
                    <?php } ?>
                       
						<?php }else{ ?>
							<tr>
								<td colspan="7">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php if($count>$jumlahdataperhalaman) {?>
						<div class="pagination">
								<?php if ($halamanAktif>1) { ?>
									<a href="?halaman= <?php echo $halamanAktif-1 ?>">&laquo;</a>
								<?php } ?>
								<?php for ($i=1; $i <= $jumlahHalaman; $i++) { ?>
									<a href="?halaman= <?php echo $i ?>"><?= $i ?></a>
								<?php } ?>
								<?php if ($halamanAktif<$jumlahHalaman) { ?>
									<a href="?halaman= <?php echo $halamanAktif+1 ?>">&raquo;</a>
								<?php } ?>
						</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - Bukawarung.</small>
		</div>
	</footer>
</body>
</html>