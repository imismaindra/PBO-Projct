<?php
 require_once('domain_object/node_user.php');
 require_once('model/role_model.php');
 require_once('domain_object/node_user.php');

class UserModel
{
    private $users = [];
    private $nextId = 1;
    private $roleModel; 


    public function __construct()
    {
        $this->roleModel =  new RoleModel();
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        }else{
            $this->initializeDefaultUser();
        }
    }

    public function addUser($username, $password, $email, $role_id)
    {
        $role = $this->roleModel->getRoleById($role_id);
        if ($role) {
            $user = new User($this->nextId++, $username, $password, $email, $role);
            $this->users[] = $user;
            $this->saveToSession();
        } else {
            echo "Role ID $role_id tidak ditemukan!";
        }
    }
    public function updateUser($id, $nama, $pw, $email, $role_id)
    {
        foreach ($this->users as $user) {
            if ($user->id == $id) {
                $role = $this->roleModel->getRoleById($role_id);
                if ($role) {
                    $user->username = $nama;
                    $user->password = password_hash($pw, PASSWORD_DEFAULT); // Hash password
                    $user->email = $email;
                    $user->role = $role;
                    $this->saveToSession();
                    return true; // Indicate success
                } else {
                    echo "Role ID $role_id tidak ditemukan!";
                    return false; // Role not found
                }
            }
        }
        return false; // User not found
    }

    private function saveToSession()
    {
        $_SESSION['users'] = serialize($this->users);
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function getUserById($id)
    {
        foreach ($this->users as $user) {
            if ($user->id == $id) {
                return $user;
            }
        }
        return null;
    }
    public function getUserByName($uname)
    {
        foreach ($this->users as $user) {
            if ($user->username == $uname) {
                return $user;
            }
        }
        return null;
    }
    public function deleteUser($id)
    {
        foreach ($this->users as $key => $user) {
            if ($user->id == $id) {
                unset($this->users[$key]);
                $this->users = array_values($this->users);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    public function initializeDefaultUser()
    {
        $this->addUser("nnael", "123456789", "nnael@gmail.com",1);
    }
}
