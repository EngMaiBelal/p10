<?php
include_once __DIR__."\../database\databaseConnection.php";
include_once __DIR__."\../database\operation.php";
class User extends databaseConnection implements operation {
    private $id;
    private $first_name;
    private $last_name;
    private $phone;
    private $email;
    private $password;
    private $gender;
    private $birthdate;
    private $email_verified_at;
    private $remember_token;
    private $code;
    private $image;
    private $created_at;
    private $updated_at;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of remember_token
     */ 
    public function getRemember_token()
    {
        return $this->remember_token;
    }

    /**
     * Set the value of remember_token
     *
     * @return  self
     */ 
    public function setRemember_token($remember_token)
    {
        $this->remember_token = $remember_token;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

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
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = sha1( $password );

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
     * Get the value of birthdate
     */ 
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */ 
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of email_verified_at
     */ 
    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }

    /**
     * Set the value of email_verified_at
     *
     * @return  self
     */ 
    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;

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

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }


    public function create(){
        $query = "INSERT INTO `users` 
        (`users`.`first_name`,`users`.`last_name`,
        `users`.`email`,`users`.`phone`,`users`.`password`,
        `users`.`gender`,`users`.`birthdate`,`users`.`code`) 
        VALUES 
        ('$this->first_name','$this->last_name',
        '$this->email','$this->phone','$this->password',
        '$this->gender','$this->birthdate','$this->code')";
        return $this->runDML($query);
    }
    public function delete(){

    }
    public function update(){
        $image = "";
        if($this->image){
            $image = ",`users`.`image`='$this->image'";
        }
        $query = "UPDATE `users` SET `users`.`last_name` = '$this->last_name',
        `users`.`first_name` = '$this->first_name',`users`.`phone` = '$this->phone',
        `users`.`gender` = '$this->gender' , `users`.`birthdate` = '$this->birthdate' $image WHERE `users`.`email` = '$this->email'";
        return $this->runDML($query);
    }
    public function read(){

    }


    public function emailCheck()
    {
        $query = "SELECT `users`.* FROM `users` WHERE `users`.`email` = '$this->email'";
        return $this->runDQL($query);

    }

    public function checkCodeByEmail()
    {
       $query = "SELECT `users`.* FROM `users` WHERE `users`.`email` = '$this->email' AND `users`.`code` = $this->code";
       return $this->runDQL($query);

    }

    public function emailVerificaiton()
    {
        $query = "UPDATE `users` SET `users`.`email_verified_at` = '".date('Y-m-d H:i:s')."' WHERE `users`.`email` = '$this->email'";
        // echo $query;die;
        return $this->runDML($query);

    }

    public function login()
    {
       return $this->runDQL("SELECT `users`.* FROM `users` WHERE `users`.`email` = '$this->email' AND `users`.`password`= '$this->password'");
    }

    public function updateCode()
    {
        $query = "UPDATE  `users` SET `users`.`code`= $this->code WHERE `users`.`email` = '$this->email' ";
        return $this->runDML($query);
    }
    public function updatePassword()
    {
        $query = "UPDATE  `users` SET `users`.`password`= '$this->password' WHERE `users`.`email` = '$this->email' ";
        return $this->runDML($query);
    }

    public function getUserByEmail()
    {
        return $this->runDQL("SELECT `users`.* FROM `users` WHERE `users`.`email` = '$this->email'");

    }

    public function updateEmail()
    {
        $query = "UPDATE  `users` SET `users`.`email`= '$this->email' WHERE `users`.`id` = '$this->id'";
        return $this->runDML($query);
    }
    

    
}

