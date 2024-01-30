<?php

namespace App\Core\Plugins;
use App\Models\Category;
use App\Core\interfaces\Service;

class CategoriesFormatService implements Service
{
    private $db;

    public function __construct(){
        $this->db = new Category();
    }

    public function process(array $categories, $id = null):array
    {
        $result = [];
        if ($categories){
            foreach($categories as $category){        
                $parent_path = $this->pathToParent($category->id);
                if($id !== null && array_search($id, $parent_path) !== false) {
                    continue;
                }
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