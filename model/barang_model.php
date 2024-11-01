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
        $this->addBarang("Buku", 10000, 100);
        $this->addBarang("Pensil", 50000, 1);
        $this->addBarang("Penggaris", 8000, 10);
    }
    public function addBarang($brgNm, $brgHrg, $brgStok): void
    {
        $barang = new Barang($this->nextid++, $brgNm, $brgStok, $brgHrg);
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
        foreach ($this->barangs as $role) {
            if ($role->role_id == $id) {
                return $role;
            }
            // else {
            //     echo 'Role Id: ' . $id . ' tidak ditemukan!!';
            // }
        }
        return null;
    }
    public function update($id, $brgNm, $brgHrg, $brgStok)
    {
        foreach ($this->barangs as $barang) {
            if ($barang->role_id == $id) {
                $barang->Nama_Barang = $brgNm;
                $barang->Stock_Barang = $brgHrg;
                $barang->Harga_Barang = $brgStok;
                $this->saveToSession();
            }
        }
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
        foreach ($this->barangs as $barang) {
            if ($barang->Nama_Barang == $nama) {
                return $barang;
            }
        }
    }
}
