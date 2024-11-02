<?php
class TransaksiDetail
{
    public $Id_Barang;
    public $Jumlah_Barang;
    public $Harga_Barang;
    public $Total_Harga;

    public function __construct($Id_Barang, $Jumlah_Barang, $Harga_Barang)
    {
        $this->Id_Barang = $Id_Barang;
        $this->Jumlah_Barang = $Jumlah_Barang;
        $this->Harga_Barang = $Harga_Barang;
        $this->Total_Harga = $Jumlah_Barang * $Harga_Barang;
    }
}
?>
