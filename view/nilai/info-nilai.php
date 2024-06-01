<?php 
    include '../lib/nilai.php';

    $nilai = new nilai();
    $dataNilai = $nilai->infoNilai($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laporan Nilai - Orangtua</title>
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
  <!-- START NILAI SISWA -->
  <section class="w-full h-screen mb-64">
    <!-- WRAPPER CARD -->
    <div id="laporan_nilai" class="w-full bg-lightgrey mx-auto overflow-hidden shadow-2xl">
      <!-- HEADER CARD -->
      <div id="header_card" class="w-full bg-primary px-[30px] py-3 text-center">
        <h1 class="text-white font-extralight text-2xl">LAPORAN HASIL BELAJAR</h1>
        <h1 class="text-white font-extralight text-2xl">SISWA PAUD KINDERGARTEN</h1>
      </div>
      <!-- CONTENT -->
      <div class="w-full mt-5 px-5 pb-14">
        <?php
        if(!empty($dataNilai)):
            foreach ($dataNilai as $data):
                $nis = $data['s_nis'];
                $nama = $data['s_nama'];
            endforeach;
        endif;
        ?>
        <!-- IDENTITAS SISWA -->
        <div class="w-full px-5">
          <div class="flex mb-2">
            <p class="w-24">Nama</p>
            <p class="mr-2">:</p>
            <p><?= $nama; ?></p>
          </div>
          <div class="flex mb-2">
            <p class="w-24">No Induk</p>
            <p class="mr-2">:</p>
            <p><?= $nis; ?></p>
          </div>
        </div>
        <!-- TABEL NILAI -->
        <table class="w-full mx-auto text-center border-collapse mt-5">
          <tr class="border-y-2 border-dark">
            <th class="w-28 py-3">No</th>
            <th class="w-48">Mata Pelajaran</th>
            <th class="w-28">Nilai</th>
            <th class="w-28">Skor</th>
            <th class="w-32">Keterangan</th>
          </tr>
            <?php
                if(!empty($dataNilai)):
                    $i = 1;
                    foreach ($dataNilai as $data):
                        $mapel = $data['m_nama'];
                        $skor = $data['n_nilai'];
                        $ket = $data['n_ket'];
            ?>
          <tr class="border-y-2 border-dark">
            <td class="py-7"><?= $i++; ?></td>
            <td><?= $mapel; ?></td>
            <td><?= $skor; ?></td>
            <td><?= $nilai->cekSkor($skor); ?></td>
            <td><?= $ket; ?></td>
          </tr>
            <?php 
                    endforeach;
                endif;
            ?>
        </table>
      </div>
    </div>
    <!-- TOMBOL CETAK dan KEMBALI -->
    <div class="mt-8">
      <div class="mx-5 flex justify-between text-center">
        <a href="?hal=siswa&aksi=lihat" class="w-28 py-2.5 text-center px-4 mt-4 flex justify-center items-center gap-2 bg-lightgrey rounded-md hover:brightness-75">
          <img src="../content/img/back.png" class="w-5 mx-auto bg-blue-200" /><p class="mx-auto">Kembali</p></a>
        <button id="printButton" class="w-28 py-2.5 text-center px-4 mt-4 flex justify-center items-center bg-lightgrey rounded-md hover:brightness-75">
          <img src="../content/img/print.png" class="w-5 mx-auto bg-blue-200" /><p class="mx-auto">Cetak</p></button>
      </div>
    </div>
  </section>
  <!-- END TAMBAH GURU -->

  <!-- START FOOTER -->
  <footer class="w-full py-3 bg-primary px-5 mt-10">
    <h1 class="text-white font-extralight">2024 - KindergartenIS</h1>
  </footer>
  <!-- END FOOTER -->

  <script>
    function printDiv(divId) {
      var divToPrint = document.getElementById(divId);
      var newWin = window.open('', 'Print-Window');
      newWin.document.open();
      newWin.document.write('<html><head><title>Print</title>');
      newWin.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" type="text/css" />');
      newWin.document.write('<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />');
      newWin.document.write('<style>');
      newWin.document.write('body { font-family: "Inter", sans-serif; }');
      newWin.document.write('.border-dark { border-color: #1e293b; }');
      newWin.document.write('.bg-primary { background-color: #3E3D6D; }');
      newWin.document.write('.text-white { color: #1e293b; }');
      newWin.document.write('#header_card { border-bottom: double #1e293b; }');
      newWin.document.write('th { border-top: 1px solid #1e293b; }');
      newWin.document.write('tr { border-bottom: 1px solid #1e293b; }');
      newWin.document.write('</style></head><body onload="window.print()"><div>');
      newWin.document.write(divToPrint.innerHTML);
      newWin.document.write('</div></body></html>');
      newWin.document.close();
      setTimeout(function() { newWin.close(); }, 10);
    }

    document.getElementById('printButton').addEventListener('click', function() {
      printDiv('laporan_nilai');
    });
  </script>
</body>
</html>
