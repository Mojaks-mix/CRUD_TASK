<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Category;

class CategoriesController
{
    private $db;

    public function __construct(){
        $this->db = new Category();
    }

    public function index()
    {
        $data['categories'] = ($this->db->getAllCategories());
        
        View::load('category\\index', $data);
    }

    public function add()
    {
        View::load('category\\add');
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'category_name' => $_POST['category_name'],
                'parent_id' => $_POST['parent_id']
            ];
            if($this->db->addCategory($data)){
                View::load('category\\add',['success' => 'Data was created successfully']);
            }
            
        }

        else
            View::load('category\\add',['error' => 'There was an error, try again.']);
    }

    public function edit($id)
    {
        $data['row'] = $this->db->getCategory($id);
        return View::load('category\\edit',$data);
    }

    public function update()
    {
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $this->db = new Category();
            $data = [
                'category_name' => $_POST['category_name'],
                'parent_id' => $_POST['parent_id']];

            if($this->db->updateCategory($id,$data))
            {
                $data['success'] = "Updated Successfully";
                $data['row'] = $this->db->getCategory($id);
                View::load('category\\edit',$data);
            }
            else 
            {
                $data['error'] = "Error";
                $data['row'] = $this->db->getCategory($id);
                View::load('category\\edit',$data);
            }
        }
    }


    public function delete($id){
        if($this->db->deleteCategory($id))
        {
            $data['success'] = "Category Have Been Deleted";
            return View::load('category\\delete',$data);
        }
        else 
        {
            $data['error'] = "Error";
            return View::load('category\\delete',$data);
        }
    }
}
