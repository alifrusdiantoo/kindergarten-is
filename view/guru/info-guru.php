<?php 
    include '../lib/guru.php';

    $dataGuru = new guru();
    $dataGuru = $dataGuru->lihatDataGuru($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Biodata Guru - Admin</title>
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
          <p class="">Login Sebagai <span>Guru</span></p>
          <span>-</span>
          <a href="../config/logout.php" class="hover:text-slate-300">Logout</a>
        </div>
      </div>
    </section>
    <!-- END HEADER -->

    <!-- START NILAI SISWA -->
    <section class="w-full">
      <!-- WRAPPER CARD -->
      <div
        class="container w-3/4 bg-lightgrey mx-auto mt-10 mb-3 overflow-hidden shadow-2xl"
      >
        <!-- HEADER CARD -->
        <div class="w-full bg-primary px-[30px] py-3">
          <h1 class="text-white font-extralight text-3xl text-center">Biodata Guru</h1>
        </div>
        <!-- CONTENT -->
        <div class="w-full mt-8 mb-28 px-3">
            <?php
                if(!empty($dataGuru)):
                    foreach ($dataGuru as $data):
                        $nuptk = $data['g_nuptk'];
                        $nama = $data['g_nama'];
                        $alamat = $data['g_alamat'];
                        $telp = $data['g_telp'];
            ?>
          <!-- FOTO PROFIL -->
          <div class="w-full">
            <img src="../content/img/profil/<?= $data['g_foto'] ?>" alt="foto-profil" width="150" class="mx-auto p-3 bg-white">
          </div>
          <!-- BIODATA -->
          <table class="mx-auto w-full flex justify-center mt-10 mb-14 font-light text-lg">
            <tr>
              <td class="pb-3 w-64">NUPTK</td>
              <td class="pb-3">:</td>
              <td class="pb-3 w-64"><?= $nuptk; ?></td>
            </tr>
            <tr>
              <td class="pb-3 w-64">Nama Lengkap</td>
              <td class="pb-3">:</td>
              <td class="pb-3 w-64"><?= $nama; ?></td>
            </tr>
            <tr>
              <td class="pb-3 w-64">Alamat</td>
              <td class="pb-3">:</td>
              <td class="pb-3 w-64"><?= $alamat; ?></td>
            </tr>
            <tr>
              <td class="pb-3 w-64">No. Telepon</td>
              <td class="pb-3">:</td>
              <td class="pb-3 w-64"><?= $telp; ?></td>
            </tr>
            <?php 
                    endforeach;
                endif;
            ?>
          </table>
        </div>
      </div>
      <!-- TOMBOL KEMBALI -->
      <div class="container w-3/4 mx-auto flex justify-end"><a href="?hal=dashboard" class="py-2.5 px-2 mt-4 flex justify-end items-center gap-2 bg-lightgrey rounded-md hover:brightness-75"><img src="../content/img/back.png" class="w-5"><p>Kembali</p></a></div>
    </section>
    <!-- END TAMBAH GURU -->

    

    <!-- START FOOTER -->
    <footer class="w-full py-3 bg-primary px-5 mt-10">
      <h1 class="text-white font-extralight">2024 - KindergartenIS</h1>
    </footer>
    <!-- END FOOTER -->
  </body>
</html>