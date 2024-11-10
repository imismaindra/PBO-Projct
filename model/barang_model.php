<?php
require_once('domain_object/node_barang.php');

class BarangModel
{
    private $barangs = [];
    private $nextId = 1;

    public function __construct()
    {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = $this->getNextId();
        } else {
            $this->initializeDefaultBarang();
        }
    }

    private function getNextId()
    {
        return !empty($this->barangs) ? max(array_column($this->barangs, 'Id_Barang')) + 1 : 1;
    }

    public function initializeDefaultBarang()
    {
        // Menyediakan data awal untuk barang
        $this->addBarang("Buku", "Buku Tulis", "pcs", "Alat Tulis", 10000, 100);
        $this->addBarang("Pensil", "Pensil 2B", "pcs", "Alat Tulis", 5000, 50);
        $this->addBarang("Penggaris", "Penggaris 30cm", "pcs", "Alat Tulis", 8000, 10);
    }

    public function addBarang($nama, $deskripsi, $satuan, $kategori, $harga, $stok): void
    {
        // Validasi harga dan stok untuk mencegah input yang tidak valid
        if ($harga < 0 || $stok < 0) {
            throw new InvalidArgumentException("Harga dan stok harus bernilai positif.");
        }

        $barang = new Barang($this->nextId++, $nama, $deskripsi, $satuan, $kategori, $stok, $harga);
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

    public function updateBarang($id, $nama, $deskripsi, $satuan, $kategori, $harga, $stok)
    {
        if ($harga < 0 || $stok < 0) {
            throw new InvalidArgumentException("Harga dan stok harus bernilai positif.");
        }

        foreach ($this->barangs as $barang) {
            if ($barang->Id_Barang == $id) {
                $barang->Nama_Barang = $nama;
                $barang->Deskripsi_Barang = $deskripsi;
                $barang->Satuan_Barang = $satuan;
                $barang->Kategori_Barang = $kategori;
                $barang->Harga_Barang = $harga;
                $barang->Stock_Barang = $stok;
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
                $this->barangs = array_values($this->barangs); // Reset indeks array
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getBarangByName($nama)
    {
        return array_filter($this->barangs, function ($barang) use ($nama) {
            return stripos($barang->Nama_Barang, $nama) !== false;
        });
    }
}
?>
