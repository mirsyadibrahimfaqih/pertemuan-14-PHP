<?php
class Jenis {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function getAllProduk() {
        $sql = "SELECT * FROM produk"; // Specify the columns you want to select
        $rs = $this->dbh->query($sql);
        return $rs;
    }

    public function getAllJenisProduk() {
        $sql = "SELECT * FROM jenis"; // Specify the columns you want to select
        $rs = $this->dbh->query($sql);
        return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO jenis(nama)
                VALUES (?)";
        // prepare statement PDO
        $ps = $this->dbh->prepare($sql); 
        $ps->execute($data);
    }

    public function getJenis($id){
        $sql = "SELECT jenis.*, jenis.nama AS kategori FROM jenis WHERE jenis.id = ?";
        // prepare statement PDO
        $ps = $this->dbh->prepare($sql); 
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function ubah($data){
            $sql = "UPDATE jenis SET nama=? WHERE id=?";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($data);
        }

        public function hapus($id){
            $sql = "DELETE FROM jenis WHERE id=?";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($id);
        }
}
?>