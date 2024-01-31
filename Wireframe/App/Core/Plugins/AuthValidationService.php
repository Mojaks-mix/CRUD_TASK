<?php

namespace App\Core\Plugins;
use App\Core\interfaces\Service;

class AuthValidationService implements Service
{
    public function __construct(){
    }

    public function process(array $credentials = [])
    {
        if(empty($credentials['username']) || empty($credentials['user_id']))
        {
            return false;
        }
        return true;
    }
}