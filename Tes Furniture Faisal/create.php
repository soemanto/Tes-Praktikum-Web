<?php error_reporting(0); ?>
<form action="proses.php?action=create" method="post" enctype="multipart/form-data">
	<table border="1" cellspacing="0">
    <tr>
			<td>ID</td>
			<td><input type="text" name="id"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>
				<select name="category">
					<option value="Meja" <?php if ($category == "Meja") ?>>Meja</option>
					<option value="Kursi" <?php if ($category == "Kursi") ?>>Kursi</option>
					<option value="Lemari" <?php if ($category == "Lemari") ?>>Lemari</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td><input type="number" name="price" required></td>
		</tr>
        <tr>
        <td>Jumlah</td>
			<td><input type="number" name="quantity" required></td>
        </tr>
		<tr>
			<td>Foto</td>
			<td><input type="file" name="photo" required></td>
		</tr>
	</table>
	<input type="submit" value="Create">
	<a href="index.php"><input type="button" value="Cancel"></a>
</form>