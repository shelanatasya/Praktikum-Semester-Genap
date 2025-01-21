<?php 
$conn = new mysqli('localhost','root', '', 'praktikum2');
$query = "SELECT  * FROM jabatan";
$hasil = $conn->query($query);
?>

<?php
if(isset($_POST['nama_jabatan'])) {
    $nama_jabatan = $_POST['nama_jabatan'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $id_jabatan = $_POST['id_jabatan'];
    $hasil = $konek_db->query("INSERT INTO jabatan(nama_jabatan,gaji_pokok,id_jabatan)
     VALUES('$nama_jabatan', $gaji_pokok,id_jabatan)");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap.css">
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id_jabatan</th>
      <th scope="col">nama_jabatan</th>
      <th scope="col">gaji_pokok</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td colspan=></td>
      <td></td>
    </tr>
  </tbody>
</table>
</body>
</html>