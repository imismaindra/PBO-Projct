<?php
require_once 'model/user_model.php';
require_once 'model/role_model.php';

class UserController
{
    private $userModel;
    private $roleModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        $users = $this->userModel->getUsers();
        include 'views/user_list.php';
    }

    public function insert()
    {
        $roles = $this->roleModel->getRoles();
        include 'views/user_input.php';
    }

    public function add()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';
        $role = $_POST['role'] ?? '';

        if ($username && $password && $email && $role) {
            $this->userModel->addUser($username, $password, $email, $role);
            header('location: index.php?modul=user');
            exit();
        } else {
            echo "Semua field harus diisi!";
        }
    }

    public function edit()
    {
        $Uid = $_GET['user_id'];
        $user = $this->userModel->getUserById($Uid);
        $roles = $this->roleModel->getRoles();
        include 'views/user_edit.php';
    }

    public function update()
    {
        $id = $_POST['id'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';
        $role = $_POST['role'] ?? '';

        if ($id && $username && $password && $email && $role) {
            $this->userModel->updateUser($id, $username, $password, $email, $role);
            header('location: index.php?modul=user');
            exit();
        } else {
            echo "Data tidak lengkap untuk mengupdate user.";
        }
    }

    public function delete()
    {
        $Uid = $_GET['user_id'];
        $this->userModel->deleteUser($Uid);
        header('location: index.php?modul=user');
        exit();
    }
}
