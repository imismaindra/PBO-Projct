<?php
require_once('domain_object/node_barang.php');
$obj_barang = [];
$obj_barang[] = new Barang(1, "Buku", 50, 10000);
$obj_barang[] = new Barang(2, "Galon", 100, 3500);
$obj_barang[] = new Barang(3, "Pensil", 50, 2000);
include 'views/barang_list.php'
    ?>