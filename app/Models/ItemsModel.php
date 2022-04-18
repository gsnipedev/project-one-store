<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'items';
    protected $primaryKey       = 'item_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 1;
    protected $returnType       = 'App\Entities\ItemsEntity';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['item_id', 'item_name', 'size', 'price', 'item_image', 'category_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [

        'item_name' => 'required',
        'size' => 'required',
        'price' => 'required',
        'item_image' => 'required',
        'category_id' => 'required',

    ];
    protected $validationMessages   = [

        'item_name' =>
        [
            'required' => 'Please input your item Name',
        ],
        'size' =>
        [
            'required' => 'Please specify your item size',
        ],
        'price' =>
        [
            'required' => 'Please set your item price',
        ],
        'item_image' =>
        [
            'required' => "can't found your item image",
        ],
        'category_id' =>
        [
            'required' => 'Please choose your item category',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}