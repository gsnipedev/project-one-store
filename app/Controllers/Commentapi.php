<?php

namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Commentapi extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\CommentModel';
    protected $format = 'json';

    public function index()
    {
        $db = db_connect();
        $itemId = session()->get('current_item');
        $this->model->join('user_data', 'user_data.user_id=comments.user_id');
        $this->model->join('image_data', 'image_data.img_id=user_data.img_id');
        $this->model->join('comment_replies as cr', 'cr.comment_ids = comments.comment_id', 'LEFT');
        $this->model->where('item_id', $itemId);
        $this->model->orderBy('comment_id', 'DESC');
        $username = session()->get('username');
        $result = $db->query("SELECT rank FROM user_data WHERE username='$username' ");
        $rank = $result->getResult('array');
        return $this->respond([
            'respond' => $this->model->findAll(),
            'username' => session()->get('username'),
            'status' => $rank,
            'ses' => session_status(),
        ]);
    }

    public function create()
    {
        $req = $this->request->getVar('req');
        if ($req == 'reply') {
            $db = db_connect();
            $dataReply = [
                'comment_ids' => $this->request->getVar('commentId'),
                'reply_text' => nl2br($this->request->getVar('reply_text')),
            ];
            $comment_ids = $dataReply['comment_ids'];
            $replyModel = model('App\Models\ReplyModel');
            $result = $db->query("SELECT * FROM comment_replies WHERE comment_ids=$comment_ids");
            if ($result) {
                $replyModel->replace($dataReply);
                return;
            }
            $replyModel->insert($dataReply);
            return;
        }


        $db = db_connect();
        $username = session()->get('username');
        if ($username == null) {
            return redirect()->to(base_url('home/login'));
        }
        $query = $db->query("SELECT * FROM user_data WHERE username='$username'");
        foreach ($query->getResult('array') as $row) {
            $user_id = $row['user_id'];
            break;
        }
        $comment_text = $this->request->getVar('comment');
        $data = [

            'comment_text' => nl2br($comment_text),
            'user_id' => $user_id,
            'item_id' => session()->get('current_item'),

        ];
        $this->model->save($data);
        return redirect()->back();
    }

    public function update($id = null)
    {
        $db = db_connect();
        $comment_id = $id;
        $comment_text = $this->request->getVar('commentText');
        $db->query("UPDATE comments SET comment_text = '$comment_text' WHERE comment_id='$comment_id'");
    }

    public function edit($id = null)
    {
        $db = db_connect();
        $comment_id = $id;
        $comment_text = nl2br($this->request->getVar('commentText'));
        $username = session()->get('username');
        $rank = $db->query("SELECT rank FROM user_data WHERE username='$username'")->getResult();
        //$check_username = $db->query("SELECT * FROM user_data WHERE username = '$username' ");
        // foreach ($check_username->getResult('array') as $row) {
        //     $username_valid = $row['username'];
        //     break;
        // }
        $check_username_comment = $db->query("SELECT * FROM comments LEFT JOIN user_data ON comments.user_id=user_data.user_id WHERE user_data.username='$username' AND comments.comment_id='$comment_id'");
        foreach ($check_username_comment->getResult('array') as $row) {
            $username_valid_at_comment = $row['username'];
            break;
        }
        //return $this->respond([$check_username_comment->getResult(), $username_valid]);
        if ($rank[0]->rank == 'admin' || isset($username_valid_at_comment)) {
            $db->query("UPDATE comments SET comment_text = '$comment_text' WHERE comment_id='$comment_id'");
            return;
        }
        return $this->respond('ERROR');
    }

    public function delete($id = null)
    {
        $comment_id = $id;
        $this->model->where('comment_id', $comment_id);
        $this->model->delete();
    }
}
