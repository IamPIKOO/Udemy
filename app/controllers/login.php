<?php

# Login class

class Login extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';

        $data['errors'] = []; 

        $user  = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            // Validate
            $row = $user->first(
                ['email' => $_POST['email']]
            );

            if($row)
            {
                if(password_verify($_POST['password'], $row->password))
                {
                    // authenticate
                    Auth::authenticate($row);

                    redirect('home');
                }

                $data['errors']['email'] = 'wrong email or password';

            }
            else{

                $data['errors']['email'] = 'Account does not exist';
            }
 
        } 
        
        $this->view('login', $data);
    }
}