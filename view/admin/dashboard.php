<?php 
    include '../lib/guru.php';
    include '../lib/mapel.php';

    $dataGuru = new guru();
    $mapel = new mapel();
    $dataGuru = $dataGuru->lihatDataGuru('');
    $dataMapel = $mapel->lihatDataMapel('');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Admin</title>
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
    <section class="w-full h-[196px] bg-primary text-white shadow-lg">
      <div class="flex flex-wrap">
        <div class="w-4/5 font-bold text-3xl p-5">
          <h1>Selamat Datang, Di Aplikasi Penilaian</h1>
          <h1>KindergartenIS</h1>
        </div>
        <div class="flex justify-between w-1/5 px-3 py-1 font-light h-8">
          <p class="">Login Sebagai <span><?= $type; ?></span></p>
          <span>-</span>
          <a href="../config/logout.php" class="hover:text-slate-300">Logout</a>
        </div>
      </div>
      <!-- TABS BUTTON -->
      <div class="mt-8 pb-1 px-5">
        <div class="bg-white inline-block rounded-md p-1">
          <button
            data-tab-target="#tab1"
            class="w-44 py-2 px-3 text-primary font-semibold rounded-md hover:bg-secondary hover:bg-opacity-50"
          >
            Data Guru
          </button>
          <button
            data-tab-target="#tab2"
            class="w-44 py-2 px-3 text-primary font-semibold rounded-md hover:bg-secondary hover:bg-opacity-50"
          >
            Mata Pelajaran
          </button>
        </div>
      </div>
    </section>
    <!-- END HEADER -->

    <!-- START TAB DATA GURU -->
    <section id="tab1" class="tab-content hidden">
      <!-- TABLE -->
      <div
        class="container bg-lightgrey mx-auto mt-10 mb-3 rounded-md overflow-hidden shadow-2xl"
      >
        <!-- HEADER -->
        <div class="w-full bg-primary px-[30px] py-3">
          <h1 class="text-white font-extralight text-2xl">Data Guru</h1>
        </div>
        <!-- TABLE CONTENT -->
        <div class="w-full px-3 py-14">
          <table class="w-full mx-auto text-center border-collapse">
            <tr class="border-y-2 border-dark">
              <th class="py-3">No</th>
              <th>NUPTK</th>
              <th>Nama Guru</th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th>Action</th>
            </tr>
            <?php
                if(!empty($dataGuru)):
                    $i = 1;
                    foreach ($dataGuru as $data):
                        $nuptk = $data['g_nuptk'];
                        $nama = $data['g_nama'];
                        $alamat = $data['g_alamat'];
                        $telp = $data['g_telp'];
            ?>
            <tr class="border-y-2 border-dark">
              <td><?= $i++; ?></td>
              <td><?= $nuptk; ?></td>
              <td><?= $nama; ?></td>
              <td><?= $alamat; ?></td>
              <td><?= $telp; ?></td>
              <td>
                <div class="flex justify-center gap-4 py-5">
                  <a href="?hal=dashboard&aksi=lihat&id=<?= $data['id_guru'] ?>" class="bg-[#78E36F] p-2 rounded-md hover:brightness-75"><img src="../content/img/lihat.png" alt="icon-lihat" width="25" ></a>
                  <a href="?hal=dashboard&aksi=edit&id=<?= $data['id_guru'] ?>" class="bg-[#7AB5CD] p-2 rounded-md hover:brightness-75"><img src="../content/img/edit.png" alt="icon-edit" width="25"></a>
                  <a href="?hal=dashboard&aksi=hapus&id=<?= $data['id_guru'] ?>" class="bg-[#EF3434] p-2 rounded-md hover:brightness-75"><img src="../content/img/hapus.png" alt="icon-hapus" width="25" onclick="return confirm('Hapus data?')"></a>
                </div>
              </td>
            </tr>
            <?php 
                    endforeach;
                endif;
            ?>
          </table>
        </div>
      </div>
      <!-- TOMBOL TAMBAH DATA GURU -->
      <div class="container mx-auto flex justify-end"><a href="?hal=dashboard&aksi=tambah" class="px-2 mt-4 flex justify-end items-center gap-2 bg-lightgrey rounded-md hover:brightness-75"><p class="text-4xl font-extrabold mb-1">+</p><p>Add Data Guru</p></a></div>
    </section>
    <!-- END TAB DATA GURU -->

    <!-- START TAB MATA PELAJARAN -->
    <section id="tab2" class="tab-content hidden">
      <!-- TABLE -->
      <div
        class="container bg-lightgrey mx-auto mt-10 mb-3 rounded-md overflow-hidden shadow-2xl"
      >
        <!-- HEADER -->
        <div class="w-full bg-primary px-[30px] py-3">
          <h1 class="text-white font-extralight text-2xl">Mata Pelajaran</h1>
        </div>
        <!-- TABLE CONTENT -->
        <div class="w-full px-3 py-14">
          <table class="w-full mx-auto text-center border-collapse">
            <tr class="border-y-2 border-dark">
              <th class="py-3">No</th>
              <th>ID Mata Pelajaran</th>
              <th>Nama Mata Pelajaran</th>
              <th>Action</th>
            </tr>
            <?php
                if(!empty($dataMapel)):
                    $i = 1;
                    foreach ($dataMapel as $data):
                        $id = $data['id_mapel'];
                        $nama = $data['m_nama'];
            ?>
            <tr class="border-y-2 border-dark">
              <td><?= $i++; ?></td>
              <td><?= $id; ?></td>
              <td><?= $nama; ?></td>
              <td>
                <div class="flex justify-center gap-4 py-5">
                  <a href="?hal=mapel&aksi=edit&id=<?= $id ?>" class="bg-[#7AB5CD] p-2 rounded-md hover:brightness-75"><img src="../content/img/edit.png" alt="icon-edit" width="25"></a>
                  <a href="?hal=mapel&aksi=hapus&id=<?= $id ?>" class="bg-[#EF3434] p-2 rounded-md hover:brightness-75"><img src="../content/img/hapus.png" alt="icon-hapus" width="25"></a>
                </div>
              </td>
            </tr>
            <?php 
                    endforeach;
                endif;
                ?>
          </table>
        </div>
      </div>
      <!-- TOMBOL TAMBAH MAPEL -->
      <div class="container mx-auto flex justify-end"><a href="?hal=mapel&aksi=tambah" class="px-2 mt-4 flex justify-end items-center gap-2 bg-lightgrey rounded-md hover:brightness-75"><p class="text-4xl font-extrabold mb-1">+</p><p>Add Mata Pelajaran</p></a></div>
    </section>
    <!-- END TAB MATA PELAJARAN -->

    <!-- START FOOTER -->
    <footer class="w-full py-3 bg-primary px-5 mt-10">
      <h1 class="text-white font-extralight">2024 - KindergartenIS</h1>
    </footer>
    <!-- END FOOTER -->

    <!-- Javascript -->
    <script src="../script/script.js"></script>
  </body>
</html>