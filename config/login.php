<?php 
    session_start();
    include 'koneksi.php';
    $koneksi = new database();

    @$username = mysqli_escape_string($koneksi->koneksi, $_POST['username']);
    @$password = mysqli_escape_string($koneksi->koneksi, $_POST['password']);

    // Cek apakah akun terdaftar sebagai superadmin
    $login = mysqli_query($koneksi->koneksi, "SELECT tb_akun.* FROM tb_akun, tb_siswa WHERE `username`='$username' AND `password`= '$password' ");
    $data = mysqli_fetch_array($login);

    if($data) {
        $_SESSION['id'] = $data['password'];
        $_SESSION['type'] = $data['level'];

        echo "<script>
            alert('Login berhasil. Selamat datang!');
        </script>";

        if($data['level'] == 1){
            echo "<script>document.location = '../controller/menu.php?hal=siswa&aksi=lihat';</script>";
        } else if($data['level'] == 2){
            echo "<script>document.location = '../controller/menu.php?hal=siswa';</script>";
        } else if($data['level'] == 3){
            echo "<script>document.location = '../controller/menu.php?hal=dashboard';</script>";
        }
    } else {
        echo "<script>
            alert('Login gagal. Username atau password salah!');
            document.location = '../login.php';
        </script>";
    }
?>