<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM foto");
?>

<h2>Daftar Foto</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Foto</th>
    </tr>

<?php while($d = mysqli_fetch_array($data)) { ?>
    <tr>
        <td><?php echo $d['id']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td>
            <img src="gambar/<?php echo $d['foto']; ?>" height="100">
        </td>
    </tr>
<?php } ?>
</table>
