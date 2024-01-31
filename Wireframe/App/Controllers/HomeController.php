<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Home;

class HomeController
{
    private $db;
    private array $data = [];
    //~~~~~Methods~~~~~

    public function __construct(){
        $this->db = new Home();
    }

    public function index()
    {
        $this->data['categoriesCount'] = $this->db->getCategoriesCount();
        $this->data['contentsCount'] = $this->db->getContentsCount();
        View::load('home', $this->data);
    }

    public function pieData()
    {
        echo json_encode($this->db->getPieData());
    }
}
