<?php
class Barang
{
    public $Id_Barang;
    public $Nama_Barang;
    public $Harga_Barang;
    public $Jumlah_Barang;
    public function __construct($Id, $Nama_Barang, $Jumlah_Barang, $Harga_Barang)
    {
        $this->Id_Barang = $Id;
        $this->Nama_Barang = $Nama_Barang;
        $this->Harga_Barang = $Harga_Barang;
        $this->Jumlah_Barang = $Jumlah_Barang;
    }
}
?>