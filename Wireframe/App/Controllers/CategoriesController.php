<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Category;

class CategoriesController
{
    private $db;
    private array $data = [];

    public function __construct(){
        $this->db = new Category();
    }

    public function index()
    {
        $this->data['categories'] = ($this->db->getPaginatedCategories(10,0));
        View::load('category\\index', $this->data);
    }

    public function add()
    {
        $this->data = $this->formatCategory($this->db->getAllCategories());
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
                View::load('category\\add',['success' => 'Data was created successfully']);
            }
            
        }

        else
            View::load('category\\add',['error' => 'There was an error, try again.']);
    }

    public function edit($data)
    {
        $this->data['categories'] = $this->formatCategory($this->db->getAllCategories());
        $this->data['row'] = $this->db->getCategory($data['id']);

        if(($key = array_search($data['id'], $this->data['categories'])) !== false) {
            unset($this->data['categories'][$key]);
        }
        
        return View::load('category\\edit',$this->data);
    }

    public function update()
    {
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $this->db = new Category();
            $this->data = [
                'category_name' => $_POST['category_name'],
                'parent_id' => $_POST['parent_id']== 'No Parent'? null : $_POST['parent_id']];

            if($this->db->updateCategory($id,$this->data))
            {
                $this->data['success'] = "Updated Successfully";
                $this->data['row'] = $this->db->getCategory($id);
                View::load('category\\edit',$this->data);
            }
            else 
            {
                $this->data['error'] = "Error";
                $this->data['row'] = $this->db->getCategory($id);
                View::load('category\\edit',$this->data);
            }
        }
    }


    public function delete($data)
    {
        if($this->db->deleteCategory($data['id']))
        {
            $this->data['success'] = "Category Have Been Deleted";
            return View::load('category\\delete',$this->data);
        }
        else 
        {
            $this->data['error'] = "Error";
            return View::load('category\\delete',$this->data);
        }
    }

    private function formatCategory(array $categories):array
    {
        $result = [];
        if ($categories){
            foreach($categories as $category){        
                $parent_path = $this->pathToParent($category->id);
                $this->setNestedValue($result, $parent_path, $category);
            }
            $result = $this->arrayWithLevels($result);
        }
        return $result;
    }

    private function pathToParent(string $id): array
    {
        $path = [];
        while($parent = $this->db->getCategory($id)){
            array_unshift($path, $parent['id']);
            $id = $parent['parent_id'];
        }

        return $path;
    }

    private function setNestedValue(array &$array, array $path, mixed $value): void
    {
        $current = &$array;
    
        foreach ($path as $key) {
            if (!isset($current[$key])) {
                $current[$key] = [];
            }
    
            $current = &$current[$key];
        }
    
        $current[] = $value;
    }

    function arrayWithLevels($array, $level = 0): array 
    {
        $options = [];
    
        foreach ($array as $value) {
            if (is_array($value)) {
                $options = array_merge($options, $this->arrayWithLevels($value, $level + 1));
            } else {
                $options[str_repeat('-', $level) . ' ' . $value->category_name] = $value->id;
            }
        }
    
        return $options;
    }
}
