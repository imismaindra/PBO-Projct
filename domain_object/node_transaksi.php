<?php
class Transaksi
{
    public $Id_Transaksi;
    public $Id_User;
    public $Tanggal_Transaksi;
    public $Status_Transaksi;
    public $DetailBarang; // Array of TransaksiDetail objects

    public function __construct($Id_Transaksi, $Id_User, $Tanggal_Transaksi, $Status_Transaksi)
    {
        $this->Id_Transaksi = $Id_Transaksi;
        $this->Id_User = $Id_User;
        $this->Tanggal_Transaksi = $Tanggal_Transaksi;
        $this->Status_Transaksi = $Status_Transaksi;
        $this->DetailBarang = []; // Initialize as an empty array
    }

    public function tambahDetailBarang($transaksiDetail)
    {
        $this->DetailBarang[] = $transaksiDetail;
    }
}
