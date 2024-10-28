<?php
class User
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $role;

    public function ___construct($id, $uname, $pw, $email, $role)
    {
        $this->id = $id;
        $this->username = $uname;
        $this->password = $pw;
        $this->email = $email;
        $this->role = $role;
    }
};
