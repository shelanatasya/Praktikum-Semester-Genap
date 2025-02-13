<!DOCTYPE html>
<html>
<head>
	<title>CRUD BUKU</title>
</head>
<body>
 
	<h2>CRUD BUKU</h2>
	<br/>
	<a href="tambah.php">+ TAMBAH BUKU</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>kode buku</th>
			<th>judul</th>
			<th>pengarang</th>
			<th>penerbit</th>
            <th>harga</th>
            <th>stok</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from books");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['kode_buku']; ?></td>
				<td><?php echo $d['judul']; ?></td>
				<td><?php echo $d['pengarang']; ?></td>
                <td><?php echo $d['penerbit']; ?></td>
                <td><?php echo $d['harga']; ?></td>
                <td><?php echo $d['stok']; ?></td>
				<td>
					
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>