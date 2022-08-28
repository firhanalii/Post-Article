<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preview extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('articleModel', 'article');
	}

	public function index(){
        $data['title'] = 'Preview';
        $data['page_content'] = 'preview';
		$data['data_content'] = $this->article->get_priview_content();
		$this->load->view('template', $data);
	}

	public function article(){
        $id = $this->uri->segment(3);
		$data['row_content'] = $this->article->getID_priview_content($id);
		$this->load->view('preview_article', $data);
	}
}