<?php
    class database{
        public $host = "localhost";
        public $user = "root";
        public $password = "";
        public $database = "si_paud";
        public $koneksi;

        public function __construct()
        {
            try {
                $this->koneksi = mysqli_connect($this->host, $this->user, $this->password, $this->database);
            } catch (Exception $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
?>