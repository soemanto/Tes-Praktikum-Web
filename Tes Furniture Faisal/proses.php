<?php
include("library.php");
$action = $_GET['action'];

if ($action == "create") {
    //$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category = $_POST['category'];
    $quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$photo = $_FILES['photo']['tmp_name'];
	$nama_foto = $_FILES['photo']['name'];
	$directory = "asset/$category/";
	$move = move_uploaded_file($photo, $directory . $nama_foto);

	if ($move) {
		$library = new library();
		$library->createData($name, $description, $category, $price,$quantity, $nama_foto);
		header("location:data-product.php");
	}
}

if ($action == "edit") {
	$id = $_POST['id'];
	$name = $_POST['nama'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$kategori_lama = $_POST['kategori_lama'];
	$price = $_POST['price'];
    $quantity = $_POST['quantity'];
	$foto_lama = $_POST['foto_lama'];
	$photo = $_FILES['photo']['tmp_name'];
	$nama_foto = $_FILES['photo']['name'];
	$directory = "asset/$category/";
	$library = new library();

	if (empty($_FILES['photo']['tmp_name'])) {
		$library->updateData($id, $name,$description, $category, $price,$quantity, $foto_lama);
		header("location:data-product.php");
	} else {
		$directory_lama = "asset/$kategori_lama/";
		move_uploaded_file($photo, $directory . $nama_foto);
		unlink($directory_lama . $foto_lama);
		$library->updateData($id, $name, $description, $category, $price,$quantity, $nama_foto);
		header("location:data-product.php");
	}
}

if ($action == "delete") {
	$library = new library();
	$library->deleteData($_GET['id']);
	header("location:data-product.php");
}
