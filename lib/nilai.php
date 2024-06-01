<?php 
    include_once '../config/koneksi.php';

    class nilai {
        private $skor;
        private $ket;
        private $database;

        public function __construct()
        {
            $this->database = new database();
        }

        public function lihatNilai($id){
            if(!empty($id)){
                $query = "SELECT tb_nilai.*, tb_siswa.s_nis, tb_siswa.s_nama, tb_mapel.m_nama FROM tb_nilai, tb_mapel, tb_siswa WHERE tb_nilai.id_nilai = '$id' AND tb_nilai.fk_id_mapel = tb_mapel.id_mapel AND tb_nilai.fk_id_siswa = tb_siswa.id_siswa";
                try{
                    $tampil = mysqli_query($this->database->koneksi, $query);
                    return $tampil;
                } catch (Exception $e){
                    echo "Terdapat kesalahan :" . $e->getMessage();
                }
            } else {
                $query = "SELECT tb_nilai.*, tb_siswa.s_nis, tb_siswa.s_nama, tb_mapel.m_nama FROM tb_nilai, tb_siswa, tb_mapel WHERE tb_nilai.fk_id_siswa = tb_siswa.id_siswa AND tb_nilai.fk_id_mapel = tb_mapel.id_mapel ORDER BY tb_nilai.fk_id_siswa";
                try{
                    $tampil = mysqli_query($this->database->koneksi, $query);
                    return $tampil;
                }catch(Exception $e){
                    echo "Terdapat kesalahan :" . $e->getMessage();
                }
            }
        }

        public function infoNilai($id){
            $query = "SELECT tb_nilai.*, tb_siswa.s_nis, tb_siswa.s_nama, tb_mapel.m_nama FROM tb_nilai, tb_mapel, tb_siswa WHERE tb_siswa.s_tglLahir = '$id' AND tb_nilai.fk_id_mapel = tb_mapel.id_mapel AND tb_nilai.fk_id_siswa = tb_siswa.id_siswa";
            try{
                $tampil = mysqli_query($this->database->koneksi, $query);
                return $tampil;
            } catch (Exception $e){
                echo "Terdapat kesalahan :" . $e->getMessage();
            }
        }

        public function cekSkor($nilai){
            if($nilai < 30){
                return 'D';
            } else if($nilai <= 50){
                return 'C';
            } else if($nilai <= 70){
                return 'B';
            } else {
                return 'A';
            }
        }

        public function edit($data, $id){
            $this->skor = $data['skor'];
            $this->ket = $data['ket'];

            $query = "UPDATE tb_nilai SET n_nilai = '$this->skor', n_ket = '$this->ket' WHERE id_nilai = '$id'";

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
    }

?>