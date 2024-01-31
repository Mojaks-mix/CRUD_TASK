<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Content;
use App\Core\Plugins\CategoriesFormatService;

class ContentsController
{
    private $db;
    private array $data = [];
    private CategoriesFormatService $categoriesformater;

    public function __construct(){
        $this->db = new Content();
        $this->categoriesformater = new CategoriesFormatService();

    }

    public function index()
    {
        View::load('Content\\index');
    }

    public function table($data = [])
    { 
        $countTotal = $this->db->getAllContentsCount();
        
        $search = $data['search%5Bvalue%5D'];
        $limit = $data['length'];
        $offset = $data['start'];

        $this->data['data'] = ($this->db->getPaginatedContents($limit, $offset, $search));
        $countFilter = $this->db->getPaginatedContents($limit, $offset, $search, 1);

        $this->data['draw'] = (int) $data['draw'];
        $this->data['recordsTotal'] = $countTotal;
        $this->data['recordsFiltered'] = $countFilter;

        $response = json_encode($this->data);
        echo $response;
    }

    public function add()
    {
        $this->data = $this->categoriesformater->process($this->db->getCategory()->getAllCategories());
        View::load('Content\\add',$this->data);
    }

    public function store()
    {
        $currentDate = date('Y-m-d H:i:s');
        if (isset($_POST['submit'])) {
            $this->data = [
                'content_title' => $_POST['content_title'],
                 'content' =>  $_POST['content'],
                 'category_id'=> $_POST['category_id'] == 'No Category' ? null : $_POST['category_id'],
                 'enabled'=> isset($_POST['enabled']) ? '1' : '0',
                 'added_by'=> $_SESSION['user_id'],
                 'added_date' => $currentDate
            ];
            if($this->db->addContent($this->data)){
                header("Location: " . SITE_URL . 'Contents');
            }
            else
            View::load('Content\\add',['error' => 'There was an error, try again.']);   
        }
    }

    public function edit($data)
    {
        $this->data['categories'] = $this->categoriesformater->process($this->db->getCategory()->getAllCategories());;
        $this->data['row'] = $this->db->getContent($data['id']);
        
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
                'message' => 'Invalid Content ID'
            ];
            echo json_encode($response);
            return false;
        }
    }

    public function update()
    {
        $currentDate = date('Y-m-d H:i:s');

        if(isset($_POST['updated']))
        {
            $id = $_POST['id'];
            $this->db = new Content();
            $this->data =[
                'content_title' => $_POST['content_title'],
                 'content' => $_POST['content'],
                 'category_id'=> $_POST['category_id'],
                 'enabled'=> isset($_POST['enabled']) ? '1' : '0',
                 'added_by'=> $_SESSION['user_id'],
                 'added_date' => $currentDate
            ];
            
            if($this->db->updateContent($id,$this->data))
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
                    'row' => $this->db->getContent($id)
                ];
                echo json_encode($response);
                return false;
            }
        }
    }

    public function delete($data)
    {
        if($this->db->deleteContent($data['id']))
        {
            $response = [
                'status' => 200,
                'message' => 'Content Has Been Deleted'
            ];
            echo json_encode($response);
            return true;
        }
        else 
        {
            $response = [
                'status' => 500,
                'message' => 'ERROR, CONTENT IS NOT DELETED'
            ];
            echo json_encode($response);
            return false;
        }
    }
}
