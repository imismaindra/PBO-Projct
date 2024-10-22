<?php
require_once 'model/role_model.php';
session_start();
if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch ($modul) {
    case 'dashboard':
        include 'views/kosong.php';
        break;
    case 'role';
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_role = new RoleModel();
        echo $fitur;
        switch ($fitur) {
            case 'add':
                $role_name = $_POST['role_name'];
                $role_desc =  $_POST['role_description'];
                $role_status =  $_POST['role_status'];

                $obj_role->addRole($role_name, $role_desc, $role_status);

                header('location: index.php?modul=role');
                break;

            default:
                $roles = $obj_role->getRoles();
                include 'views/role_list.php';
                break;
        }


        break;

    default:
        # code...
        break;
}
