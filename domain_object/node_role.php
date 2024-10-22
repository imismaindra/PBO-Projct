<?php
class Role
{
   public $role_id;
   public $role_name;
   public $role_description;
   public $role_status;

   function __construct($id, $name, $desc, $sts)
   {
      $this->role_id = $id;
      $this->role_name = $name;
      $this->role_description = $desc;
      $this->role_status = $sts;

   }
}

?>