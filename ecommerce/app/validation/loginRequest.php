<?php

class loginRequest {
    private $password;
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
    public function passwordValidation()
    {
        // required , regex ,confirmed
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/";
        $errors = [];
        if(empty($this->password)){
            $errors['password-required'] = 'Passwrod Is Required';
        }

        if(empty($errors)) {
            if(!preg_match($pattern,$this->password)){
                $errors['password-invalid'] = 'Failed Attempt';
            }
        }
        return $errors;
    }

   
}