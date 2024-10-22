<?php
// echo "respone berhail";
// echo "<br>";
// echo "Modul: " . $_GET['modul'] . '<br>';
// echo "Fitur: " . $_GET['fitur'] . '<br>';
// echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . '<br>';
// print_r($_POST);
// echo "<br>";
// echo "nama role : " . $_POST['role_name'] . '<br>';
// echo "keterangan role : " . $_POST['role_description'] . '<br>';
// echo "status role : " . $_POST['role_status'] . '<br>';

require_once('domain_object/node_role.php');

$obj_role = [];
$obj_role[] = new Role(1, $_POST['role_name'], $_POST['role_description'], $_POST['role_status']);
include('views/role_list.php');
?>