<?php 

    include_once 'config/conn.php';
    include_once 'templates/header.php';

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
    
    body {
        background-image: url('assets/bg.jpg');
        background-size: cover;
    }

    .menu {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        width: 400px;
        margin: auto;
        align-items: center;
        height: 100vh;
        z-index: +1;
    }

    .menu a {
        display: inline-block;
        padding: 10px;
        background: #74b9ff;
        color: white;
        text-decoration: none;
        box-shadow: 0px 3px 16px 0px rgba(0,0,0,0.75);
        -webkit-box-shadow: 0px 3px 16px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 3px 16px 0px rgba(0,0,0,0.75);
    }
</style>

<?php 
    include_once 'templates/header_part.php';
?>

<div class="menu">
    <a href="mahasiswa.php">MAHASISWA</a>
    <a href="poin.php">POIN</a>
    <a href="beri_poin.php">BERI POIN</a>
</div>

<?php 
    include_once 'templates/footer.php';
?>