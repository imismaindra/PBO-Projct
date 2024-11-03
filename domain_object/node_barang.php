<?php
class Barang
{
    public $Id_Barang;
    public $Nama_Barang;
    public $Deskripsi_Barang;
    public $Satuan_Barang;
    public $Kategori_Barang;
    public $Harga_Barang;
    public $Stock_Barang;
    public function __construct($Id, $Nama_Barang, $Deskripsi_Barang,$Satuan_Barang,$Kategori_Barang ,$Stock_Barang, $Harga_Barang)
    {
        $this->Id_Barang = $Id;
        $this->Nama_Barang = $Nama_Barang;
        $this->Deskripsi_Barang = $Deskripsi_Barang;
        $this->Satuan_Barang = $Satuan_Barang;
        $this->Kategori_Barang = $Kategori_Barang;
        $this->Harga_Barang = $Harga_Barang;
        $this->Stock_Barang = $Stock_Barang;
    }
}
?>