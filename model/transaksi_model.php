<?php
require_once('domain_object/node_transaksi.php');
require_once('model/transaksi_detail_model.php');

class TransaksiModel{
    private $listTransaksi = [];
    private $nextId = 1;
    private $transaksiDetailModel;
    public function __construct() {
        if (isset($_SESSION['transaksis'])) {
            $this->listTransaksi = unserialize($_SESSION['transaksis']);
            $this->nextId = count($this->listTransaksi) + 1;
        }
    }

    public function addTransaksi($Id_User, $Tanggal_Transaksi, $Status_Transaksi, $detailBarang)
    {
        $transaksi = new Transaksi($this->nextId++, $Id_User, $Tanggal_Transaksi, $Status_Transaksi);
        foreach ($detailBarang as $detail) {
            $this->transaksiDetailModel->addTransaksiDetail($transaksi->Id_Transaksi, $detail['Id_Barang'], $detail['Jumlah_Barang'], $detail['Harga_Barang']);
        }
        $this->listTransaksi[] = $transaksi;
        $this->saveToSession();
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
        $_SESSION['transaksi'] = serialize($this->listTransaksi);
    }

}
?>