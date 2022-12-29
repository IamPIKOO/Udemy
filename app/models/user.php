<?php

# Users Model

class User extends Model
{
    public $errors = [];

    protected $table = 'users';

    protected $allowedColumns = 
    [
        'firstname',	
        'lastname',	
        'email',	
        'password',	
        'role',	
        'date'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['firstname']))
        {
            $this->errors['firstname'] = 'First name is required';

        } elseif (strpos($data['firstname'], ' ') !== false) {
            
            $this->errors['firstname'] = 'Please, No space required';

        } elseif (!ctype_alpha($data['firstname'])) {

            $this->errors['firstname'] = 'Please, Alphabets only';

        }
        

        if(empty($data['lastname']))
        {
            $this->errors['lastname'] = 'Last name is required';

        } elseif (strpos($data['lastname'], ' ') !== false) {
            
            $this->errors['lastname'] = 'Please, No space required';

        } elseif (!ctype_alpha($data['lastname'])) {

            $this->errors['lastname'] = 'Please, Alphabets only';

        }


        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = 'Enter valid email';

        } elseif($this->where(['email' => $data['email']]))
        {
            $this->errors['email'] = 'Email address already exits';
        }

    
        if(empty($data['password']))
        {
            $this->errors['password'] = 'Password is required';

        } elseif(!preg_match ('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $data['password'])) 
        {                      
            $this->errors['password'] = 
            'Password must contain only uppercase, lowercase, number and
             miminum of 8 characters E.g <strong>ABCabc123</strong>'
            ; 

        } elseif($data['password'] == 'ABCabc123' 
             || $data['password'] == 'abcABC123' 
             || $data['password'] == '123ABCabc'
             || $data['password'] == '123abcABC')  
        {
            $this->errors['password'] = 
            'Invalid password! Please create a different password'
            ;
            
        }
        

        if(empty($data['retype_password']))
        {

            $this->errors['retype_password'] = 'Confirm password';

        } elseif($data['password'] !== $data['retype_password'])
        {
            $this->errors['retype_password'] = 'Passwords do not match';
        }
        

        if(empty($data['terms']))
        {
            $this->errors['terms'] = 'Please accept the terms and condition';
        }

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }

}