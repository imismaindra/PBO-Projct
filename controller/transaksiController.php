<?php
require_once 'model/transaksi_model.php';
require_once 'model/user_model.php';
require_once 'model/barang_model.php';

class TransaksiController
{
    private $transaksiModel;
    private $userModel;
    private $barangModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->userModel = new UserModel();
        $this->barangModel = new BarangModel();
    }

    public function list()
    {
        $listTransaksis = $this->transaksiModel->getAllTransaksi();
        include 'views/transaksi_list.php';
    }

    public function insert()
    {
        $users = $this->userModel->getUsersByRoleId(2); 
        $barangs = $this->barangModel->getBarangs();
        include 'views/transaksi_input.php';
    }

    public function add()
    {
        $Id_User = $_POST['customer'] ?? '';
        $Tanggal_Transaksi = date('Y-m-d H:i:s');
        $Status_Transaksi = 'completed';
        $Kasir = $_SESSION['username'] ?? 'Guest';
        $detailBarang = [];

        foreach ($_POST['barang'] as $index => $barang_id) {
            if (empty($barang_id)) continue;
            if (array_search($barang_id, array_column($detailBarang, 'Id_Barang')) !== false) continue;
            
            $barang = $this->barangModel->getBarangById($barang_id);
            $Jumlah_Barang = $_POST['jumlah'][$index] ?? 1;
            $Harga_Barang = $barang->Harga_Barang ?? 0;

            if ($barang_id && $Jumlah_Barang && $Harga_Barang) {
                $detailBarang[] = [
                    'Id_Barang' => $barang_id,
                    'Jumlah_Barang' => $Jumlah_Barang,
                    'Harga_Barang' => $Harga_Barang
                ];
            }
        }

        if ($Id_User && $Tanggal_Transaksi && $Status_Transaksi && !empty($detailBarang)) {
            $this->transaksiModel->addTransaksi($Id_User, $Kasir, $Tanggal_Transaksi, $Status_Transaksi, $detailBarang);
            foreach ($detailBarang as $item) {
                $this->barangModel->updateStock($item['Id_Barang'], $item['Jumlah_Barang']);
            }
            header('location: index.php?modul=transaksi&fitur=list');
            exit();
        } else {
            echo "Data tidak lengkap untuk menambahkan transaksi.";
        }
    }
}
