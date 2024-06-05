<?php
    include '../lib/siswa.php';
    include '../lib/guru.php';

    $siswa = new siswa();
    $guru = new guru();
    @$idSiswa = $_GET['id'];
    $aksi = $_GET['aksi'];

    // Ambil data guru
    $dataGuru = $guru->lihatDataGuru('');

    if(isset($aksi)){
        if($aksi == 'edit'){
            if(isset($idSiswa)){
                // Ambil data siswa
                $dataSiswa = $siswa->lihatDataSiswa($idSiswa);

                if(mysqli_num_rows($dataSiswa)){
                    // Data guru
                    try{
                        $data = mysqli_fetch_assoc($dataSiswa);

                        $nis = $data['s_nis'];
                        $nama = $data['s_nama'];
                        $tmpLahir = $data['s_tmptLahir'];
                        $tglLahir = $data['s_tglLahir'];
                        $jk = $data['s_jk'];
                        $alamat = $data['s_alamat'];
                        $foto = $data['s_foto'];
                        $ayah = $data['s_ayah'];
                        $ibu = $data['s_ibu'];
                        $telp = $data['s_telp'];
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
            $siswa->hapus($idSiswa);
        }
    }

    if(isset($_POST['submit'])){
        if($aksi == 'edit'){
            $edit = $siswa->edit($_POST, $_GET['id']);
        } else {
            $tambah = $siswa->tambah($_POST);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Siswa - Guru</title>
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
    <section class="w-full h-[196px] bg-primary text-white">
      <div class="flex flex-wrap">
        <div class="w-4/5 font-bold text-3xl p-5">
          <h1>Selamat Datang, Di Aplikasi Penilaian</h1>
          <h1>KindergartenIS</h1>
        </div>
        <div class="flex justify-between w-1/5 px-3 py-1 font-light h-8">
          <p class="">Login Sebagai <span><?= $type; ?></span></p>
          <span>-</span>
          <a href="login.html" class="hover:text-slate-300">Logout</a>
        </div>
      </div>
    </section>
    <!-- END HEADER -->

    <!-- START TAMBAH SISWA -->
    <section class="w-full">
      <!-- WRAPPER CARD -->
      <div
        class="container w-3/4 bg-lightgrey mx-auto mt-10 mb-3 rounded-md overflow-hidden shadow-2xl"
      >
        <!-- HEADER CARD -->
        <div class="w-full bg-primary px-[30px] py-3">
          <h1 class="text-white font-extralight text-2xl">
            Data Siswa => <?= $aksi == 'edit' ? 'Edit' : 'Insert'; ?>
          </h1>
        </div>
        <!-- CONTENT -->
        <div class="w-full px-3 py-14">
          <form action="" method="POST" enctype="multipart/form-data" class="w-3/5 mx-auto relative">
            <!-- Anak Didik -->
            <label for="guru" class="block font-bold text-primary text-lg tracking-wide">Anak Didik</label>
            <select name="guru" id="guru" required class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary">
                <?php foreach ($dataGuru as $data): ?>
                    <option value="<?=@ $data['id_guru'] ?>"><?=@ $data['g_nama'] ?></option>
                <?php endforeach; ?>
            </select>
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- INPUT IMAGE -->
            <label class="block font-bold text-primary text-lg tracking-widest"> Foto Profil </label>
            <input type="text" name="isi-foto" value="<?=@ $foto?>" hidden>
            <label for="inputImage" id="drop-area" class="block font-bold text-primary text-lg tracking-widest">
              <input class="absolute w-full h-48 z-10 opacity-0 cursor-pointer" type="file" id="inputImage" name="foto" accept="image/*" <?= $aksi == 'edit' ? '' : 'required' ?> hidden/>
              <div id="img-view" class="flex justify-center items-center w-full h-48 border-2 border-dashed border-primary rounded-lg bg-contain bg-center bg-no-repeat bg-slate-50 mb-7">
                <div class="text-center">
                  <img
                    class="mb-3 block mx-auto"
                    src="../content/img/image-icon.png"
                    width="50"
                    alt="icon"
                  />
                  <p class="font-semibold">
                    Drag and drop or click here to upload image
                  </p>
                  <p class="font-light">Upload any images from device</p>
                </div>
              </div>
            </label>
            <!-- NIS -->
            <label
              for="nis"
              class="block font-bold text-primary text-lg tracking-wide"
              >NIS</label
            >
            <input
              type="number"
              id="nis"
              name="nis"
              value="<?=@ $nis; ?>"
              placeholder="Masukkan Nomor Induk Siswa"
              required
              class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary"
            />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- NAMA -->
            <label
              for="nama"
              class="block font-bold text-primary text-lg tracking-wide"
              >Nama</label
            >
            <input
              type="text"
              id="nama"
              name="nama"
              value="<?=@ $nama; ?>"
              placeholder="Masukkan Nama Siswa"
              required
              class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary"
            />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- Tempat Lahir -->
            <label
              for="tmpLahir"
              class="block font-bold text-primary text-lg tracking-wide"
              >Tempat Lahir</label
            >
            <input
              type="text"
              id="tmpLahir"
              name="tmpLahir"
              value="<?=@ $tmpLahir; ?>"
              placeholder="Masukkan Kota Kelahiran"
              required
              class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary"
            />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- Tanggal Lahir -->
            <label
              for="tglLahir"
              class="block font-bold text-primary text-lg tracking-wide"
              >Tanggal Lahir</label
            >
            <input
              type="date"
              id="tglLahir"
              name="tglLahir"
              value="<?=@ $tglLahir; ?>"
              required
              class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary cursor-pointer"
            />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- Jenis Kelamin -->
            <label
              for="jk"
              class="block font-bold text-primary text-lg tracking-wide"
              >Jenis Kelamin</label
            >
            <select
              name="jk"
              id="jk"
              required
              class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary"
            >
              <option
                value="L"
                <?=@ $jk = 'L' ? 'selected' : '' ?>
                class="px-3 p-2 -mb-2 rounded-md focus:outline-primary"
              >
                Laki-laki
              </option>
              <option
                value="P"
                <?=@ $jk = 'P' ? 'selected' : '' ?>
                class="px-3 p-2 -mb-2 rounded-md focus:outline-primary"
              >
                Perempuan
              </option>
            </select>
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- ALAMAT -->
            <label
              for="alamat"
              class="block font-bold text-primary text-lg tracking-wide"
              >Alamat</label
            >
            <textarea
              type="text"
              id="alamat"
              name="alamat"
              placeholder="Masukkan Alamat"
              required
              class="w-full h-20 px-3 p-2 -mb-2 rounded-md focus:outline-primary resize-none"
            ><?=@ $alamat; ?></textarea>
            <hr class="w-full h-2.5 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- NAMA AYAH -->
            <label
              for="ayah"
              class="block font-bold text-primary text-lg tracking-wide"
              >Nama Ayah</label
            >
            <input
              type="text"
              id="ayah"
              name="ayah"
              value="<?=@ $ayah; ?>"
              placeholder="Masukkan Nama Ayah"
              required
              class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary"
            />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- NAMA IBU -->
            <label
              for="ibu"
              class="block font-bold text-primary text-lg tracking-wide"
              >Nama Ibu</label
            >
            <input
              type="text"
              id="ibu"
              name="ibu"
              value="<?=@ $ibu; ?>"
              placeholder="Masukkan Nama Ibu"
              required
              class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary"
            />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- NO TELEPON -->
            <label
              for="telp"
              class="block font-bold text-primary text-lg tracking-wide"
              >No. Telepon</label
            >
            <input
              type="text"
              id="telp"
              name="telp"
              value="<?=@ $telp; ?>"
              placeholder="Masukkan Nomor Telepon"
              required
              class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary"
            />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- SUBMIT -->
            <input
              type="submit"
              value="<?= $aksi == 'edit' ? 'Ubah' : 'Tambah' ?>"
              name="submit"
              class="w-full mt-4 bg-primary text-white font-semibold p-2 rounded-md hover:bg-secondary cursor-pointer"
            />
          </form>
        </div>
      </div>
      <!-- TOMBOL KEMBALI -->
      <div class="container w-3/4 mx-auto flex justify-end">
        <a
          href="?hal=siswa"
          class="py-2.5 px-2 mt-4 flex justify-end items-center gap-2 bg-lightgrey rounded-md hover:brightness-75"
          ><img src="../content/img/back.png" class="w-5" />
          <p>Kembali</p></a
        >
      </div>
    </section>
    <!-- END TAMBAH GURU -->

    <!-- START FOOTER -->
    <footer class="w-full py-3 bg-primary px-5 mt-10">
      <h1 class="text-white font-extralight">2024 - KindergartenIS</h1>
    </footer>
    <!-- END FOOTER -->
    <script src="../script/image-upload.js"></script>
  </body>
</html>