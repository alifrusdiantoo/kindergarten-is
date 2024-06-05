<?php 
    include_once '../config/koneksi.php';

    class guru {
        private $nuptk;
        private $nama;
        private $alamat;
        private $telp;
        private $foto;
        private $database;

        public function __construct()
        {
            $this->database = new database();
        }
        
        public function lihatDataGuru($id){
            if(!empty($id)){
                $query = "SELECT * FROM tb_guru WHERE id_guru = '$id'";
                try {
                    $tampil = mysqli_query($this->database->koneksi, $query);
                    return $tampil;
                } catch (Exception $e){
                    echo "Terdapat kesalahan :" . $e->getMessage();
                }
            } else {
                $query = 'SELECT * FROM tb_guru';
                try {
                    $tampil = mysqli_query($this->database->koneksi, $query);
                    return $tampil;
                } catch (Exception $e){
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
                    document.location = '?hal=dashboard';
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
                    document.location = '?hal=dashboard';
                </script>";
                return false;    
            }
        
            // Cek jika ukuran file terlalu besar
            if ($ukuranfile > 2000000) {
                echo "<script>
                    alert('Ukuran file anda terlalu besar!');
                    document.location = '?hal=dashboard';
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
                    document.location = '?hal=dashboard';
                </script>";
                return false;
            }
        }
        

        public function tambah($data){
            $this->nuptk = $data['nuptk'];
            $this->nama = $data['nama'];
            $this->alamat = $data['alamat'];
            $this->telp = $data['telp'];
            $this->foto = $_FILES['foto'];

            if($_FILES['foto']['error'] === 4){
                $foto = $this->foto;
            } else {
                $foto = $this->uploadFoto();
            }

            if($foto){
                $query = "INSERT INTO tb_guru (g_nuptk, g_nama, g_alamat, g_telp, g_foto) VALUES ('$this->nuptk', '$this->nama', '$this->alamat', '$this->telp', '$foto')";

                try{
                    mysqli_query($this->database->koneksi, $query);
                    echo "<script>
                        alert('Data berhasil ditambahkan');
                        document.location = '?hal=dashboard';
                    </script>";
                } catch(Exception $e){
                    echo "<script>
                        alert('Terjadi kesalahan pada saat menambahkan data. Error: $e');
                        document.location = '?hal=dashboard';
                    </script>";
                }
            }
        }

        public function edit($data, $id){
            $this->nuptk = $data['nuptk'];
            $this->nama = $data['nama'];
            $this->alamat = $data['alamat'];
            $this->telp = $data['telp'];

            if($_FILES['foto']['error'] === 4){
				$foto = $data['isi-foto'];
			}else{
				$foto = $this->uploadFoto();
			}

            $query = "UPDATE tb_guru SET g_nama = '$this->nama', g_alamat = '$this->alamat', g_telp = '$this->telp', g_foto = '$foto' WHERE id_guru = '$id'";

            try {
                $hasil = mysqli_query($this->database->koneksi, $query);
                echo "<script>
                    document.location = '?hal=dashboard';
                    alert('Data berhasil diubah');
                </script>";
            } catch(Exception $e) {
                echo "<script>
                    document.location = '?hal=dashboard';
                    alert('Terjadi kesalahan pada saat mengubah data. Error: $e');
                </script>";
            }
        }

        public function hapus($id){
            $query = "DELETE FROM tb_guru WHERE id_guru = '$id'";
            try {
                mysqli_query($this->database->koneksi, $query);
                echo "<script>
                    document.location = '?hal=dashboard';
                    alert('Hapus Data Sukses');
                </script>";
            } catch (Exception $e){
                header('Location:?hal=dashboard');
                echo $e->getMessage();
            }
        }
    }
?>