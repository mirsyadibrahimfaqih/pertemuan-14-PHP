<?php 
    require_once '../models/dbkoneksi.php';
    require_once 'class_jenis.php';

    // tangkap request element form
    $nama = $_POST['nama'];
    $tombol = $_POST['submit'];

    // Menyimpan data diatas ke sebuah array
    $data = [
        $nama,      // ? 2
    ];

    // proses
    $obj = new Jenis($dbh);
    // $obj->simpan($data);
    switch ($tombol) {
        case 'simpan';
            $obj->simpan($data);
            break;
        case 'ubah';
            $data[] = $_POST['idx']; //tangkap hidden field u/ ? ke-8
            $obj->ubah($data);
            break;
        case 'hapus';
        $id[] = $_POST['idx']; //tangkap ke-1 where id=?
        $obj->hapus($id);
        break;  
        default://tombol batal
        header('Location:http://localhost/Belajar_PHP/p13/crud_1/crud_1/jenis.php?hal=DataBarang');
            break;
    }

    // Landing Page
    header('Location://localhost/Belajar_PHP/p13/crud_1/crud_1/index.php');

?>