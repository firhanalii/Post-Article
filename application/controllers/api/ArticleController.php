<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class ArticleController extends RestController {
    function __construct(){
		parent::__construct();
        $this->load->model('articleModel', 'article');
	}

	public function index_get(){
        $data = $this->article->get_article();
        $this->response($data, 200);
	}

    public function storeArticle_post() {
        $data = [
            'title' => $this->post('title'),
            'content' => $this->post('content'),
            'category' => $this->post('category'),
            'status' => $this->post('status'),
        ];
        $insert = $this->article->add_post($data);
        if ($insert) {
            $this->response([
                'status' => true,
                'message' => 'Success'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => true,
                'message' => 'Failed'
            ], RestController::HTTP_BAD_REQUEST);
        }
	}

    public function getIDArticle_get($id) {
        $get_data = $this->article->get_post($id);
        $this->response($get_data, 200);
	}

    public function updateIDArticle_put($id) {
        $data = [
            'title' => $this->put('title'),
            'content' => $this->put('content'),
            'category' => $this->put('category'),
            'status' => $this->put('status'),
        ];
        $update = $this->article->update_post($id, $data);
        if ($update) {
            $this->response([
                'status' => true,
                'message' => 'Success'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => true,
                'message' => 'Failed'
            ], RestController::HTTP_BAD_REQUEST);
        }
	}
}