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
			$row[] = '<a class="btn btn-outline-info" href="javascript:void(0);" onclick="modEdThr('.$thrash->id.')">Edit</a>
					<a class="btn btn-outline-danger" href="javascript:void(0);" onclick="modDelThr('.$thrash->id.')">Delete</a>';

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
		if ($param == "delete") {
			$publish_id = htmlspecialchars($this->input->post('nameDeletePublish'), ENT_QUOTES, 'UTF-8');
			$where = array(
				'id' => $publish_id
			);

			// try {
			// 		$this->article->delID_article("posts", $where);
			// 		$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
			// 													<strong>Berhasil</strong>, menambahkan data.
			// 												</div>');
			// 		redirect(base_url("all_posts"));
			// } catch (Exception $e) {
			// 	echo 'Message: ' . $e->getMessage();
			// }
		}
	}

	public function action_thrash($param = ""){
		if ($param == "delete") {
			$publish_id = htmlspecialchars($this->input->post('nameDeleteThrash'), ENT_QUOTES, 'UTF-8');
			$where = array(
				'id' => $publish_id
			);

			try {
					$this->article->delID_article("posts", $where);
					$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
																<strong>Berhasil</strong>, menambahkan data.
															</div>');
					redirect(base_url("all_posts"));
			} catch (Exception $e) {
				echo 'Message: ' . $e->getMessage();
			}
		}
	}
}