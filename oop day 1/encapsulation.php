<?php

class user {
    private $name;
    private $email;
    private $gender;
    private $code;
    private $password;
    private $image;


    public function setPassword($password)
    {

        $this->password = sha1( $password );
        return $this;
    }

    public function setImage($image)
    {
       $this->image = $image;
       return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getImage()
    {
        $path = 'images/users/';
        return $path . $this->image;
    }

      /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function insertUserDB()
    {
        echo "insert user passwrod = $this->password,image= $this->image <br>";
    }

    public function getUserDB()
    {
        echo "userdata : password ".$this->getPassword()." , image : {$this->getImage()} <br>";
    }

  
}

$newUser = new user;
// $newUser->password  = 123456;
// $newUser->image = '1.png';
$newUser->setPassword(123456)->setImage('1.png');
$newUser->insertUserDB();
$newUser->getUserDB();

// echo $newUser->image;