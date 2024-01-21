<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Product;

class ProductsController
{
    private $db;

    public function __construct(){
        $this->db = new Product();
    }

    public function index()
    {
        $data['products'] = ($this->db->getAllProducts());
        
        View::load('product\\index', $data);
    }

    public function add()
    {
        View::load('product\\add');
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'quantity' => $_POST['quantity']];
            if($this->db->addProduct($data)){
                View::load('product\\add',['success' => 'Data was created successfully']);
            }
            
        }

        else
            View::load('product\\add',['error' => 'There was an error, try again.']);
    }

    public function edit($id)
    {
        $data['row'] = $this->db->getProduct($id);
        return View::load('product\\edit',$data);
    }

    public function update()
    {
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $this->db = new Product();
            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'quantity' => $_POST['quantity']];

            if($this->db->updateProduct($id,$data))
            {
                $data['success'] = "Updated Successfully";
                $data['row'] = $this->db->getProduct($id);
                View::load('product\\edit',$data);
            }
            else 
            {
                $data['error'] = "Error";
                $data['row'] = $this->db->getProduct($id);
                View::load('producs\\edit',$data);
            }
        }
    }


    public function delete($id){
        if($this->db->deleteProduct($id))
        {
            $data['success'] = "Product Have Been Deleted";
            return View::load('product\\delete',$data);
        }
        else 
        {
            $data['error'] = "Error";
            return View::load('product\\delete',$data);
        }
    }
}
