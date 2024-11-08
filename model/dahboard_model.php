<?php
require_once('domain_object/node_user.php');
require_once('domain_object/node_barang.php');
require_once('domain_object/node_transaksi.php');
require_once('domain_object/node_transaksi_detail.php');

//buatkan saya model untuk dashboard

class DashboardModel
{
    public $usermodel;
    public $barangmodel;

    public function __construct(){

        $this->usermodel = new UserModel();
        $this->barangmodel = new Barang_model();
    }

    public function getCountUsers(){
        return count($this->usermodel->getUsers());
    }
    public function getCountBarangs(){
        return count($this->barangmodel->getBarangs());
    }

    
}

?>