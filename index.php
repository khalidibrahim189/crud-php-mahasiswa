<?php

// connect to database
$server = "localhost";
$user = "root";
$pas = "";
$database = "db_latihan";

$koneksi = mysqli_connect($server, $user, $pas, $database) or die(mysqli_error($koneksi));

//jika button diklik
if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs(nim, nama, alamat, prodi)
                                     VALUES ('$_POST[tnim]',
                                     '$_POST[tnama]',
                                     '$_POST[talamat]',
                                     '$_POST[tprodi]')
                                     ");
    if ($simpan) {
        echo "<script>
                alert('Data berhasil disimpan!');
                document.location = 'index.php';
            </script>";
    } else {
        echo "<script>
        alert('Data tidak tersimpan!');
        document.location = 'index.php';
    </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crud Mahasiswa</title>
</head>

<body>

    <div class="container">
        <h2 class="text-center">Data Mahasiswa</h2>

        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Form Input Mahasiswa
            </div>
            <div class="card-body">
                <div class="container">
                    <form method="post" action="">
                        <div class="form-group mt-2">
                            <label class="mt-2">NIM</label>
                            <input type="text" name="tnim" class="form-control mt-2" placeholder="Masukan NIM" required>
                        </div>
                        <div class="form-group mt-2">
                            <label class="mt-2">Nama</label>
                            <input type="text" name="tnama" class="form-control mt-2" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group mt-2">
                            <label class="mt-2">Alamat</label>
                            <textarea name="talamat" class="form-control mt-2" placeholder="Masukan Alamat" required></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label class="mt-2">Program Studi</label>
                            <select class="form-control" name="tprodi">
                                <option></option>
                                <option value="D3-MI">D3-MI</option>
                                <option value="S1-ST">S1-ST</option>
                                <option value="S1-TI">S1-TI</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success mt-2 " name="bsimpan">Simpan</button>
                        <button type="reset" class="btn btn-danger mt-2 " name="bsimpan">Kosongkan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    Daftar Mahasiswa
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Asal</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>

                        <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
                        while ($data = mysqli_fetch_array($tampil)) :

                        ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nim'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['prodi'] ?></td>
                                <td>
                                    <a href="" class="btn btn-danger">Hapus</a>
                                    <a href="" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>

                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>