<?php 
    include_once '../config/koneksi.php';

    class siswa {
        private $guru;
        private $nis;
        private $nama;
        private $tmpLahir;
        private $tglLahir;
        private $jk;
        private $alamat;
        private $foto;
        private $ayah;
        private $ibu;
        private $telp;
        private $database;

        public function __construct()
        {
            $this->database = new database();
        }

        public function lihatDataSiswa($id){
            if(!empty($id)){
                $query = "SELECT tb_siswa.* FROM tb_siswa WHERE tb_siswa.id_siswa = '$id' OR tb_siswa.s_tglLahir = '$id' OR fk_id_guru = '$id'";
                try{
                    $tampil = mysqli_query($this->database->koneksi, $query);
                    return $tampil;
                } catch (Exception $e){
                    echo "Terdapat kesalahan :" . $e->getMessage();
                }
            } else {

                $query = "SELECT tb_siswa.* FROM tb_siswa";
                try{
                    $tampil = mysqli_query($this->database->koneksi, $query);
                    return $tampil;
                }catch(Exception $e){
                    echo "Terdapat kesalahan :" . $e->getMessage();
                }
            }
        }

        public function uploadFoto() {
            // Deklarasikan variabel kebutuhan
            $namafile = $_FILES['foto']['name'];
            $ukuranfile = $_FILES['foto']['size'];
            $error = $_FILES['foto']['error'];
            $tmpname = $_FILES['foto']['tmp_name'];
        
            // Cek apakah ada error saat upload
            if ($error !== UPLOAD_ERR_OK) {
                echo "<script>
                    alert('Terjadi kesalahan saat mengunggah file!');
                    document.location = '?hal=siswa';
                </script>";
                return false;
            }
        
            // Cek apakah yang diupload adalah file gambar
            $eksfilevalid = ['jpg', 'jpeg', 'png'];
            $eksfile = explode('.', $namafile); 
            $eksfile = strtolower(end($eksfile));
        
            if (!in_array($eksfile, $eksfilevalid)) {
                echo "<script>
                    alert('Yang anda upload bukan gambar!');
                    document.location = '?hal=siswa';
                </script>";
                return false;    
            }
        
            // Cek jika ukuran file terlalu besar
            if ($ukuranfile > 2000000) {
                echo "<script>
                    alert('Ukuran file anda terlalu besar!');
                    document.location = '?hal=siswa';
                </script>";
                return false;
            }
        
            // Jika lolos pengecekan, file siap diupload
            // Generate nama file baru

            date_default_timezone_set('Asia/Jakarta');
            $namafilebaru = 'IMG-' . date("ymjhis");
            $namafilebaru .= '.';
            $namafilebaru .= $eksfile;
        
            // Tentukan path untuk menyimpan file
            $path = '..' . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'profil' . DIRECTORY_SEPARATOR . $namafilebaru;
        
            // Pindahkan file ke lokasi yang ditentukan
            if (move_uploaded_file($tmpname, $path)) {
                return $namafilebaru;
            } else {
                echo "<script>
                    alert('Gagal mengunggah file!');
                    document.location = '?hal=siswa';
                </script>";
                return false;
            }
        }

        public function tambah($data){
            $this->guru = $data['guru'];
            $this->nis = $data['nis'];
            $this->nama = $data['nama'];
            $this->alamat = $data['alamat'];
            $this->tmpLahir = $data['tmpLahir'];
            $this->tglLahir = $data['tglLahir'];
            $this->jk = $data['jk'];
            $this->alamat = $data['alamat'];
            $this->ayah = $data['ayah'];
            $this->ibu = $data['ibu'];
            $this->telp = $data['telp'];
            $this->foto = $_FILES['foto'];

            // Panggil fungsi upload foto
            $foto = $this->uploadFoto();

            if($foto){
                $query = "INSERT INTO tb_siswa VALUES ('', '$this->guru', '$this->nis', '$this->nama', '$this->tmpLahir', '$this->tglLahir', '$this->jk', '$this->alamat', '$foto', '$this->ayah', '$this->ibu', '$this->telp')";

                if(mysqli_query($this->database->koneksi, $query)){
                echo "<script>
                    alert('Data berhasil ditambahkan');
                    document.location = '?hal=siswa';
                </script>";
                } else {
                    echo "<script>
                        alert('Terjadi kesalahan pada saat menambahkan data');
                        document.location = '?hal=siswa';
                    </script>";
                }
            }
        }

        public function edit($data, $id){
            $this->guru = $data['guru'];
            $this->nis = $data['nis'];
            $this->nama = $data['nama'];
            $this->tmpLahir = $data['tmpLahir'];
            $this->tglLahir = $data['tglLahir'];
            $this->jk = $data['jk'];
            $this->alamat = $data['alamat'];
            $this->ayah = $data['ayah'];
            $this->ibu = $data['ibu'];
            $this->telp = $data['telp'];

            if($_FILES['foto']['error'] === 4){
				$foto = $data['isi-foto'];
			}else{
				$foto = $this->uploadFoto();
			}

            $query = "UPDATE tb_siswa SET
                fk_id_guru = '$this->guru',
                s_nis = '$this->nis',
                s_nama = '$this->nama',
                s_tmptLahir = '$this->tmpLahir',
                s_tglLahir = '$this->tglLahir',
                s_jk = '$this->jk',
                s_alamat = '$this->alamat',
                s_foto = '$foto',
                s_ayah = '$this->ayah',
                s_ibu = '$this->ibu',
                s_telp = '$this->telp'
                WHERE id_siswa = '$id'
            ";

            try {
                mysqli_query($this->database->koneksi, $query);
                echo "<script>
                    document.location = '?hal=siswa';
                    alert('Data berhasil diubah');
                </script>";
            } catch(Exception $e) {
                echo "<script>
                    document.location = '?hal=siswa';
                    alert('Terjadi kesalahan pada saat mengubah data. Error: $e');
                </script>";
            }
        }

        public function hapus($id){
            $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id'";
            try {
                mysqli_query($this->database->koneksi, $query);
                echo "<script>
                    alert('Hapus Data Sukses');
                    document.location='?hal=siswa';
                </script>";
            } catch (Exception $e){
                echo "<script>
                    alert('Terjadi kesalahan pada saat menghapus data. Error: $e');
                    document.location='?hal=siswa';
                </script>";
            }
        }

    }
?>