<?php
class Transaksi
{
    public $Id_Transaksi;
    public $kasir;
    public $Id_User;
    public $Tanggal_Transaksi;
    public $Status_Transaksi;
    public $DetailBarang; // Array of TransaksiDetail objects
    // public $Total_Transaksi;

    public function __construct($Id_Transaksi, $kasir,$Id_User, $Tanggal_Transaksi, $Status_Transaksi)
    {   
        $this->kasir = $kasir;
        $this->Id_Transaksi = $Id_Transaksi;
        $this->Id_User = $Id_User;
        $this->Tanggal_Transaksi = $Tanggal_Transaksi;
        $this->Status_Transaksi = $Status_Transaksi;
        $this->DetailBarang = []; // Initialize as an empty array
        // $this->Total_Transaksi = $Total_Transaksi;
    }

    public function tambahDetailBarang($transaksiDetail)
    {
        $this->DetailBarang[] = $transaksiDetail;
    }
}
