<?php 
    include '../lib/siswa.php';
    include '../lib/nilai.php';

    $siswa = new siswa();
    $nilai = new nilai();

    $dataSiswa = $siswa->lihatDataSiswa('');
    $dataNilai = $nilai->lihatNilai('');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Guru</title>
    <link rel="shortcut icon" href="../content/img/icon.png" type="image/x-icon" />
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              lightgrey: '#E5EAF6',
              dark: '#1e293b',
              primary: '#3E3D6D',
              secondary: '#929EBC',
            },
            fontFamily: {
              inter: ['Inter', 'sans-serif'],
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
          <button data-tab-target="#tab1" class="w-44 py-2 px-3 text-primary font-semibold rounded-md hover:bg-secondary hover:bg-opacity-50">Data Siswa</button>
          <button data-tab-target="#tab2" class="w-44 py-2 px-3 text-primary font-semibold rounded-md hover:bg-secondary hover:bg-opacity-50">Nilai Siswa</button>
        </div>
      </div>
    </section>
    <!-- END HEADER -->

    <!-- START TAB DATA SISWA -->
    <section id="tab1" class="tab-content hidden">
      <!-- CARD WRAPPER -->
      <div class="container bg-lightgrey mx-auto mt-10 mb-3 rounded-md overflow-hidden shadow-2xl">
        <!-- HEADER -->
        <div class="w-full bg-primary px-[30px] py-3">
          <h1 class="text-white font-extralight text-2xl">Data Siswa</h1>
        </div>
        <!-- TABLE CONTENT -->
        <div class="w-full px-3 py-14">
          <table class="w-full mx-auto text-center border-collapse">
            <tr class="border-y-2 border-dark">
              <th class="py-3">No</th>
              <th class="w-32">NIS</th>
              <th class="w-32">Nama</th>
              <th class="w-48">TTL</th>
              <th class="w-28">Jenis Kelamin</th>
              <th class="w-48">Alamat</th>
              <th class="w-32">Nama Ayah</th>
              <th class="w-32">Nama Ibu</th>
              <th class="w-56">Action</th>
            </tr>
            <?php
                if(!empty($dataSiswa)):
                    $i = 1;
                    foreach ($dataSiswa as $data):
                        $nis = $data['s_nis'];
                        $nama = $data['s_nama'];
                        $tmptLahir = $data['s_tmptLahir'];
                        $tglLahir = $data['s_tglLahir'];
                        $jk = $data['s_jk'];
                        $alamat = $data['s_alamat'];
                        $ayah = $data['s_ayah'];
                        $ibu = $data['s_ibu'];
                        $telp = $data['s_telp'];
            ?>
            <tr class="border-y-2 border-dark">
              <td><?= $i++; ?></td>
              <td><?= $nis; ?></td>
              <td><?= $nama; ?></td>
              <td><?= $tmptLahir . ', ' . $tglLahir; ?></td>
              <td><?= $jk; ?></td>
              <td><?= $alamat; ?></td>
              <td><?= $ayah; ?></td>
              <td><?= $ibu; ?></td>
              <td>
                <div class="flex justify-center gap-4 py-5">
                  <a href="?hal=siswa&aksi=lihat&id=<?= $data['id_siswa'] ?>" class="bg-[#78E36F] p-2 rounded-md hover:brightness-75"><img src="../content/img/lihat.png" alt="icon-lihat" width="25" /></a>
                  <a href="?hal=siswa&aksi=edit&id=<?= $data['id_siswa'] ?>" class="bg-[#7AB5CD] p-2 rounded-md hover:brightness-75"><img src="../content/img/edit.png" alt="icon-edit" width="25" /></a>
                  <a href="?hal=siswa&aksi=hapus&id=<?= $data['id_siswa'] ?>" class="bg-[#EF3434] p-2 rounded-md hover:brightness-75"><img src="../content/img/hapus.png" onclick="return confirm('Hapus data?');" alt="icon-hapus" width="25" /></a>
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
      <!-- TOMBOL TAMBAH DATA SISWA -->
      <div class="container mx-auto flex justify-end">
        <a href="?hal=siswa&aksi=tambah&id=<?= $data['id_siswa'] ?>" class="px-2 mt-4 flex justify-end items-center gap-2 bg-lightgrey rounded-md hover:brightness-75"
          ><p class="text-4xl font-extrabold mb-1">+</p>
          <p>Add Data Siswa</p></a
        >
      </div>
    </section>
    <!-- END TAB DATA SISWA -->

    <!-- START TAB NILAI SISWA -->
    <section id="tab2" class="tab-content hidden">
      <!-- CARD WRAPPER -->
      <div class="container bg-lightgrey mx-auto mt-10 mb-3 rounded-md overflow-hidden shadow-2xl">
        <!-- HEADER -->
        <div class="w-full bg-primary px-[30px] py-3">
          <h1 class="text-white font-extralight text-2xl">Nilai Siswa</h1>
        </div>
        <!-- TABLE CONTENT -->
        <div class="w-full px-3 py-14">
          <table class="w-full mx-auto text-center border-collapse">
            <tr class="border-y-2 border-dark">
              <th class="py-3">No</th>
              <th class="w-48">NIS</th>
              <th class="w-48">Nama</th>
              <th class="w-72">Mata Pelajaran</th>
              <th class="w-32">Nilai</th>
              <th class="w-32">Skor</th>
              <th class="w-36">Keterangan</th>
              <th class="w-72">Action</th>
            </tr>
            <?php
                if(!empty($dataNilai)):
                    $i = 1;
                    foreach ($dataNilai as $data):
                        $nis = $data['s_nis'];
                        $nama = $data['s_nama'];
                        $mapel = $data['m_nama'];
                        $skor = $data['n_nilai'];
                        $ket = $data['n_ket'];
            ?>
            <tr class="border-y-2 border-dark">
              <td><?= $i++; ?></td>
              <td><?= $nis; ?></td>
              <td><?= $nama; ?></td>
              <td><?= $mapel; ?></td>
              <td><?= $skor; ?></td>
              <td><?= $nilai->cekSkor($skor); ?></td>
              <td><?= $ket; ?></td>
              <td>
                <div class="flex justify-center gap-4 py-5">
                  <a href="?hal=nilai&aksi=edit&id=<?= $data['id_nilai'] ?>" class="bg-[#7AB5CD] p-2 rounded-md hover:brightness-75"><img src="../content/img/edit.png" alt="icon-edit" width="25" /></a>
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
    </section>
    <!-- END TAB NILAI SISWA -->

    <!-- START FOOTER -->
    <footer class="w-full py-3 bg-primary px-5 mt-10">
      <h1 class="text-white font-extralight">2024 - KindergartenIS</h1>
    </footer>
    <!-- END FOOTER -->

    <!-- Javascript -->
    <script src="../script/script.js"></script>
  </body>
</html>