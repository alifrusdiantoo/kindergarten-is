<?php 
    include_once '../config/koneksi.php';

    class mapel {
        private $id;
        private $nama;
        private $database;

        public function __construct()
        {
            $this->database = new database();
        }

        public function lihatDataMapel($id){
            if(!empty($id)){
                $query = "SELECT * FROM tb_mapel WHERE id_mapel = '$id'";
                try {
                    return mysqli_query($this->database->koneksi, $query);
                } catch(Exception $e) {
                    echo "Terdapat kesalahan :" . $e->getMessage();
                }
            } else {
                $query = 'SELECT * FROM tb_mapel ORDER BY id_mapel ASC';
    
                try{
                    return mysqli_query($this->database->koneksi, $query);
                }catch (Exception $e){
                    echo "Terdapat kesalahan :" . $e->getMessage();
                }
            }
        }

        public function hapus($id){
            $query = "DELETE FROM tb_mapel WHERE id_mapel = '$id'";
            try {
                mysqli_query($this->database->koneksi, $query);
                echo "<script>
                    alert('Hapus Data Sukses');
                    document.location='?hal=dashboard';
                </script>";
            } catch (Exception $e){
                echo "<script>
                    alert('Terjadi kesalahan pada saat menghapus data. Error: $e');
                    document.location='?hal=dashboard';
                </script>";
            }
        }

        public function tambah($data){
            $this->nama = $data['nama'];

            $query = "INSERT INTO tb_mapel (m_nama) VALUES ('$this->nama')";
            try{
                mysqli_query($this->database->koneksi, $query);
                    echo "<script>
                        alert('Tambah Data Sukses');
                        document.location='?hal=dashboard';
                    </script>";
            } catch (Exception $e){
                echo "<script>
                    alert('Terjadi kesalahan pada saat menambah data. Error: {$e->getMessage()}');
                    document.location='?hal=dashboard';
                </script>";
            }
        }

        public function edit($data, $id){
            $this->nama = $data['nama'];
        
            $query = "UPDATE tb_mapel SET m_nama = '$this->nama' WHERE id_mapel = '$id'";
        
            try {
                mysqli_query($this->database->koneksi, $query);
                echo "<script>
                    alert('Ubah Data Sukses');
                    document.location='?hal=dashboard';
                </script>";
            } catch (Exception $e) {
                echo "<script>
                    alert('Terjadi kesalahan pada saat mengedit data. Error: {$e->getMessage()}');
                    document.location='?hal=dashboard';
                </script>";
            }
        }
        
    }

?>