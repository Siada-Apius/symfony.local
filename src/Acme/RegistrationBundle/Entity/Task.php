<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 09.07.13
 * Time: 19:12
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\RegistrationBundle\Entity;

class Task
{
    protected $name;

    protected $password;

    protected $email;

    protected $dueDate;

    protected $role;


    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }


    public function getPassword(){

        return $this->password;
    }
    public function setPassword($password){

        return $this->pass = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->name = $email;
    }


    public function getDueDate()
    {
        return $this->dueDate;
    }
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }

    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
}