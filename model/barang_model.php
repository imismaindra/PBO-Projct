<?php
require_once('domain_object/node_barang.php');

class Barang_model
{
    private $barangs = [];
    private $nextid = 1;

    public function __construct()
    {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextid = count($this->barangs) + 1;
        } else {
            $this->initializeDefaultBarang();
        }
    }

    public function initializeDefaultBarang()
    {
        // Menyediakan data awal untuk barang
        $this->addBarang("Buku", "Buku Tulis", "pcs", "Alat Tulis", 10000, 100);
        $this->addBarang("Pensil", "Pensil 2B", "pcs", "Alat Tulis", 5000, 50);
        $this->addBarang("Penggaris", "Penggaris 30cm", "pcs", "Alat Tulis", 8000, 10);
    }

    public function addBarang($brgNm, $brgDesk, $brgSatuan, $brgCat, $brgHrg, $brgStok): void
    {
        $barang = new Barang($this->nextid++, $brgNm, $brgDesk, $brgSatuan, $brgCat, $brgStok, $brgHrg);
        $this->barangs[] = $barang;
        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['barangs'] = serialize($this->barangs);
    }

    public function getBarangs()
    {
        return $this->barangs;
    }

    public function getBarangById($id)
    {
        foreach ($this->barangs as $barang) {
            if ($barang->Id_Barang == $id) {
                return $barang;
            }
        }
        return null;
    }

    public function updateBarang($id, $brgNm, $brgDesk, $brgSatuan, $brgCat, $brgHrg, $brgStok)
    {
        foreach ($this->barangs as $barang) {
            if ($barang->Id_Barang == $id) {
                $barang->Nama_Barang = $brgNm;
                $barang->Deskripsi_Barang = $brgDesk;
                $barang->Satuan_Barang = $brgSatuan;
                $barang->Kategori_Barang = $brgCat;
                $barang->Harga_Barang = $brgHrg;
                $barang->Stock_Barang = $brgStok;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteBarang($id)
    {
        foreach ($this->barangs as $key => $barang) {
            if ($barang->Id_Barang == $id) {  
                unset($this->barangs[$key]); 
                $this->barangs = array_values($this->barangs); 
                $this->saveToSession();
                return true;
            }
        }
        return false; 
    }

    public function getBarangByName($nama)
    {
        return array_filter($this->barangs, function($barang) use ($nama) {
            return stripos($barang->Nama_Barang, $nama) !== false;
        });
    }

}
?>
