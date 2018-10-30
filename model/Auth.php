<?php

require_once 'User.php';

class Auth
{
    public static function session_start()
    {
        if(!isset($_SESSION))
            session_start();
    }

    public static function is_logged_in()
    {
        Auth::session_start();
        if(!empty($_SESSION['name']))
            return true;
        else
            return false;
    }

    public static function passwords_identical(string $password1,string $password2):bool
    {
        if($password1 === $password2)
            return true;
        else
            return false;
    }

    public static function email_exists(string $email):bool
    {
        if(User::getOneByEmail($email))
            return true;
        else
            return false;
    }

    public static function register(string $email,string $name, string $password1, string $password2)
    {
        $password1 = trim($password1);
        $password2 = trim($password2);
        $name = htmlspecialchars(trim($name));
        $email = htmlspecialchars(trim($email));

        if(filter_var($email, FILTER_VALIDATE_EMAIL) &&
            self::passwords_identical($password1,$password2) &&
            !self::email_exists($name)){

            $password = hash('SHA256', $password1);

            return User::create($email, $name, $password);
        }else{
            return false;
        }
    }

    public static function login(string $email, string $password)
    {

        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        $password = trim($password);

        echo $email;
        echo $password;
        $password = hash('SHA256', $password);
        echo PHP_EOL.$password;
        $user = User::getOneByEmailPassword($email, $password);

        if($user){
            self::session_start();
            $_SESSION['id'] = $user->id;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user->name;
            var_dump($_SESSION);
            return true;
        }else{
            return false;
        }
    }

    public static function logout()
    {
        self::session_start();
        session_destroy();
    }
}

//var_dump(Auth::register('nikola@hhh.com', 'SOME NAME', 'pass2', 'pass2'));