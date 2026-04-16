<?php /** @noinspection SpellCheckingInspection */
defined('BASEPATH') OR exit('No dierct script access allowed');

class Departemen extends CI_Controller{

	function __construct(){
		parent:: __construct();

		$this->load->model('m_departemen');
		 if(!$this->session->userdata('user_id')){
            redirect('login');
        }
	}

	public function index()
	{
		$listdept 			= $this->m_departemen->list_departemen();
		$data['Titel']      = 'MASTER - DEPARTEMEN';
		$data['listdept'] 	= $listdept;
		$this->template->display('master_departemen/list_departemen', $data);
	}

	function tambah(){
		$data 	= array (
			'action'	=> site_url('Departemen/simpan_dept'),
			'iddept'	=> set_value('id_dept'),
			'namadept'	=> '',
			'singkdept'	=> '',
			'inactive'	=> '',
			'divisi'	=> '',
		);

		$this->template->display('master_departemen/tambah_departemen', $data);
	}

	function edit($id){
		$dept 	= $this->m_departemen->get_by_id($id)->row();
		$data	= array (
			'action'	=> site_url('Departemen/update_dept'),
			'iddept'	=> $dept->ID_dept,
			'namadept'	=> $dept->Nama_dept,
			'singkdept'	=> $dept->Singkatan_dept,
			'inactive' 	=> $dept->Inactive,
			'divisi'	=> $dept->Divisi,
		);

		$this->template->display('master_departemen/tambah_departemen',$data);
	}

	function hapus($id){
		$this->m_departemen->hapus_departemen($id);
		redirect('Departemen?msg=success');
	}

	function simpan_dept(){
		$namadept 	= $this->input->post('nama_dept');
		$singkdept 	= $this->input->post('singkatan_dept');
		$inactive 	= $this->input->post('inactive');
		$divisi 	= $this->input->post('divisi');

		$data 		= array (
			'Nama_dept'			=> $namadept,
			'Singkatan_dept'	=> $singkdept,
			'Inactive'			=> $inactive,
			'Divisi'			=> $divisi,
			'Createdby'			=> $this->session->userdata('user_name'),
			'Createddate'		=> date('Y-m-d H:i:s'),
		);

		$this->m_departemen->simpan_departemen($data);
		redirect('Departemen');

	}

	function update_dept(){
		$iddept 	= $this->input->post('id_dept');
		$namadept 	= $this->input->post('nama_dept');
		$singkdept 	= $this->input->post('singkatan_dept');
		$inactive 	= $this->input->post('inactive');
		$divisi 	= $this->input->post('divisi');

		$data 		= array (
			'Nama_dept'			=> $namadept,
			'Singkatan_dept'	=> $singkdept,
			'inactive'			=> $inactive,
			'Divisi'			=> $divisi,
			'Updateby'			=> $this->session->userdata('user_name'),
			'Updatedate'		=> date('Y-m-d H:i:s'),
		);

		$this->m_departemen->update_departemen($iddept,$data);
		redirect('Departemen');
	}
}
