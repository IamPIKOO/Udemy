<?php

# Signup class

class Signup extends Controller
{
    public function index()
    {
        $data['errors'] = [];   

        $user  = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST")
        { 
            if($user->validate($_POST))
            {
                date_default_timezone_set('date');
                $_POST['date'] = date('Y-m-d H:i:s');
                $_POST['role'] = ucfirst(strtolower('admin'));
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_POST['firstname'] = ucfirst(strtolower($_POST['firstname']));
                $_POST['lastname'] = ucfirst(strtolower($_POST['lastname']));
                $_POST['email'] = ucfirst(strtolower($_POST['email']));
                
                $user->insert($_POST);

                message('Account has been created sucessfully. Please login');

                redirect('login');
            }
        }


        $data['errors'] = $user->errors;

        $data['title'] = 'Signup';
        
        $this->view('signup', $data);
    }
}