<?php
require_once 'model/barang_model.php';

class BarangController
{
    private $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $barangs = $this->barangModel->getBarangs();
        include 'views/barang_list.php';
    }

    public function add()
    {
        $Nama_Barang = $_POST['Nama_Barang'] ?? '';
        $Deskripsi_Barang = $_POST['Deskripsi_Barang'] ?? '';
        $Satuan_Barang = $_POST['Satuan_Barang'] ?? '';
        $Kategori_Barang = $_POST['Kategori_Barang'] ?? '';
        $Harga_Barang = $_POST['Harga_Barang'] ?? '';
        $Stok_Barang = $_POST['Stok_Barang'] ?? '';

        if ($Nama_Barang && $Deskripsi_Barang && $Satuan_Barang && $Kategori_Barang && $Harga_Barang && $Stok_Barang) {
            $this->barangModel->addBarang($Nama_Barang, $Deskripsi_Barang, $Satuan_Barang, $Kategori_Barang, $Harga_Barang, $Stok_Barang);
            header('location: index.php?modul=barang');
            exit();
        } else {
            echo "Data tidak lengkap untuk menambahkan barang.";
        }
    }

    public function edit()
    {
        $barang_id = $_GET['Id_Barang'];
        $barang = $this->barangModel->getBarangById($barang_id);
        include 'views/barang_edit.php';
    }

    public function update()
    {
        $Id_Barang = $_POST['Id_Barang'] ?? '';
        $Nama_Barang = $_POST['Nama_Barang'] ?? '';
        $Deskripsi_Barang = $_POST['Deskripsi_Barang'] ?? '';
        $Satuan_Barang = $_POST['Satuan_Barang'] ?? '';
        $Kategori_Barang = $_POST['Kategori_Barang'] ?? '';
        $Harga_Barang = $_POST['Harga_Barang'] ?? '';
        $Stok_Barang = $_POST['Stock_Barang'] ?? '';

        if ($Id_Barang && $Nama_Barang && $Deskripsi_Barang && $Satuan_Barang && $Kategori_Barang && $Harga_Barang && $Stok_Barang) {
            $this->barangModel->updateBarang($Id_Barang, $Nama_Barang, $Deskripsi_Barang, $Satuan_Barang, $Kategori_Barang, $Harga_Barang, $Stok_Barang);
            header('location: index.php?modul=barang');
            exit();
        } else {
            echo "Data tidak lengkap untuk mengupdate barang.";
        }
    }

    public function delete()
    {
        $barang_id = $_GET['Id_Barang'];
        $this->barangModel->deleteBarang($barang_id);
        header('location: index.php?modul=barang');
        exit();
    }
}
