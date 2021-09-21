<?php


include_once __DIR__."\../models\User.php";

class registerRequest {
    private $password;
    private $confirm_password;
    private $email;

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
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of confirm_password
     */ 
    public function getConfirm_password()
    {
        return $this->confirm_password;
    }

    /**
     * Set the value of confirm_password
     *
     * @return  self
     */ 
    public function setConfirm_password($confirm_password)
    {
        $this->confirm_password = $confirm_password;

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

    public function emailValidation()
    {
       // regular expression regex
       $pattern = '/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/';
       $errors = [];
       if(empty($this->email)){
        $errors['email-required'] = 'Email Is Required';
       }else{
           if(!preg_match($pattern,$this->email)){
                $errors['email-invalid'] = 'Email Is Invalid';
           }
       }

       return $errors;
    }

    public function passwordValidation()
    {
        // required , regex ,confirmed
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/";
        $errors = [];
        if(empty($this->password)){
            $errors['password-required'] = 'Passwrod Is Required';
        }
        if(empty($this->confirm_password)){
            $errors['confrim-password-required'] = 'Confrim Passwrod Is Required';
        }
        if($this->password != $this->confirm_password ){
            $errors['confrim-password-invalid'] = 'Password dosen\'t match';
        }else{
            if(empty($errors)) {
                if(!preg_match($pattern,$this->password)){
                    $errors['password-invalid'] = 'Minimum eight and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character';
                }
            }
        }
        return $errors;
    }

    public function emailDataBaseCheck()
    {
        $user = new User;
        $user->setEmail($this->email);
        if($user->emailCheck()){
            return ['email-exists'=>'Email Already Exists'];
        }else{
            return [];
        }

    }
}

?>