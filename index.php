<?php
require_once 'model/role_model.php';
require_once 'controller/roleController.php';
require_once 'controller/userController.php';
require_once 'controller/barangController.php';
require_once 'controller/transaksiController.php';

session_start();
if (isset($_GET['modul']) && $_GET['modul'] === 'login') {
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
            $userController = new UserController();
            $fitur = $_GET['fitur'] ?? 'index';
            switch ($fitur) {
                case 'insert': $userController->insert(); break;
                case 'add': $userController->add(); break;
                case 'edit': $userController->edit(); break;
                case 'update': $userController->update(); break;
                case 'delete': $userController->delete(); break;
                default: $userController->index(); break;
            }
            break;
    
        case 'barang':
            $barangController = new BarangController();
            $fitur = $_GET['fitur'] ?? 'index';
            switch ($fitur) {
                case 'add': $barangController->add(); break;
                case 'edit': $barangController->edit(); break;
                case 'update': $barangController->update(); break;
                case 'delete': $barangController->delete(); break;
                default: $barangController->index(); break;
            }
            break;
    
        case 'transaksi':
            $transaksiController = new TransaksiController();
            $fitur = $_GET['fitur'] ?? 'list';
            switch ($fitur) {
                case 'insert': $transaksiController->insert(); break;
                case 'add': $transaksiController->add(); break;
                default: $transaksiController->list(); break;
            }
            break;
        
    default:
        $dashboard = new DashboardModel();
        include 'views/kosong.php';
        break;
}
?>
