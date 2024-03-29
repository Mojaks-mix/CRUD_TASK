<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Category;
use App\Core\Plugins\CategoriesFormatService;

class CategoriesController
{
    private $db;
    private array $data = [];
    private CategoriesFormatService $categoriesformater;

    public function __construct(){
        $this->db = new Category();
        $this->categoriesformater = new CategoriesFormatService();
    }

    public function index()
    {
        View::load('category\\index');
    }

    public function table($data = [])
    { 
        $countTotal = $this->db->getAllCategoriesCount();
        
        $search = $data['search%5Bvalue%5D'];
        $limit = $data['length'];
        $offset = $data['start'];

        $this->data['data'] = ($this->db->getPaginatedCategories($limit, $offset, $search));
        $countFilter = $this->db->getPaginatedCategories($limit, $offset, $search, 1);

        $this->data['draw'] = (int) $data['draw'];
        $this->data['recordsTotal'] = $countTotal;
        $this->data['recordsFiltered'] = $countFilter;

        $response = json_encode($this->data);
        echo $response;
    }

    public function add()
    {
        $this->data = $this->categoriesformater->process($this->db->getAllCategories());
        View::load('category\\add',$this->data);
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $this->data = [
                'category_name' => $_POST['category_name'],
                'parent_id' => $_POST['parent_id'] == 'No Parent'? null : $_POST['parent_id']
            ];
            if($this->db->addCategory($this->data)){
                header("Location: " . SITE_URL . 'categories');
            }
            else
            View::load('category\\add',['error' => 'There was an error, try again.']);   
        }
    }

    public function edit($data)
    {
        $this->data['categories'] = $this->categoriesformater->process($this->db->getAllCategories(), $data['id']);
        $this->data['row'] = $this->db->getCategory($data['id']);

        if(($key = array_search($data['id'], $this->data['categories'])) !== false) {
            unset($this->data['categories'][$key]);
        }
        
        if($this->data['row'] !== null){
            $response = [
                'status' => 200,
                'data'=> $this->data
            ];
            echo json_encode($response);
            return true;
        }
        else{
            $response = [
                'status' => 422,
                'message' => 'Invalid Category ID'
            ];
            echo json_encode($response);
            return false;
        }
    }

    public function update()
    {
        if(isset($_POST['updated']))
        {
            $id = $_POST['id'];
            $this->db = new Category();
            $this->data = [
                'category_name' => $_POST['category_name'],
                'parent_id' => $_POST['parent_id']== 'No Parent'? null : $_POST['parent_id']
            ];
            
            if($id !== $this->data['parent_id'] && $this->db->updateCategory($id,$this->data))
            {
                $response = [
                    'status' => 200,
                    'message' => 'Updated Successfully'
                ];
                echo json_encode($response);
                return true;
            }
            else 
            {
                $response = [
                    'status' => 500,
                    'message' => 'Error, please try again.',
                    'row' => $this->db->getCategory($id)
                ];
                echo json_encode($response);
                return false;
            }
        }
    }

    public function delete($data)
    {
        if($this->db->deleteCategory($data['id']))
        {
            $response = [
                'status' => 200,
                'message' => 'Category Has Been Deleted'
            ];
            echo json_encode($response);
            return true;
        }
        else 
        {
            $response = [
                'status' => 500,
                'message' => 'ERROR, CATEGORY IS NOT DELETED'
            ];
            echo json_encode($response);
            return false;
        }
    }
}
