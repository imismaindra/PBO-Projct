<?php
require_once('domain_object/node_user.php');
require_once('model/role_model.php');

class UserModel
{
    private $users = [];
    private $nextId = 1;
    private $roleModel; 

    public function __construct()
    {
        $this->roleModel = new RoleModel();
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = $this->getNextId();
        } else {
            $this->initializeDefaultUser();
        }
    }

    private function getNextId()
    {
        return count($this->users) > 0 ? max(array_column($this->users, 'id')) + 1 : 1;
    }

    public function addUser($username, $password, $email, $role_id)
    {
        if ($this->getUserByName($username)) {
            echo "Username $username sudah digunakan!";
            return false;
        }

        $role = $this->roleModel->getRoleById($role_id);
        if ($role) {
            $user = new User($this->nextId++, $username, password_hash($password, PASSWORD_DEFAULT), $email, $role);
            $this->users[] = $user;
            $this->saveToSession();
            return true;
        } else {
            echo "Role ID $role_id tidak ditemukan!";
            return false;
        }
    }

    public function updateUser($id, $nama, $pw, $email, $role_id)
    {
        foreach ($this->users as $user) {
            if ($user->id == $id) {
                $role = $this->roleModel->getRoleById($role_id);
                if ($role) {
                    $user->username = $nama;
                    $user->password = password_hash($pw, PASSWORD_DEFAULT);
                    $user->email = $email;
                    $user->role = $role;
                    $this->saveToSession();
                    return true;
                } else {
                    echo "Role ID $role_id tidak ditemukan!";
                    return false;
                }
            }
        }
        echo "User ID $id tidak ditemukan!";
        return false;
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

    public function getUserByUsernameAndPassword($username, $password)
    {
        foreach ($this->users as $user) {
            if ($user->username == $username && password_verify($password, $user->password)) {
                return $user;
            }
        }
        return null;
    }

    public function getUsersByRoleId($role_id)
    {
        return array_filter($this->users, function($user) use ($role_id) {
            return $user->role->role_id == $role_id;
        });
    }

    public function deleteUser($id)
    {
        foreach ($this->users as $key => $user) {
            if ($user->id == $id) {
                unset($this->users[$key]);
                $this->users = array_values($this->users); // Reindex array
                $this->saveToSession();
                return true;
            }
        }
        echo "User ID $id tidak ditemukan!";
        return false;
    }

    private function initializeDefaultUser()
    {
        $this->addUser("nnael", "123456789", "nnael@gmail.com", 1);
        $this->addUser("indra", "indra", "indra@gmail.com", 2);
        $this->addUser("hasan", "hasan", "hasan@gmail.com", 3);
    }
}
