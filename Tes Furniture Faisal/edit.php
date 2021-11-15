<?php
include("library.php");
$library = new library();
$id = $_GET['id'];
extract($library->editData($id));
?>
<form action="proses.php?action=edit" method="post" enctype="multipart/form-data">
    <table border="1" cellspacing="0">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="hidden" name="foto_lama" value="<?= $photo; ?>">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="name" value="<?= $name; ?>"></td>
        </tr>
        <tr>
        <td>Kategori</td>
			<td>
				<select name="kategori">
					<option value="Meja" <?php if ($category == "Meja") ?>>Meja</option>
					<option value="Kursi" <?php if ($category == "Kursi") ?>>Kursi</option>
					<option value="Lemari" <?php if ($category == "Lemari") ?>>Lemari</option>
				</select>
			</td>
        </tr>
        <tr>
        <td>Harga</td>
			<td><input type="number" name="price"></td>
        </tr>
        <tr>
        <td>Jumlah</td>
			<td><input type="number" name="quantity"></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>
                <img src="asset/<?= $category;?>/<?= $photo; ?>" width="100" height="100"><br>
                <input type="file" name="photo">
            </td>
        </tr>
    </table>
    <input type="submit" value="Save">
    <a href="index.php"><input type="button" value="Cancel" class="btn btn-"></a>
</form>