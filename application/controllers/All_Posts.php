<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_Posts extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('articleModel', 'article');
        $this->load->model('datatablesModel', 'dt_serverside');
	}

	public function index(){
        $data['title'] = 'All Posts';
        $data['page_content'] = 'all_posts';
		$data['count_publish'] = $this->article->count_post_publish();
		$data['count_draft'] = $this->article->count_post_draft();
		$data['count_thrash'] = $this->article->count_post_thrash();
		$this->load->view('template', $data);
	}

	public function serverSidePublish(){
		$list = $this->dt_serverside->get_datatables();
		$data = array();
	     
		$no = $_POST['start'];
		foreach ($list as $publish) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $publish->title;
			$row[] = $publish->category;
			$row[] = '<a class="btn btn-outline-info" href="javascript:void(0);" onclick="modEdPub('.$publish->id.')">Edit</a>
					  <a class="btn btn-outline-danger" href="javascript:void(0);" onclick="modDelPub('.$publish->id.')">Delete</a>';
			$data[] = $row;
		}
	
		$output = array(
							"draw" => $this->security->xss_clean($_POST['draw']),
							"recordsTotal" => $this->dt_serverside->count_all(),
							"recordsFiltered" => $this->dt_serverside->count_filtered(),
							"data" => $data,
						);

		//output to json format
		echo json_encode($output);
	}

	public function serverSideDraft(){
		$list = $this->dt_serverside->get_datatables_draft();
		$data = array();
	     
		$no = $_POST['start'];
		foreach ($list as $draft) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $draft->title;
			$row[] = $draft->category;
			$row[] = '<a class="btn btn-outline-info" href="javascript:void(0);" onclick="modEdDra('.$draft->id.')">Edit</a>
					<a class="btn btn-outline-danger" href="javascript:void(0);" onclick="modDelDra('.$draft->id.')">Delete</a>';

			$data[] = $row;
		}
	
		$output = array(
							"draw" => $this->security->xss_clean($_POST['draw']),
							"recordsTotal" => $this->dt_serverside->count_all_draft(),
							"recordsFiltered" => $this->dt_serverside->count_filtered_draft(),
							"data" => $data,
						);

		//output to json format
		echo json_encode($output);
	}

	public function serverSideThrash(){
		$list = $this->dt_serverside->get_datatables_thrash();
		$data = array();
	     
		$no = $_POST['start'];
		foreach ($list as $thrash) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $thrash->title;
			$row[] = $thrash->category;
			$row[] = '<a class="btn btn-outline-danger" href="javascript:void(0);" onclick="modDelThr('.$thrash->id.')">Delete Permatenly</a>';

			$data[] = $row;
		}
	
		$output = array(
							"draw" => $this->security->xss_clean($_POST['draw']),
							"recordsTotal" => $this->dt_serverside->count_all_thrash(),
							"recordsFiltered" => $this->dt_serverside->count_filtered_thrash(),
							"data" => $data,
						);

		//output to json format
		echo json_encode($output);
	}

	public function action_publish($param = ""){
		if ($param == "view") {
			$publish_id = htmlspecialchars($this->input->post('valEditPublish'), ENT_QUOTES, 'UTF-8');
			$keepData = $this->article->getID_priview_content($publish_id);

			echo '<div class="row">
					<input type="hidden" value="'.$keepData->id.'" name="edit_publish_id">
					<div class="mb-3">
						<label class="form-label">Title</label>
						<input type="text" value="'.$keepData->title.'" class="form-control" name="edit_publish_title" size="20" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Content</label>
						<textarea class="form-control" rows="3" name="edit_publish_content" size="200" required>'.$keepData->content.'</textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Category</label>
						<input type="text" value="'.$keepData->category.'" class="form-control" name="edit_publish_category" size="3" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Status</label>
						<select class="form-select" aria-label="Default select example" name="edit_publish_status">
							<option disabled>Select Status:</option>
							<option value="Publish" '; echo ($keepData->status == "Publish") ? 'selected' : ''; echo '>Publish</option>
							<option value="Draft" '; echo ($keepData->status == "Draft") ? 'selected' : ''; echo '>Draft</option>
							<option value="Thrash" '; echo ($keepData->status == "Thrash") ? 'selected' : ''; echo '>Thrash</option>
						</select>
					</div>
				</div>';
		}

		if ($param == "edit") {
			$this->form_validation->set_rules('edit_publish_title','Title','required');
			$this->form_validation->set_rules('edit_publish_content','Content','required');
			$this->form_validation->set_rules('edit_publish_category','Category','required');
		
			if($this->form_validation->run() != false){
				$id = htmlspecialchars($this->input->post('edit_publish_id'), ENT_QUOTES, 'UTF-8');
				$title = htmlspecialchars($this->input->post('edit_publish_title'), ENT_QUOTES, 'UTF-8');
				$content = htmlspecialchars($this->input->post('edit_publish_content'), ENT_QUOTES, 'UTF-8');
				$category = htmlspecialchars($this->input->post('edit_publish_category'), ENT_QUOTES, 'UTF-8');
				$status = htmlspecialchars($this->input->post('edit_publish_status'), ENT_QUOTES, 'UTF-8');

				$apiURL = base_url()."api/article/update/".$id;
				$formData = array(
					'title' => $title,
					'content' => $content,
					'category' => $category,
					'status' => $status,
				);
				$data_json = json_encode($formData);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $apiURL);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
				curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$response  = curl_exec($ch);
				curl_close($ch);
				$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
															<strong>Berhasil</strong>, mengubah data.
														</div>');
				redirect(base_url("all_posts"));
			}else{
				$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
																<strong>Gagal</strong>, mengubah data.
															</div>');
				redirect(base_url("all_posts"));
			}
		}

		if ($param == "delete") {
			$publish_id = htmlspecialchars($this->input->post('nameDeletePublish'), ENT_QUOTES, 'UTF-8');
			$keepData = $this->article->getID_priview_content($publish_id);

			$apiURL = base_url()."api/article/update/".$publish_id;
			$formData = array(
				'title' => $keepData->title,
				'content' => $keepData->content,
				'category' => $keepData->category,
				'status' => 'Thrash',
			);
			$data_json = json_encode($formData);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $apiURL);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response  = curl_exec($ch);
			curl_close($ch);
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
														<strong>Berhasil</strong>, menghapus data.
													</div>');
			redirect(base_url("all_posts"));
		}
	}

	public function action_draft($param = ""){
		if ($param == "delete") {
			$publish_id = htmlspecialchars($this->input->post('nameDeleteDraft'), ENT_QUOTES, 'UTF-8');
			$keepData = $this->article->getID_priview_content($publish_id);

			$apiURL = base_url()."api/article/update/".$publish_id;
			$formData = array(
				'title' => $keepData->title,
				'content' => $keepData->content,
				'category' => $keepData->category,
				'status' => 'Thrash',
			);
			$data_json = json_encode($formData);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $apiURL);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response  = curl_exec($ch);
			curl_close($ch);
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
														<strong>Berhasil</strong>, menghapus data.
													</div>');
			redirect(base_url("all_posts"));
		}
	}

	public function action_thrash($param = ""){
		if ($param == "delete") {
			$publish_id = htmlspecialchars($this->input->post('nameDeleteThrash'), ENT_QUOTES, 'UTF-8');

			// Mengecek jika status thrash
			$checkDelete = $this->article->getID_priview_content($publish_id);
			$checkStatus = $checkDelete->status;
			if($checkStatus == "Thrash"){
				$apiURL = base_url()."api/article/delete/".$publish_id;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $apiURL);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
				$result = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close($ch);
				$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
															<strong>Berhasil</strong>, menghapus data.
														</div>');
				redirect(base_url("all_posts"));
			}else{
				$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
															<strong>Gagal</strong>, menghapus data.
														</div>');
				redirect(base_url("all_posts"));
			}
		}
	}
}