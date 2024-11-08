<?php
require_once('domain_object/node_user.php');
require_once('domain_object/node_barang.php');
require_once('domain_object/node_transaksi.php');
require_once('domain_object/node_transaksi_detail.php');

//buatkan saya model untuk dashboard

class DashboardModel
{
    public $usermodel;
    public $barangmodel;
    public $transaksimodel;

    public function __construct(){

        $this->usermodel = new UserModel();
        $this->barangmodel = new Barang_model();
        $this->transaksimodel = new TransaksiModel();
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
    public function getCountJumlahTransaksi(){
        $transaksis = $this->transaksimodel->getAllTransaksi();
        $total = 0;
        // foreach ($transaksis as $transaksi) {
        //     $;

        // }
        return $total;
    }
    
}

?>