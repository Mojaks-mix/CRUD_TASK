<?php

namespace App\Controllers;

use App\Core\View;

class HomeController
{

    //~~~~~Methods~~~~~

    public function index($params = [])
    {
        View::load('home',$params);
    }
}
