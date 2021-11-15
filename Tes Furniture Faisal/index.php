<table border="1" cellpadding="0">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Kategori</td>
        <td>Harga</td>
        <td>Jumlah</td>
        <td>Foto</td>
        <td>Option</td>
    </tr>
    <?php
    include("library.php");
    $library = new library();
    $read = $library->readData();
    $no = 0;
    
    while ($data = $read->fetch(PDO::FETCH_OBJ)) {
        $no++;
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data->name; ?></td>
            <td><?= $data->category; ?></td>
            <td><?= $data->price; ?></td>
            <td><?= $data->quantity; ?></td>
            <td><img src="asset/<?= $data->category; ?>/<?= $data->photo; ?>" height="100" width="100"></td>
            <td>
                <a href="edit.php?id=<?= $data->id; ?>">EDIT</a>
                ||
                <a href="proses.php?action=delete&id=<?= $data->id; ?>">DELETE</a>
            </td>
        </tr>
        
    <?php } ?>
    <a href="create.php"><button>Create</button></a>
</table>