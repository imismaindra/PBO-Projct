<?php
require_once 'model/role_model.php';

class RoleController
{
    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        $roles = $this->roleModel->getRoles();
        include 'views/role_list.php';
    }

    public function add()
    {
        $role_name = $_POST['role_name'] ?? '';
        $role_desc = $_POST['role_description'] ?? '';
        $role_status = $_POST['role_status'] ?? '';

        if ($role_name && $role_desc && $role_status) {
            $this->roleModel->addRole($role_name, $role_desc, $role_status);
            header('location: index.php?modul=role');
            exit();
        } else {
            echo "Data tidak lengkap untuk menambahkan role.";
        }
    }

    public function edit()
    {
        $role_id = $_GET['role_id'];
        $role = $this->roleModel->getRoleById($role_id);
        include 'views/role_edit.php';
    }

    public function update()
    {
        $role_id = $_POST['role_id'] ?? '';
        $role_name = $_POST['role_name'] ?? '';
        $role_desc = $_POST['role_description'] ?? '';
        $role_status = $_POST['role_status'] ?? '';

        if ($role_id && $role_name && $role_desc && $role_status) {
            $this->roleModel->update($role_id, $role_name, $role_desc, $role_status);
            header('location: index.php?modul=role');
            exit();
        } else {
            echo "Data tidak lengkap untuk mengupdate role.";
        }
    }

    public function delete()
    {
        $role_id = $_GET['role_id'];
        if ($role_id) {
            $this->roleModel->deleteRole($role_id);
            header('location: index.php?modul=role');
            exit();
        } else {
            echo "ID role tidak ditemukan.";
        }
    }
}
