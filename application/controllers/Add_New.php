<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_New extends CI_Controller {
	public function index(){
        $data['title'] = 'Add New';
        $data['page_content'] = 'add_new';
		$this->load->view('template', $data);
	}

	function addPost(){
		$this->form_validation->set_rules('add_title','Title','required');
        $this->form_validation->set_rules('add_content','Content','required');
        $this->form_validation->set_rules('add_category','Category','required');
    
        if($this->form_validation->run() != false){
			$title = htmlspecialchars($this->input->post('add_title'), ENT_QUOTES, 'UTF-8');
			$content = htmlspecialchars($this->input->post('add_content'), ENT_QUOTES, 'UTF-8');
			$category = htmlspecialchars($this->input->post('add_category'), ENT_QUOTES, 'UTF-8');
            $status = htmlspecialchars($this->input->post('add_status'), ENT_QUOTES, 'UTF-8');

			$apiURL = base_url()."api/article";
			$formData = array(
				'title' => $title,
				'content' => $content,
				'category' => $category,
				'status' => $status,
			);
			$client = curl_init($apiURL);
			curl_setopt($client, CURLOPT_POST, TRUE);
			curl_setopt($client, CURLOPT_POSTFIELDS, $formData);
			curl_setopt($client, CURLOPT_RETURNTRANSFER, TRUE);
			$response = curl_exec($client);
			curl_close($client);
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
														<strong>Berhasil</strong>, menambahkan data.
													</div>');
			redirect(base_url("add_new"));
        }else{
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
															<strong>Gagal</strong>, menambahkan data.
														</div>');
			redirect(base_url("add_new"));
        }
	}
}