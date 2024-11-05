<?php
require_once('domain_object/node_transaksi.php');
require_once('model/transaksi_detail_model.php');

class TransaksiModel{
    private $listTransaksi = [];
    private $nextId = 1;
    private $transaksiDetailModel;
    private $brg;
    private $userModel;
    public function __construct() {
        $this->transaksiDetailModel = new TransaksiDetailModel();
        $this->brg = new Barang_model();
        $this->userModel = new Usermodel();
        if (isset($_SESSION['transaksis'])) {
            $this->listTransaksi = unserialize($_SESSION['transaksis']);
            $this->nextId = count($this->listTransaksi) + 1;
        }else{
            $this->initializeDefaultTransaksi();
        }
    }

    public function addTransaksi($Id_User, $Tanggal_Transaksi, $Status_Transaksi, $detailBarang)
    {
        // $Id_customer = $this->userModel->getUserById($Id_User);
        $Id_customer = is_object($Id_User) ? $Id_User->Id_User : $this->userModel->getUserById($Id_User);

        if($Id_customer == null){
            return false;
        } else {
            $transaksi = new Transaksi($this->nextId++, $Id_customer, $Tanggal_Transaksi, $Status_Transaksi);
    
            foreach ($detailBarang as $detail) {
                $barang = $this->brg->getBarangById($detail['Id_Barang']); 
                if ($barang) {
                    $detailObj = new TransaksiDetail($transaksi->Id_Transaksi, $barang, $detail['Jumlah_Barang'], $detail['Harga_Barang']);
                    $transaksi->DetailBarang[] = $detailObj;
                    $this->transaksiDetailModel->addTransaksiDetail($transaksi->Id_Transaksi, $barang->Id_Barang, $detail['Jumlah_Barang'], $detail['Harga_Barang']);
                }
            }
    
            $this->listTransaksi[] = $transaksi;
            $this->saveToSession();
        }
    }
    
    public function getTransaksiById($Id_Transaksi)
    {
        foreach ($this->listTransaksi as $transaksi) {
            if ($transaksi->Id_Transaksi == $Id_Transaksi) {
                return $transaksi;
            }
        }
        return null;
    }

    public function getAllTransaksi()
    {
        return $this->listTransaksi;
    }

    private function saveToSession()
    {
        $_SESSION['transaksis'] = serialize($this->listTransaksi);
    }
    public function initializeDefaultTransaksi()
    {
        // Data transaksi default
        $Id_User = 1;
        $Tanggal_Transaksi = date('Y-m-d H:i:s');
        $Status_Transaksi = 'completed';

        
        $detailBarang = [
            ['Id_Detail' => 1,'Id_Barang' => 1, 'Jumlah_Barang' => 2, 'Harga_Barang' => 50000],
            ['Id_Detail' => 2,'Id_Barang' => 2, 'Jumlah_Barang' => 1, 'Harga_Barang' => 75000],
        ];
        // $total = 175000;

        $this->addTransaksi($Id_User, $Tanggal_Transaksi, $Status_Transaksi, $detailBarang);
    }

}
?>