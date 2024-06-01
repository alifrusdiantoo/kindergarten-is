<?php 
    include '../lib/mapel.php';

    $mapel = new mapel();
    @$idMapel = $_GET['id'];
    $aksi = $_GET['aksi'];

    if(isset($aksi)){
        if($aksi == 'edit'){
            if(isset($idMapel)){
                // Ambil data mapel
                $dataMapel = $mapel->lihatDataMapel($idMapel);

                if(mysqli_num_rows($dataMapel)){
                    // Data mapel
                    try{
                        $data = mysqli_fetch_assoc($dataMapel);

                        $id = $data['id_mapel'];
                        $nama = $data['m_nama'];
                    } catch (Exception $e){
                        echo "
                        <script>
                            alert('Data Tidak Ditemukan. Error : $e');
                        </script>
                        ";
                    }
                }
            }

        } else if($aksi == 'hapus'){
            $mapel->hapus($idMapel);
        }
    }


    if(isset($_POST['submit'])){
        if($aksi == 'edit'){
            $edit = $mapel->edit($_POST, $_GET['id']);
        } else {
            $tambah = $mapel->tambah($_POST);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Mapel - Admin</title>
    <link rel="shortcut icon" href="../content/img/icon.png" type="image/x-icon" />
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              lightgrey: "#E5EAF6",
              dark: "#1e293b",
              primary: "#3E3D6D",
              secondary: "#929EBC",
            },
            fontFamily: {
              inter: ["Inter", "sans-serif"],
            },
          },
        },
      };
    </script>
  </head>
  <body class="font-inter text-dark bg-white">
    <!-- START HEADER -->
    <section class="w-full  h-[196px] bg-primary text-white">
      <div class="flex flex-wrap">
        <div class="w-4/5 font-bold text-3xl p-5">
          <h1>Selamat Datang, Di Aplikasi Penilaian</h1>
          <h1>KindergartenIS</h1>
        </div>
        <div class="flex justify-between w-1/5 px-3 py-1 font-light h-8">
          <p class="">Login Sebagai <span><?= $type; ?></span></p>
          <span>-</span>
          <a href="" class="hover:text-slate-300">Logout</a>
        </div>
      </div>
    </section>
    <!-- END HEADER -->

    <!-- START TAMBAH GURU -->
    <section class="w-full">
      <!-- WRAPPER CARD -->
      <div
        class="container w-3/5 bg-lightgrey mx-auto mt-10 mb-3 rounded-md overflow-hidden shadow-2xl"
      >
        <!-- HEADER CARD -->
        <div class="w-full bg-primary px-[30px] py-3">
          <h1 class="text-white font-extralight text-2xl">Mata Pelajaran => <?= $aksi == 'edit' ? 'Edit' : 'Insert'; ?></h1>
        </div>
        <!-- CONTENT -->
        <div class="w-full px-3 py-14">
          <form action="" method="POST" class="w-3/5 mx-auto">
            <!-- ID MAPEL -->
            <label for="id" class="block font-bold text-primary text-lg tracking-wide">ID Mata Pelajaran</label>
            <input type="number" id="id" name="id" value="<?=@ $id ?>" placeholder="ID akan dibuat secara otomatis" class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary">
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block">
            <!-- NAMA -->
            <label for="nama" class="block font-bold text-primary text-lg tracking-wide">Nama Mata Pelajaran</label>
            <input type="text" id="nama" name="nama" value="<?=@ $nama ?>" placeholder="Masukkan nama mapel" required class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary">
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block">
            <!-- SUBMIT -->
            <input type="submit" value="<?= $aksi == 'edit' ? 'Edit' : 'Tambah'; ?>" name="submit" class="w-full mt-4 bg-primary text-white font-semibold p-2 rounded-md hover:bg-secondary cursor-pointer">
          </form>
        </div>
      </div>
      <!-- TOMBOL KEMBALI -->
      <div class="container w-3/5 mx-auto flex justify-end"><a href="?hal=dashboard" class="py-2.5 px-2 mt-4 flex justify-end items-center gap-2 bg-lightgrey rounded-md hover:brightness-75"><img src="../content/img/back.png" class="w-5"><p>Kembali</p></a></div>
    </section>
    <!-- END TAMBAH GURU -->

    

    <!-- START FOOTER -->
    <footer class="w-full py-3 bg-primary px-5 mt-10">
      <h1 class="text-white font-extralight">2024 - KindergartenIS</h1>
    </footer>
    <!-- END FOOTER -->
  </body>
</html>