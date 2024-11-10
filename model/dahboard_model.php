<?php 
require_once('domain_object/node_user.php');
require_once('domain_object/node_barang.php');
require_once('domain_object/node_transaksi.php');
require_once('domain_object/node_transaksi_detail.php');

class DashboardModel
{
    public $usermodel;
    public $barangmodel;
    public $transaksimodel;
    public $transaksiDetailModel;

    public function __construct(){
        $this->usermodel = new UserModel();
        $this->barangmodel = new BarangModel();
        $this->transaksimodel = new TransaksiModel();
        $this->transaksiDetailModel = new TransaksiDetailModel(); // Tambahkan model TransaksiDetailModel
    }

    public function getCountUsers(){
        return count($this->usermodel->getUsers());
    }

    public function getCountBarangs(){
        return count($this->barangmodel->getBarangs());
    }

    public function getCountTransaksi(){
        return count($this->transaksimodel->getAllTransaksi());
    }

    // Menghitung total harga semua detail transaksi
    public function getTotalHargaTransaksi(){
        $total = 0;
        $details = $this->transaksiDetailModel->getTransaksiDetails();

        foreach ($details as $detail) {
            $total += $detail->Jumlah_Barang * $detail->Harga_Barang;
        }

        return $total;
    }
}


?>