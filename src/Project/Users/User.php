<?php
/**
 * Created by PhpStorm.
 * Users: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Users;
class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $admin;
    public function __construct($id, $name, $email, $password, $admin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->admin = $admin;
    }
}