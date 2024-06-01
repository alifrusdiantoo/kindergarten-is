<?php 
    // Kelola konten yang ditampilkan
    $halaman = $_GET['hal'];

    if($halaman == 'siswa'){
        if(@$_GET['aksi'] == 'tambah' || @$_GET['aksi'] == 'edit' || @$_GET['aksi'] == 'hapus'){
            include '../view/siswa/halaman-form-siswa.php';
        } else if(@$_GET['aksi'] == 'lihat'){
            include '../view/siswa/info-siswa.php';
        }
        else {
            include '../view/siswa/halaman-siswa.php';
        }
    } else if($halaman == 'nilai'){
        if(@$_GET['aksi'] == 'tambah' || @$_GET['aksi'] == 'edit' || @$_GET['aksi'] == 'hapus'){
            include '../view/nilai/halaman-form-nilai.php';
        } else if(@$_GET['aksi'] == 'info'){
            include '../view/nilai/info-nilai.php';
        } else {
            include '../view/nilai/halaman-nilai.php';
        }
    } else if($halaman == 'dashboard'){
        if(@$_GET['aksi'] == 'tambah' || @$_GET['aksi'] == 'edit' || @$_GET['aksi'] == 'hapus'){
            include '../view/guru/halaman-form-guru.php';
        } else if(@$_GET['aksi'] == 'lihat'){
            include '../view/guru/info-guru.php';
        }else {
            include '../view/admin/dashboard.php';
        }
    } else if($halaman == 'mapel'){
        if(@$_GET['aksi'] == 'tambah' || @$_GET['aksi'] == 'edit' || @$_GET['aksi'] == 'hapus'){
            include '../view/mapel/halaman-form-mapel.php';
        } else {
            include '../view/mapel/halaman-mapel.php';
        }
    } else {
        echo "<script>
            alert('Mau kemana kamu?');
            document.location='../index.php';
        </script>";
    }

?>