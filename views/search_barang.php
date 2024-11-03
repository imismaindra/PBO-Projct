<?php
session_start();
require_once('./model/barang_model.php');

if (isset($_GET['nama'])) {
    $nama_barang = $_GET['nama'];
    $barangModel = new Barang_model();
    $results = array_filter($barangModel->getBarangs(), function($barang) use ($nama_barang) {
        return stripos($barang->Nama_Barang, $nama_barang) !== false;
    });
    header('Content-Type: application/json');
    echo json_encode(array_values($results));
    exit; 
}
