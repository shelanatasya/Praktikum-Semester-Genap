<!DOCTYPE html>
<html>

<head>
	<title>CRUD BUKU</title>
</head>

<body>

	<h2>CRUD BUKU</h2>
	<br />
	<a href="index.php">KEMBALI</a>
	<br />
	<br />
	<h3>EDIT BUKU</h3>

	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi, "select * from books where id_buku='$id'");
	while ($d = mysqli_fetch_array($data)) {
		?>
		<form method="post" action="update.php">
			<table>
				<tr>
					<td>ID</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id_buku']; ?>">
						<input type="text" name="nama" value="<?php echo $d['kode_buku']; ?>">
					</td>
				</tr>
				<tr>
					<td>JUDUL</td>
					<td><input type="text" name="judul" value="<?php echo $d['judul']; ?>"></td>
				</tr>
				<tr>
					<td>PENGARANG</td>
					<td><input type="text" name="pengarang" value="<?php echo $d['pengarang']; ?>"></td>
				</tr>
				<tr>
					<td>PENERBIT</td>
					<td><input type="text" name="penerbit" value="<?php echo $d['penerbit']; ?>"></td>
				</tr>
				<tr>
					<td>HARGA</td>
					<td><input type="number" name="harga" value="<?php echo $d['harga']; ?>"></td>
				</tr>
				<tr>
					<td>STOK</td>
					<td><input type="number" name="stok" value="<?php echo $d['harga']; ?>"></td>


				</tr>
				<td><input type="submit" value="SIMPAN"></td>
				</tr>
			</table>
		</form>
		<?php
	}
	?>

</body>

</html>