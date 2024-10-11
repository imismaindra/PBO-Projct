<?php
require_once('domain_object/node_role.php');

$obj_role = [];
// $obj_role[] = new Role(1, "Kasir", "Dibua untuk kasir", 1);
// $obj_role[] = new Role(2, "Admin", "Dibua untuk Admin", 1);
// $obj_role[] = new Role(3, "Owner", "Dibua untuk Owner", 0);
// $obj_role[] = new Role(4, "Customer", "Dibua untuk Customer", 1);


// foreach($obj_role as $role){
//     echo "Id Role : ".$role->role_id."<br>";
//     echo "Nama Role : ".$role->role_name."<br>";
//     echo "Deskirpsi Role : ".$role->role_description."<br>";
//     echo "Status Role : ".$role->role_status."<br>";
// }

include 'views/role_list.php';
?>