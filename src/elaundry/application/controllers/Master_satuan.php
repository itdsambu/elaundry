<?php
defined('BASEPATH') or EXIT ('No Direct Script Allowed Access');

class Master_satuan extends CI_Controller{
	function __construct(){
		parent:: __construct();

		$this->load->model('M_mastersatuan');
		if (!$this->session->userdata('user_id')){
			redirect('login');
		}
	}

	public function index(){
		$data['datasatuan'] = $this->M_mastersatuan->get_datasatuan();

		$this->template->display('Master_satuan/index', $data);
	}

	function tambahData(){

		$this->template->display('Master_satuan/input');
	}

	function simpanData(){
		$namasatuan	  = $this->input->post('txtnamasatuan');
		$abbrsatuan	  = $this->input->post('txtabbrsatuan');
		$status		  = $this->input->post('txtStatus');

		$data = array(
			'nama_satuan' 	=> $namasatuan,
			'abbr'			=> $abbrsatuan,
			'status'		=> $status,
			'create_by'		=> strtoupper($this->session->userdata('user_name')),
			'create_date'	=> date('Y-m-d')
		);

		// echo "<pre>";
		// print_r($data);
		// echo "<pre>";

		$this->M_mastersatuan->simpan($data);
		redirect('Master_satuan');

	}

	function editData(){
		$id = $this->uri->segment(3);
		$data['getData'] = $this->M_mastersatuan->get_data($id);

		$this->template->display('Master_satuan/update', $data);
	}

	function updateData(){
		$id 		= $this->input->post('txtsatuanid');
		$namasatuan = $this->input->post('txtnamasatuan');
		$abbrsatuan = $this->input->post('txtabbrsatuan');
		$status		= $this->input->post('txtStatus');

		$data = array(
			'nama_satuan'	=> $namasatuan,
			'abbr'			=> $abbrsatuan,
			'status'		=> $status,
			'update_by'		=> strtoupper($this->session->userdata('user_name')),
			'update_date'	=> date('Y-m-d')
		);

		// echo "<pre>";
		// print_r($data);
		// echo "<pre>";

		$this->M_mastersatuan->update($id, $data);
		redirect('Master_satuan');
		
	}

	function delete(){
		$id 	= $this->uri->segment(3);

		$data = array (
			'status' 	=> '0',
		);

		$this->M_mastersatuan->update($id, $data);
		redirect('Master_satuan');
	}
}