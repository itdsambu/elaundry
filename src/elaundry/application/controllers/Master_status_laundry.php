<?php
defined('BASEPATH') or exit('No Direct script Access Allowed');

class Master_status_laundry extends CI_Controller{
	function __construct(){
		parent:: __construct();

		$this->load->model('m_master_status_laundry');
		$this->load->library('user_agent');
		if(!$this->session->userdata('user_id')){
			redirect('login');
		}
	}

	public function index(){
		$listmasterstatus 			= $this->m_master_status_laundry->list_master_status_laundry();
		$data['listmasterstatus'] 	= $listmasterstatus;

		$this->template->display('master_status_laundry/list_status_laundry',$data);
	}

	function tambah(){
		$data 	= array(
			'action' 			=> site_url('Master_status_laundry/simpan_status_laundry'),
			'IDStatusPelayanan' => set_value('ID'),
			'StatusPelayanan' 	=> '',
			'NotActive' 		=> ''
		);

		$this->template->display('master_status_laundry/tambah_status_laundry',$data);
	}

	function edit($id){
		$laundry 	= $this->m_master_status_laundry->get_by_id($id)->row();
		$data 		= array(
			'action' 			=> site_url('master_status_laundry/update_status_laundry'),
			'IDStatusPelayanan' => $laundry->IDStatusPelayanan,
			'StatusPelayanan' 	=> $laundry->StatusPelayanan,
			'NotActive' 		=> $laundry->NotActive
		);

		$this->template->display('master_status_laundry/tambah_status_laundry',$data);
	}

	function simpan_status_laundry(){
		$StatusPelayanan 	= $this->input->post('StatusPelayanan');
		$NotActive 			= $this->input->post('NotActive');

		$data 	= array(
			'StatusPelayanan'	=> $StatusPelayanan,
			'NotActive' 	=> $NotActive,
			'CreatedBy' 	=> $this->session->userdata('user_name'),
			'CreatedDate' 	=> date('Y-m-d H:i:s'),
			'CreatedComp'	=> $this->agent->browser().' '.gethostbyaddr($_SERVER['REMOTE_ADDR']).' '.$this->agent->platform()
		);

		$this->m_master_status_laundry->simpan_master_status_laundry($data);
		redirect('Master_status_laundry?msg=success');
	}

	function update_status_laundry(){
		$IDStatusPelayanan 	= $this->input->post('IDStatusPelayanan');
		$StatusPelayanan 	= $this->input->post('StatusPelayanan');
		$Biaya 				= $this->input->post('Biaya');
		$NotActive 			= $this->input->post('NotActive');

		$data 	= array(
			'StatusPelayanan' 	=> $StatusPelayanan,
			'NotActive' 		=> $NotActive,
			'LastUpdatedBy' 	=> $this->session->userdata('user_name'),
			'LastUpdatedDate' 	=> date('Y-m-d H:i:s'),
			'LastUpdatedComp'	=> $this->agent->browser().' '.gethostbyaddr($_SERVER['REMOTE_ADDR']).' '.$this->agent->platform()
		);

		$this->m_master_status_laundry->update_master_status_laundry($IDStatusPelayanan,$data);
		redirect('Master_status_laundry?msg=success3');
	}

	function hapus($id){
		$this->m_master_status_laundry->hapus_datalist($id);
		redirect('Master_status_laundry?msg=success2');
	}
}
?>