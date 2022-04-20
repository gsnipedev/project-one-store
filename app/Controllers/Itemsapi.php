<?php

namespace App\Controllers;

use App\Models\LikesModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;

class Itemsapi extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\ItemsModel';
    protected $format = 'json';


    public function index()
    {
        $apiKey = $this->request->getVar('apiKey');
        if ($apiKey != 'tesApiKey') {
            return $this->fail('Wrong API key');
        }
        $this->model->join('likes', 'likes.item_id = items.item_id', 'left');
        $this->model->join('category', 'category.category_id = items.category_id');
        $this->model->join('collections', 'collections.collection_id = items.collection_id');
        $this->model->select('items.*, category.*, collections.*')->selectCount('likes.item_id', 'total_like')->groupBy('items.item_id');
        //$this->model->orderBy('item_id', 'ASC');
        return $this->respond([
            'Response' => 'success',
            'items' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        $apikey = 'admin';

        $data = [

            'item_name' => $this->request->getVar('item_name'),
            'size' => $this->request->getVar('size'),
            'price' => $this->request->getVar('price'),
            'item_image' => $this->request->getVar('item_image'),
            'category_id' => $this->request->getVar('category_id'),
            'updated_date' => Time::now(),
            'created_date' => Time::now(),

        ];
        $this->model->insert($data);
        return redirect()->to(base_url('admin'));

        // if (!$this->model->insert($data)) {
        //     return $this->respond($this->model->errors());
        // }
    }

    public function show($id = null)
    {
        if ($id == 'getCategory') {

            $categoryModel = model('App\Models\CategoryModel');
            return $this->respond([
                'status' => 'Success',
                'category' => $categoryModel->findAll(),
            ]);
        }
        if ($id == 'allCollection') {
            $colModel = model('App\Models\CollectionsModel');
            return $this->respond([
                'status' => 'Success',
                'Response' => $colModel->findAll(),
            ]);
        }
        if ($id == 'getLikes') {
            $element = $this->request->getVar('elements');
            $likesModel = model('App\Models\LikesModel');
            $likesModel->join('user_data', 'user_data.user_id = likes.user_id');
            $statusFinal = $likesModel->where('likes.item_id', $element)->findAll();

            return $this->respond([
                'status' => 'success',
                'table' => $likesModel->findAll(),
                'username' => session()->get('username'),
                'Like_Status' => $statusFinal,


            ]);
        }

        if ($id == 'likeDislike') {
            $element = $this->request->getVar('elements');
            $username = session()->get('username');
            $likesModel = model('App\Models\LikesModel');
            $likesModel->join('user_data', 'user_data.user_id = likes.user_id');
            $likesModel->join('items', 'items.item_id = likes.item_id');
            $likesModel->where('item_name', $element);
            $final = $likesModel->where('username', $username);
            if ($final->findAll() != null) {
                $db = db_connect();
                $db->query(
                    "DELETE likes FROM likes 
                    INNER JOIN user_data ON user_data.user_id=likes.user_id 
                    INNER JOIN items ON items.item_id=likes.item_id
                    WHERE user_data.username='$username' AND items.item_name='$element'
                     "
                );
                return;
            }
            return $this->respond(
                [
                    'status' => 'LIKED',
                    'username' => $username,
                    'tableLike' => $likesModel->findAll(),
                ]

            );
        }

        $this->model->join('likes', 'likes.item_id = items.item_id', 'left');
        $this->model->join('category', 'category.category_id = items.category_id');
        $this->model->join('collections', 'collections.collection_id = items.collection_id');
        $this->model->select('items.*, category.*, collections.*')->selectCount('likes.item_id', 'total_like')->groupBy('items.item_id');
        $this->model->orLike('category_name', $id);
        $this->model->orLike('collection_name', $id);

        return $this->respond([
            'status' => 'Success',
            'search' => $this->model->findAll(),
        ]);
    }

    public function update($id = null)
    {
        return $this->respond("UPDATED AF");
    }

    public function delete($id = null)
    {
        $name = $id;
        $this->model->where('item_name', $name);
        $this->model->delete();
    }
}