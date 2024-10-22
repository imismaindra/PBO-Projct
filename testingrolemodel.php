<?php
session_start();
session_destroy();
require_once('model/role_model.php');
//testing composite  
$obj_role = new RoleModel;
foreach ($obj_role->getRoles() as $role) {
    echo "Roleid:" . $role->role_id . "<br>";
    echo "RoleName: " . $role->role_name . "<br>";
    echo "Role Deskripsi: " . $role->role_description . "<br>";
    echo "Role Status: " . $role->role_status . "<br>";
    echo "<br>";
}
// add role
echo "== Testing Add new Role".'<br>"';
$obj_role->addRole("new Role","testinh new role",0);
$obj_role->addRole("ver new role","testing new role",1);
foreach ($obj_role->getRoles() as $role) {
    echo "role id: ". $role->role_id . "<br>";
    echo "role name: ". $role->role_name . "<br>";
    echo "role desc: ". $role->role_description . "<br>";
    echo "role status: ". $role->role_status ."<br>";
    echo"<br>";
}
//update role
echo"== Update Role ==",'<br>';
$obj_role->update(1,"update role","role terupdate",1);
foreach ($obj_role->getRoles() as $role) {
    echo "role id: ". $role->role_id . "<br>";
    echo "role name: ". $role->role_name . "<br>";
    echo "role desc: ". $role->role_description . "<br>";
    echo "role status: ". $role->role_status ."<br>";
    echo"<br>";
}

//delte role
echo"== delete Role ==",'<br>';
$obj_role->deleteRole(1);
foreach ($obj_role->getRoles() as $role) {
    echo "role id: ". $role->role_id . "<br>";
    echo "role name: ". $role->role_name . "<br>";
    echo "role desc: ". $role->role_description . "<br>";
    echo "role status: ". $role->role_status ."<br>";
    echo"<br>";
}

// // testing inheritance
// $obj_roleManusia = new RoleModelInheritance("Indra", "35159009585858004");
// $obj_roleManusia->addRole("OB", "bersih2", 1, "Zainul", "35159009585858005");
// foreach ($obj_roleManusia->getRoles() as $role) {
//     $obj_roleManusia->cetak();
//     echo "Role ID: " . $role->role_id . "<br>";
//     echo "Role Name: " . $role->role_name . "<br>";
//     echo "Role Description: " . $role->role_description . "<br>";
//     echo "Role Status: " . $role->role_status . "<br>";
//     echo "<br>";
// }
