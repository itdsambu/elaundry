<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller{

	function __construct(){
		parent:: __construct();

		$this->load->model('m_jabatan');
		 if(!$this->session->userdata('user_id')){
            redirect('login');
        }
	}

	public function index(){

		$listjab 			= $this->m_jabatan->list_jabatan() ;
		$data['listjab'] 	= $listjab;

		$this->template->display('master_jabatan/list_jabatan',$data);
	}

	function tambah(){
		$data 	= array (
			'action' 	=> site_url('Jabatan/simpan_jab'),
			'idjab'		=> set_value('id_jab'),
			'nmajab'	=> '',
			'singkjab'	=> '',
			'status'	=> '',
		);

		$this->template->display('master_jabatan/tambah_jabatan', $data);
	}

	function edit($id){
		$cbo_dept 	= $this->m_jabatan->dropdown_departemen();
		$jab 	= $this->m_jabatan->get_by_id($id)->row();

		$data 	= array (
			'action'	=> site_url('Jabatan/update_jab'),
			'idjab'		=> $jab->ID_jab,
			'nmajab'	=> $jab->Nama_jab,
			'singkjab'	=> $jab->Singkatan_jab,
			'status'	=> $jab->Status,
		);

		$this->template->display('master_jabatan/tambah_jabatan', $data);
	}

	function hapus($id){
		$this->m_jabatan->hapus_jabatan($id);
		redirect('Jabatan');
	}

	function simpan_jab(){
		$nmajab 	= $this->input->post('nama_jab');
		$singkjab 	= $this->input->post('singk_jab');
		$status 	= $this->input->post('status');

		$data 		= array (
			'Nama_jab'		=> $nmajab,
			'Singkatan_jab'	=> $singkjab,
			'Status'		=> $status,
			'Createdby'		=> $this->session->userdata('user_name'),
			'Createddate'	=> date('Y-m-d H:i:s'),
		);

		$this->m_jabatan->simpan_jabatan($data);
		redirect('Jabatan');
	}

	function update_jab(){
		$idjab 		= $this->input->post('id_jab');
		$nmajab 	= $this->input->post('nama_jab');
		$singkjab 	= $this->input->post('singk_jab');
		$status 	= $this->input->post('status');

		$data 		= array (
			'Nama_jab'		=> $nmajab,
			'Singkatan_jab'	=> $singkjab,
			'Status' 		=> $status,
			'Updateby'		=> $this->session->userdata('user_name'),
			'Updatedate'	=> date('Y-m-d H:i:s'),
		);

		$this->m_jabatan->update_jabatan($idjab,$data);
		redirect('Jabatan');
	}
}
?>