<?php
require_once('domain_object/node_role.php');
// class Manusias
// {
//     public $nama;
//     public $nik;
//     public function __construct($nama, $nik)
//     {
//         $this->nama = $nama;
//         $this->nik = $nik;
//     }

//     public function cetak()
//     {
//         echo 'Nama: ' . $this->nama . '<br>';
//         echo 'NIK' . $this->nik . '<br>';
//     }
// }
// class Users
// {
//     public $manusia;
//     public $email;
//     public $password;
//     public $status;

//     public function __construct($nama, $nik, $email, $password, $status)
//     {
//         $this->manusia = new Manusia($nama, $nik);
//         $this->manusia->nama = $nama;
//         $this->manusia->nik = $nik;
//         $this->email = $email;
//         $this->password = $password;
//         $this->status = $status;
//     }
//     public function cetakUser()
//     {
//         $this->manusia->cetak();
//         echo 'email: ' . $this->email . "<br>";
//         echo 'pasword: ' . $this->password . "<br>";
//         echo 'status: ' . $this->status . "<br>";
//     }
// }

// class RoleModelInheritance extends Manusia
// {
//     public $roles = [];
//     public $nextid = 1;
//     public function __construct($nama, $nik)
//     {
//         parent::__construct($nama, $nik);
//         if (isset($_SESSION['roles'])) {
//             // Ambil data roles dari session
//             $this->roles = unserialize($_SESSION['roles']);
//             // Set nextid berdasarkan jumlah role yang ada
//             $this->nextid = count($this->roles) + 1;
//         } else {
//             // Jika session belum ada, inisialisasi role default
//             $this->initializeDefaultRole();
//         }
//     }
//     public function initializeDefaultRole()
//     {
//         $this->addRole("Admin", "Administartion", 1);
//         $this->addRole("User", "Customer", 1);
//         $this->addRole("Kasir", "Pembayaran", 0);
//     }

//     public function addRole($roleNm, $roleDsc, $roleSts)
//     {
//         $role = new Role($this->nextid++, $roleNm, $roleDsc, $roleSts);
//         $this->roles[] = $role;
//         $this->saveToSession();
//     }
//     private function saveToSession()
//     {
//         $_SESSION['roles'] = serialize($this->roles);
//     }
//     public function getRoles()
//     {
//         return $this->roles;
//     }
// }

class RoleModel
{
    private $roles = [];
    private $nextid = 1;
    public function __construct()
    {
        if (isset($_SESSION['roles'])) {
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextid = $this->getNextId();
        } else {
            $this->initializeDefaultRole();
        }
    }
    private function getNextId()
    {
        return !empty($this->roles) ? max(array_column($this->roles, 'role_id')) + 1 : 1;
    }
    public function initializeDefaultRole()
    {
        $this->addRole("Admin", "Administartion", 1);
        $this->addRole("User", "Customer", 1);
        $this->addRole("Kasir", "Pembayaran", 1);
    }
    public function addRole($roleNm, $roleDsc, $roleSts)
    {
        $role = new Role($this->nextid++, $roleNm, $roleDsc, $roleSts);
        $this->roles[] = $role;
        $this->saveToSession();
    }
    private function saveToSession()
    {
        $_SESSION['roles'] = serialize($this->roles);
    }
    public function getRoles()
    {
        return $this->roles;
    }
    public function getRoleById($id)
    {
        foreach ($this->roles as $role) {
            if ($role->role_id == $id) {
                return $role;
            }
        }
        return null;
    }
    public function update($id, $nama, $desc, $status)
    {
        foreach ($this->roles as $role) {
            if ($role->role_id == $id) {
                $role->role_name = $nama;
                $role->role_description = $desc;
                $role->role_status = $status;
                $this->saveToSession();
            }
        }
    }
    public function deleteRole($id)
    {
        foreach ($this->roles as $key => $role) {
            if ($role->role_id == $id) {
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles);
                $this->saveToSession();
                return true;
            }
        }
    }
    public function getRoleByName($nama)
    {
        foreach ($this->roles as $role) {
            if ($role->role_name == $nama) {
                return $role;
            }
        }
    }
}

// class Aggregation
// {
//     private $manusiaList = [];
//     private $userList = [];

//     public function addManusia($nama, $nik)
//     {
//         $manusia = new Manusia($nama, $nik);
//         $this->manusiaList[] = $manusia;
//     }

//     public function addUser($nama, $nik, $email, $password, $status)
//     {
//         $user = new User($nama, $nik, $email, $password, $status);
//         $this->userList[] = $user;
//     }

//     public function cetakSemuaManusia()
//     {
//         foreach ($this->manusiaList as $manusia) {
//             $manusia->cetak();
//             echo "<br>";
//         }
//     }

//     public function cetakSemuaUser()
//     {
//         foreach ($this->userList as $user) {
//             $user->cetakUser();
//             echo "<br>";
//         }
//     }
// }
