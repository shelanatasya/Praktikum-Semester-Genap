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
    <h3>TAMBAH DATA BUKU</h3>
    <form method="post" action="tambah_aksi.php">
        <table>
            <tr>
                <td>kode buku</td>
                <td><input type="text" name="kode buku"></td>
            </tr>
            <tr>
                <td>judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>pengarang</td>
                <td><input type="text" name="pengarang"></td>
            </tr>
            <tr>
                <td>penerbit</td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>stok</td>
                <td><input type="text" name="stok"></td>
            </tr>

            <td></td>
            <td><input type="submit" value="SIMPAN"></td>
        </table>
    </form>
</body>

</html>