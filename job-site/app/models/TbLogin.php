<?php

use Phalcon\Mvc\Model;

class TbLogin extends Model
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $user_email;

    /**
     * @var integer
     */
    private $password;

    /**
     * @var integer
     */
    private $auth_user;
    
    public function initialize()
    {
        $this->setSource('tb_login');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->user_email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAuthUser()
    {
        return $this->auth_user;
    }
}
?>