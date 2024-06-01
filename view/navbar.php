<?php
    session_start();
    //mengatasi jika user langsung masuk menggunakan link tanpa login
    if(empty($_SESSION['id'])) {
        echo "<script>
            alert('Login Terlebih Dahulu !');
            document.location='../index.php';
        </script>";
    }
?>
<!-- Navbar Start -->
<nav>
    <?php 
        if($_SESSION['type'] == 2){
            $type = 'Guru';
        }else if($_SESSION['type'] == 3){
            $type = 'Admin';
        }else{
            $type = 'Orang Tua';
        };
    ?>
</nav>
<!-- Navbar End -->