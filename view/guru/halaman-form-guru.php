<?php 
    include '../lib/guru.php';

    $guru = new guru();
    @$idGuru = $_GET['id'];
    @$aksi = $_GET['aksi'];

    if($aksi == 'edit'){
        if(isset($idGuru)){
            // Ambil data guru
            $dataGuru = $guru->lihatDataGuru($idGuru);

            if(mysqli_num_rows($dataGuru)){
                // Data guru
                try{
                    $data = mysqli_fetch_assoc($dataGuru);
                    
                    $nuptk = $data['g_nuptk'];
                    $nama = $data['g_nama'];
                    $alamat = $data['g_alamat'];
                    $telp = $data['g_telp'];
                    $foto = $data['g_foto'];
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
        $guru->hapus($idGuru);
    }

    if(isset($_POST['submit'])){
        if($aksi == 'edit'){
            $edit = $guru->edit($_POST, $_GET['id']);
        } else {
            $tambah = $guru->tambah($_POST);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Guru - Admin</title>
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
    <section class="w-full h-[196px] bg-primary text-white">
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
    </section>
    <!-- END HEADER -->

    <!-- START TAMBAH GURU -->
    <section class="w-full">
      <!-- WRAPPER CARD -->
      <div class="container w-3/4 bg-lightgrey mx-auto mt-10 mb-3 rounded-md overflow-hidden shadow-2xl">
        <!-- HEADER CARD -->
        <div class="w-full bg-primary px-[30px] py-3">
          <h1 class="text-white font-extralight text-2xl">Data Guru => <?= $aksi == 'edit' ? 'Edit' : 'Insert'; ?></h1>
        </div>
        <!-- CONTENT -->
        <div class="w-full px-3 py-14">
          <form action="" method="POST" enctype="multipart/form-data" class="w-3/5 relative mx-auto">
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
            <!-- NUPTK -->
            <label for="nuptk" class="block font-bold text-primary text-lg tracking-widest">NUPTK</label>
            <input type="number" id="nuptk" name="nuptk" value="<?=@ $nuptk ?>" placeholder="Masukkan Nomor Induk Pegawai" required class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary" />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- NAMA -->
            <label for="nama" class="block font-bold text-primary text-lg tracking-widest">Nama</label>
            <input type="text" id="nama" name="nama" value="<?=@ $nama ?>" placeholder="Masukkan Nama Guru" required class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary" />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- ALAMAT -->
            <label for="alamat" class="block font-bold text-primary text-lg tracking-widest">Alamat</label>
            <textarea type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required class="w-full h-20 px-3 p-2 -mb-2 rounded-md focus:outline-primary resize-none"><?=@ $alamat ?></textarea>
            <hr class="w-full h-2.5 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- TELEPON -->
            <label for="telp" class="block font-bold text-primary text-lg tracking-widest">Telp</label>
            <input type="text" id="telp" name="telp" value="<?=@ $telp ?>" placeholder="Masukkan nomor telepon" required class="w-full px-3 p-2 -mb-2 rounded-md focus:outline-primary" />
            <hr class="w-full h-4 bg-slate-300 rounded-b-md mb-4 block" />
            <!-- SUBMIT -->
            <input type="submit" value="<?= $aksi == 'edit' ? 'Ubah' : 'Tambah' ?>" name="submit" class="w-full mt-4 bg-primary text-white font-semibold p-2 rounded-md hover:bg-secondary cursor-pointer" />
          </form>
        </div>
      </div>
      <!-- TOMBOL KEMBALI -->
      <div class="container w-3/4 mx-auto flex justify-end">
        <a href="?hal=dashboard" class="py-2.5 px-2 mt-4 flex justify-end items-center gap-2 bg-lightgrey rounded-md hover:brightness-75"
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
    <script>
      // Inisialisasi tampilan input gambar
      const displayImagePreview = (inputElement, previewContainerId) => {
        const file = inputElement.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            const previewContainer = document.getElementById(previewContainerId);
            previewContainer.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-contain rounded-md" />`;
          };
          reader.readAsDataURL(file);
        }
      };

      const originalImageInput = document.getElementById('imageInput');

      if (originalImageInput) {
        originalImageInput.addEventListener('change', () => {
          displayImagePreview(originalImageInput, 'imageInputDisplay');
        });
      }
    </script>
  </body>
</html>