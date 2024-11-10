<?php
require_once 'model/role_model.php';
require_once 'model/user_model.php';
require_once 'model/barang_model.php';
require_once 'model/transaksi_model.php';
require_once 'controller/roleController.php';
session_start();
if (isset($_GET['modul']) && $_GET['modul'] === 'login') {
    // Verifikasi login
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userModel = new UserModel();
        $user = $userModel->getUserByUsernameAndPassword($username, $password);

        if ($user) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role_id'] = $user->role->role_name;
            header('Location: index.php'); // Redirect ke dashboard atau modul lain
            exit();
        } else {
            echo "Username atau password salah!";
        }
    }
} else if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: views/login.php'); // Redirect jika belum login
    exit();
}

$modul = isset($_GET['modul']) ? $_GET['modul'] : 'dashboard';

switch ($modul) {
    case 'login':
        require_once 'views/login.php';

        break;
    case 'dashboard':
        include 'views/kosong.php';
        break;

        case 'role':
            $roleController = new RoleController();
            $fitur = $_GET['fitur'] ?? 'index';
        
            switch ($fitur) {
                case 'add':
                    $roleController->add();
                    break;
                case 'edit':
                    $roleController->edit();
                    break;
                case 'update':
                    $roleController->update();
                    break;
                case 'delete':
                    $roleController->delete();
                    break;
                default:
                    $roleController->index();
                    break;
            }
        
        break;

    case 'user':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_user = new UserModel();

        switch ($fitur) {
            case 'insert':
                $roleModel = new RoleModel();
                $roles = $roleModel->getRoles();
                include 'views/user_input.php';
                break;

            case 'add':
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $email = $_POST['email'] ?? '';
                $role = $_POST['role'] ?? '';

                if ($username && $password && $email && $role) {
                    $obj_user->addUser($username, $password, $email, $role);
                    header('location:index.php?modul=user');
                } else {
                    echo "Semua field harus diisi!";
                }
                break;

            case 'edit':
                $Uid = $_GET['user_id'];
                $user = $obj_user->getUserById($Uid);
                $roleModel = new RoleModel();
                $roles = $roleModel->getRoles();
                include 'views/user_edit.php';
                break;

            case 'update':
                $id = $_POST['id'] ?? '';
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $email = $_POST['email'] ?? '';
                $role = $_POST['role'] ?? '';

                if ($id && $username && $password && $email && $role) {
                    $obj_user->updateUser($id, $username, $password, $email, $role);
                }
                header('location: index.php?modul=user');
                break;

            case 'delete':
                $Uid = $_GET['user_id'];
                $obj_user->deleteUser($Uid);
                header('location: index.php?modul=user');
                break;

            default:
                $users = $obj_user->getUsers();
                include 'views/user_list.php';
                break;
        }
        break;

    case 'barang':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_barang = new BarangModel();

        switch ($fitur) {
            case 'add':
                $Nama_Barang = $_POST['Nama_Barang'] ?? '';
                $Deskripsi_Barang = $_POST['Deskripsi_Barang'] ?? '';
                $Satuan_Barang = $_POST['Satuan_Barang'] ?? '';
                $Kategori_Barang = $_POST['Kategori_Barang'] ?? '';
                $Harga_Barang = $_POST['Harga_Barang'] ?? '';
                $Stok_Barang = $_POST['Stok_Barang'] ?? '';

                if ($Nama_Barang && $Deskripsi_Barang && $Satuan_Barang && $Kategori_Barang && $Harga_Barang && $Stok_Barang) {
                    $obj_barang->addBarang($Nama_Barang, $Deskripsi_Barang, $Satuan_Barang, $Kategori_Barang, $Harga_Barang, $Stok_Barang);
                }
                header('location: index.php?modul=barang');
                break;

            case 'edit':
                $barang_id = $_GET['Id_Barang'];
                $barang = $obj_barang->getBarangById($barang_id);
                include 'views/barang_edit.php';
                break;

            case 'update':
                $Id_Barang = $_POST['Id_Barang'] ?? '';
                $Nama_Barang = $_POST['Nama_Barang'] ?? '';
                $Deskripsi_Barang = $_POST['Deskripsi_Barang'] ?? '';
                $Satuan_Barang = $_POST['Satuan_Barang'] ?? '';
                $Kategori_Barang = $_POST['Kategori_Barang'] ?? '';
                $Harga_Barang = $_POST['Harga_Barang'] ?? '';
                $Stok_Barang = $_POST['Stock_Barang'] ?? '';
                echo "Id Barang : " . $Id_Barang . "<br>";
                echo "Barang : " . $Nama_Barang . "<br>";
                echo "Deskripsi : " . $Deskripsi_Barang . "<br>";
                echo "Satuan : " . $Satuan_Barang . "<br>";
                echo "Kategori : " . $Kategori_Barang . "<br>";
                echo "Harga : " . $Harga_Barang . "<br>";
                echo "Stok : " . $Stok_Barang . "<br>";

                if ($Id_Barang && $Nama_Barang && $Deskripsi_Barang && $Satuan_Barang && $Kategori_Barang && $Harga_Barang && $Stok_Barang) {
                    $obj_barang->updateBarang($Id_Barang, $Nama_Barang, $Deskripsi_Barang, $Satuan_Barang, $Kategori_Barang, $Harga_Barang, $Stok_Barang);
                    // var_dump($obj_barang->updateBarang($Id_Barang, $Nama_Barang, $Deskripsi_Barang, $Satuan_Barang, $Kategori_Barang, $Harga_Barang, $Stok_Barang));
                }else{
                    echo "Data tidak lengkap";
                }
                header('location: index.php?modul=barang');
                break;

            case 'delete':
                $barang_id = $_GET['Id_Barang'];
                $obj_barang->deleteBarang($barang_id);
                header('location: index.php?modul=barang');
                break;

            default:
                $barangs = $obj_barang->getBarangs();
                include 'views/barang_list.php';
                break;
        }
        break;
    case 'transaksi':
        $fitur = isset($_GET['fitur'])? $_GET['fitur'] : null;
        $obj_transaksi = new TransaksiModel();
        $obj_user = new UserModel();
        $obj_barang = new BarangModel();
        switch ($fitur) {
            case 'list':
                $listTransaksis = $obj_transaksi->getAllTransaksi();
                include 'views/transaksi_list.php';
                break;
            case 'insert':
                $userModel = new UserModel();
                $users = $userModel->getUsersByRoleId(2); 
                $barangModel = new BarangModel();
                $barangs = $barangModel->getBarangs();

                include 'views/transaksi_input.php';
                break;
            case 'add':
                $barangModel = new BarangModel();
                // $Id_User = $obj_user->getUserById($_POST['customer']);
                $Id_User = $_POST['customer'];
                $Tanggal_Transaksi = date('Y-m-d H:i:s'); 
                $Status_Transaksi = 'completed'; 
                $detailBarang = [];
                $Kasir = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';


                foreach ($_POST['barang'] as $index => $barang_id) {
                    if (empty($barang_id)) continue; 
                    if (array_search($barang_id, array_column($detailBarang, 'Id_Barang')) !== false) {
                        continue; 
                    }
                    $barang = $barangModel->getBarangById($barang_id);
                    $Jumlah_Barang = $_POST['jumlah'][$index] ?? 1; 
                    $Harga_Barang = $barang->Harga_Barang ?? 0;
                    
                    if ($barang_id && $Jumlah_Barang && $Harga_Barang) {
                        $detailBarang[] = [
                            'Id_Barang' => $barang_id,
                            'Jumlah_Barang' => $Jumlah_Barang,
                            'Harga_Barang' => $Harga_Barang
                        ];
                    }
                }                
                // echo "<pre>";
                //     print_r($Id_User);
                //     print_r($detailBarang);
                // echo "</pre>";

                if ($Id_User && $Tanggal_Transaksi && $Status_Transaksi && !empty($detailBarang)) {
                    $obj_transaksi->addTransaksi($Id_User,$Kasir, $Tanggal_Transaksi, $Status_Transaksi, $detailBarang);
                    header('location: index.php?modul=transaksi&fitur=list');
                    exit;
                } else {
                    echo "Data tidak lengkap untuk menambahkan transaksi.";
                }
                break;
            default:
                include 'views/notfound.php';
                break;
        }
        break;
    default:
        $dashboard = new DashboardModel();
        include 'views/kosong.php';
        break;
}
?>
