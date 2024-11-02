<?php
require_once 'model/role_model.php';
require_once 'model/user_model.php';
require_once 'model/barang_model.php';
require_once 'model/transaksi_model.php';

session_start();

$modul = isset($_GET['modul']) ? $_GET['modul'] : 'dashboard';

switch ($modul) {
    case 'dashboard':
        include 'views/kosong.php';
        break;

    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_role = new RoleModel();

        switch ($fitur) {
            case 'add':
                $role_name = $_POST['role_name'] ?? '';
                $role_desc = $_POST['role_description'] ?? '';
                $role_status = $_POST['role_status'] ?? '';

                if ($role_name && $role_desc && $role_status) {
                    $obj_role->addRole($role_name, $role_desc, $role_status);
                }
                header('location: index.php?modul=role');
                break;

            case 'edit':
                $role_id = $_GET['role_id'];
                $role = $obj_role->getRoleById($role_id);
                include 'views/role_edit.php';
                break;

            case 'update':
                $role_id = $_POST['role_id'] ?? '';
                $role_name = $_POST['role_name'] ?? '';
                $role_desc = $_POST['role_description'] ?? '';
                $role_status = $_POST['role_status'] ?? '';

                if ($role_id && $role_name && $role_desc && $role_status) {
                    $obj_role->update($role_id, $role_name, $role_desc, $role_status);
                }
                header('location: index.php?modul=role');
                break;

            case 'delete':
                $role_id = $_GET['role_id'];
                $obj_role->deleteRole($role_id);
                header('location: index.php?modul=role');
                break;

            default:
                $roles = $obj_role->getRoles();
                include 'views/role_list.php';
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
        $obj_barang = new Barang_model();

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
                // echo "Id Barang : " . $Id_Barang . "<br>";
                // echo "Barang : " . $Nama_Barang . "<br>";
                // echo "Deskripsi : " . $Deskripsi_Barang . "<br>";
                // echo "Satuan : " . $Satuan_Barang . "<br>";
                // echo "Kategori : " . $Kategori_Barang . "<br>";
                // echo "Harga : " . $Harga_Barang . "<br>";
                // echo "Stok : " . $Stok_Barang . "<br>";

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
        $fitur =  isset($_GET['fitur'])? $_GET['fitur'] : null;
        $obj_barang = new Barang_model();

        switch ($fitur) {
            case 'list':
                $transaksis = $obj_transaksi->getTransaksis();
        }
    default:
        include 'views/kosong.php';
        break;
}
?>
