<?php
defined('BASEPATH') or exit('No Direct script Access Allowed');

class Master_kategory_laundry extends CI_Controller{
	function __construct(){
		parent:: __construct();

		$this->load->model('m_master_kategory_laundry');
		$this->load->library('user_agent');
		if(!$this->session->userdata('user_id')){
			redirect('login');
		}
	}

	public function index(){
		$listmasterkategory 			= $this->m_master_kategory_laundry->list_master_kategory_laundry();
		$data['listmasterkategory'] 	= $listmasterkategory;

		$this->template->display('master_kategory_laundry/list_kategory_laundry',$data);
	}

	function tambah(){
		$data 	= array(
			'action' 			=> site_url('Master_kategory_laundry/simpan_kategory_laundry'),
			'Id_Kategory' 		=> set_value('Id_Kategory'),
			'NamaKategory'		=> '',
			'NotActive' 		=> ''
		);

		$this->template->display('master_kategory_laundry/tambah_kategory_laundry',$data);
	}

	function edit($id){
		$laundry 	= $this->m_master_kategory_laundry->get_by_id($id)->row();
		$data 		= array(
			'action' 			=> site_url('master_kategory_laundry/update_kategory_laundry'),
			'Id_Kategory' 		=> $laundry->Id_Kategory,
			'NamaKategory' 		=> $laundry->NamaKategory,
			'NotActive' 		=> $laundry->NotActive
		);

		$this->template->display('master_kategory_laundry/tambah_kategory_laundry',$data);
	}

	function simpan_kategory_laundry(){
		$NamaKategory 		= $this->input->post('NamaKategory');
		$NotActive 			= $this->input->post('NotActive');

		$data 	= array(
			'NamaKategory'	=> $NamaKategory,
			'NotActive' 	=> $NotActive,
			'CreatedBy' 	=> $this->session->userdata('user_name'),
			'CreatedDate' 	=> date('Y-m-d H:i:s'),
			'CreatedComp'	=> $this->agent->browser().' '.gethostbyaddr($_SERVER['REMOTE_ADDR']).' '.$this->agent->platform()
		);

		$this->m_master_kategory_laundry->simpan_master_kategory_laundry($data);
		redirect('Master_kategory_laundry?msg=success');
	}

	function update_kategory_laundry(){
		$Id_Kategory 		= $this->input->post('Id_Kategory');
		$NamaKategory 		= $this->input->post('NamaKategory');
		$Biaya 				= $this->input->post('Biaya');
		$NotActive 			= $this->input->post('NotActive');

		$data 	= array(
			'NamaKategory' 		=> $NamaKategory,
			'NotActive' 		=> $NotActive,
			'LastUpdatedBy' 	=> $this->session->userdata('user_name'),
			'LastUpdatedDate' 	=> date('Y-m-d H:i:s'),
			'LastUpdatedComp'	=> $this->agent->browser().' '.gethostbyaddr($_SERVER['REMOTE_ADDR']).' '.$this->agent->platform()
		);

		$this->m_master_kategory_laundry->update_master_kategory_laundry($Id_Kategory,$data);
		redirect('Master_kategory_laundry?msg=success3');
	}

	function hapus($id){
		$this->m_master_kategory_laundry->hapus_datalist($id);
		redirect('Master_kategory_laundry?msg=success2');
	}
}
?>