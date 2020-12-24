<?php

include_once 'config/conn.php';
include_once 'templates/header.php';

$query = "SELECT * FROM mahasiswa ORDER BY id DESC";
$getAllMahasiswa = mysqli_query($conn, $query);
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

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


    .tr-head {
        background-color: #00b894;
        color: white;
    }


    .btn-link {
        background-color: #00b894;
        color: white;
        padding: 10px;
        outline: none;
        font-weight: bold;
        display: inline-block;
        text-align: center;
        text-decoration: none;
        border: 1px solid grey;
        border-radius: 5px;
    }

    .btn-link:hover {
        background-color: white;
        color: #00b894;
        border: 1px solid grey;
        border-radius: 5px;
        font-weight: bold;
    }

    .form-control {
        width: 200px;
        height: 30px;
        border: .5px solid #00b894;
        padding: 10px;
        border-radius: 5px;
    }

    .head {
        display: flex;
        justify-content: space-between;
    }
</style>

<?php
include_once 'templates/header_part.php';
?>

<h1 class="heading">Website Poin Pelanggaran</h1>

<div class="display">
    <div class="head">
        <a href="index.php" class="btn-link">Kembali</a>
        <a href="form_mahasiswa.php" class="btn-link">Add Data</a>
    </div>
    <br><br>
    <table border="1" width="100%" cellspacing="0" cellpadding="20">
        <thead>
            <tr class="tr-head">
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php if (mysqli_num_rows($getAllMahasiswa) > 0) : ?>
            <?php while ($data = mysqli_fetch_object($getAllMahasiswa)) : ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $data->nim  ?>
                        </td>
                        <td>
                            <?= $data->nama ?>
                        </td>
                        <td>
                            <?= $data->jurusan ?>
                        </td>
                        <td>
                            <a href="form_mahasiswa.php?id=<?= $data->id ?>" class="btn-link">
                                Edit <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete -->
                            <a href="delete_mahasiswa.php?id=<?= $data->id ?>" onclick="return confirm('yakin akan menghapus <?= $data->nama; ?> ?')" class="btn-link">
                                Hapus <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php endwhile; ?>
        <?php else : ?>
            <tbody>
                <tr>
                    <td colspan="4" align="center">Data No result</td>
                </tr>
            </tbody>
        <?php endif; ?>
    </table>
</div>


<?php
    include_once 'templates/footer.php';
?>