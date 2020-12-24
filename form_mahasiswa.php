<?php

include_once 'config/conn.php';
include_once 'templates/header.php';

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id=$id";
$getMahasiswaByIds = mysqli_query($conn, $query);

foreach ($getMahasiswaByIds as $getMahasiswaById) {
    $id = $getMahasiswaById['id'];
    $nama = $getMahasiswaById['nama'];
    $nim = $getMahasiswaById['nim'];
    $jurusan = $getMahasiswaById['jurusan'];
}


?>

<style>
    * {
        font-family: 'Montserrat', sans-serif;
    }

    .heading {
        text-align: center;
    }

    body {
        max-width: 100%;
        width: 80%;
        margin: auto;
    }

    form label {
        display: block;
    }

    form input {
        margin-top: 5px;
        width: 300px;
        height: 30px;
        padding: 5px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-btn {
        width: 150px;
        height: 33px;
        background-color: #00b894;
        color: white;
        border: 0;
    }

    .display {
        margin: auto;
        margin-top: 100px;
        width: 25%;
    }

    .top-nav {
        display: flex;
        justify-content: space-between;
    }

    .top-nav a {
        text-decoration: none;
        color: #00b894;
    }
</style>

<?php
include_once 'templates/header_part.php';
?>


<h1 class="heading">WebSite Poin Pelanggaran</h1>

<div class="display">
    <div class="top-nav">
        <h3><a href="mahasiswa.php"><i class="fas fa-arrow-left"></i></a></h3>
        <h3><?= $id ? 'Edit' : 'Add' ?> Data</h3>
    </div>
    <hr>
    <form action="" method="post">
        <input type="text" name="id" hidden value="<?= $id ? $id : '' ?>">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" value="<?= $nama ? $nama : '' ?>" id="nama" required autocomplete="off" class="form-control" placeholder="Fill Field nama">
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" min="0" max="7" value="<?= $nim ? $nim : '' ?>" id="nim" required autocomplete="off" class="form-control" placeholder="Fill Field nim">
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" value="<?= $jurusan ? $jurusan : '' ?>" id="jurusan" required autocomplete="off" class="form-control" placeholder="Fill Field email">
        </div>

        <button type="submit" name="submit" class="btn-btn">Submit</button>
        <button type="reset" class="btn-btn">Clear</button>
    </form>
</div>

<?php

// INSERT Data
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    if ($id) {
        $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id='$id'";
    } else {
        $query = "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES('$nim', '$nama', '$jurusan')";
    }

    mysqli_query($conn, $query);
    header('Location: mahasiswa.php');
}
?>



<?php
include_once 'templates/footer.php';
?>