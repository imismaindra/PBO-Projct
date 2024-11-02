<?php
require_once('domain_object/node_transaksi_detail.php');

class TransaksiDetailModel {

    private $transaksiDetails = [];
    private $nextId = 1;
    public function __construct() {
        if (isset($_SESSION['transaksiDetails'])) {
            $this->transaksiDetails = unserialize($_SESSION['transaksiDetails']);
            $this->nextId = count($this->transaksiDetails) + 1;
        }
    }

    public function addTransaksiDetail( $Id_Transaksi, $Id_Barang, $Jumlah_Barang, $Harga_Barang) {
        $transaksiDetail = new TransaksiDetail($Id_Transaksi, $Id_Barang, $Jumlah_Barang, $Harga_Barang);
        $this->transaksiDetails[] = $transaksiDetail;
        $this->saveToSession();
    }
    
    private function saveToSession()
    {
        $_SESSION['transaksiDetails'] = serialize($this->transaksiDetails);
    }

    
    public function getTransaksiDetailById($Id_Transaksi) {
        $details = [];
        foreach ($this->transaksiDetails as $detail) {
            if ($detail->Id_Transaksi == $Id_Transaksi) {
                $details[] = $detail;
            }
        }
        return $details;

    }
    
    public function getTransaksiDetails() {
        return $this->transaksiDetails;
    }
}
?>