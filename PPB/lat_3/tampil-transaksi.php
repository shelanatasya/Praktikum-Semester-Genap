<?php
include "../lat_3/config_db.php";

// ambil data buku
$query = "SELECT * FROM books";
$buku = $konek_db->query($query);
$listbuku = [];
while ($data = $buku->fetch_assoc()) {
    $listbuku[] = $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/bootsrap.js">
</head>

<body>
    <?php include "../template/navbar.php"; ?>
    <div class="container">
        <table clas="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>kode buku</th>
                    <th>judul</th>
                    <th>penerbit</th>
                    <th>harga</th>
                    <th>jumlah</th>
                    <th>subtotal</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="" id="kode_buku" class="form-control form-control-sm"
                            list="list_kode_buku">
                        <datalist id="list_kode_buku">


                        </datalist>
                    </td>
                    <td><input type="text" name="" id="judul" class="form-control form-control-sm" disabled></td>
                    <td><input type="text" name="" id="penerbit" class="form-control form-control-sm" disabled></td>
                    <td><input type="text" name="" id="harga" class="form-control form-control-sm" disabled></td>
                    <td><input type="text" name="" id="jumlah" class="form-control form-control-sm"></td>
                    <td><input type="text" name="" id="subtotal" class="form-control form-control-sm" disabled></td>
                    <td>
                        <button id="tambah-item" class="btn btn-primary btn-sm">+</button>
                    </td>
                </tr>
            </thead>
            <tbody id="list-item">
            </tbody>

        </table>

    </div>
    <script>
        let daftar_buku = <?= json_encode($listbuku) ?>;
        let bukuDiPilih = {}
        let itemBuku = []
        // menambah list buku pada data list
        document.getElementById("kode_buku").oninput = function () {
            let kode = document.getElementById("kode_buku").value
            let filterBuku = daftar_buku.filter(buku => buku.kode_buku.includes(kode))
            if (filterBuku.length > 0) {
                filterBuku = filterBuku.slice(0, 5) // batasi jumlah data yang ditampilkan
                document.getElementById("list_kode_buku").innerHTML = filterBuku.map(buku => `<option value="${buku.kode_buku}">${buku.kode_buku}-${buku.judul}</option>`).join("")
            }

        }
        // event textbox jumlah focus
        document.getElementById("jumlah").onfocus = () => {
            let kode = document.getElementById("kode_buku").value
            bukuDiPilih = daftar_buku.find(ikan => ikan.kode_buku === kode)
            // isi texbox judul,penerbit dan harga
            document.getElementById("judul").value = bukuDiPilih.judul
            document.getElementById("penerbit").value = bukuDiPilih.penerbit
            document.getElementById("harga").value = parseInt(bukuDiPilih.harga).toLocaleString()
        }
        document.getElementById("jumlah").oninput = () => {
            let jumlah = document.getElementById("jumlah").value
            let subtotal = jumlah * bukuDiPilih.harga
            document.getElementById("subtotal").value = parseInt(subtotal).toLocaleString()
        }
        document.getElementById("tambah-item").onclick = ()=>{
            itemBuku.push(bukuDiPilih)
            // kosongkan tbody
            document.getElementById("list-item").innerHTML=""
            // siapkan isi item-buku
            let isi_buku =""
            itemBuku.forEach(buku =>{
                isi_buku+= `
                <tr>
                    <td>
                        <input type="text" name="" id="kode_buku" class="form-control form-control-sm"
                            form-control-sm readonly value="${buku.kode_buku}">
                    </td>
                    <td><input type="text" name="" id="judul" class="form-control form-control-sm" readonly value="${buku.judul}"></td>
                    <td><input type="text" name="" id="penerbit" class="form-control form-control-sm" readonly  value="${penerbit}"></td>
                    <td><input type="text" name="" id="harga" class="form-control form-control-sm" readonly value="${document.getElementById("harga").value}"></td>
                    <td><input type="text" name="" id="jumlah" class="form-control form-control-sm" readonly value="${document.getElementById("jumlah").value}"></td>
                    <td><input type="text" name="" id="subtotal" class="form-control form-control-sm" readonly value="${document.getElementById("subtotal").value}"></td>
                    <td>
                        <button id="tambah-item" class="btn btn-primary btn-sm">-</button>
                    </td>
                </tr>
                `
            })

            // isi tbody dengan list buku
            document.getElementById("list-item").innerHTML=isi_buku
            document.getElementById("judul").value = ""
            document.getElementById("penerbit").value = ""
            document.getElementById("harga").value = ""
            document.getElementById("jumlah").value = ""
            document.getElementById("subtotal").value = ""
        }



    </script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>


