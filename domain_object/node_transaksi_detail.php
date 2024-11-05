<?php
class TransaksiDetail
{
    public $Id_Detail;
    public $Id_Barang;
    public $Jumlah_Barang;
    public $Harga_Barang;
    public $Total_Harga;

    public function __construct($Id_Detail,$Id_Barang, $Jumlah_Barang, $Harga_Barang)
    {   
        $this->Id_Detail = $Id_Detail;
        $this->Id_Barang = $Id_Barang;
        $this->Jumlah_Barang = $Jumlah_Barang;
        $this->Harga_Barang = $Harga_Barang;
        $this->Total_Harga = is_numeric($Jumlah_Barang) && is_numeric($Harga_Barang) 
        ? $Jumlah_Barang * $Harga_Barang 
        : 0;
    }
}
?>
