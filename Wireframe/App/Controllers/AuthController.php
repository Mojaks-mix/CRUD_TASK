<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class AuthController
{
    private $db;
    
    public function __construct()
    {
        $this->db = new User();
    }

    public function login($data = [])
    {
        View::load('Registeration\\login');
    }

    public function verify(){
        if (isset($_POST['submit']) && isset($_POST['pass']) && isset($_POST['key'])) {
            if($user = $this->db->getUser($_POST['key'])){
                if(sha1($_POST['pass']) === $this->db->getUserCredentials($user)){
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header("Location: " . SITE_URL . 'home');
                }
                else
                {
                    View::load('Registeration\\login', ['error' => 'Incorrect Credentials']);
                }
                
            }
            else
            View::load('Registeration\\login', ['error' => 'Incorrect Credentials']);   
        }
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        View::load('Registeration\\login');
    }

}