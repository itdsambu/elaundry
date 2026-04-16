<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Beban extends CI_Controller{

	function __construct(){
		parent:: __construct();

		$this->load->model('m_beban');
		 if(!$this->session->userdata('user_id')){
            redirect('login');
        }
	}

	public function index(){
		$listbeban 			= $this->m_beban->list_beban();
		$data['listbeban'] 	= $listbeban;

		$this->template->display('master_beban/list_beban',$data);
	}

	function tambah(){
		$data 	= array(
			'action' 			=> site_url('Beban/simpan_beban'),
			'idbeban'			=> set_value('idbeban'),
			'beban'				=> '',
			'tipetransaksi' 	=> '',
		);

		$this->template->display('master_beban/tambah_beban',$data);
	}

	function editbeban($id){
		$beban 		= $this->m_beban->get_by_id($id)->row();
		$data 		= array(
			'action' 		=> site_url('Beban/update_beban'),
			'idbeban' 		=> $beban->ID_beban,
			'beban' 		=> $beban->Beban,
			'tipetransaksi'	=> $beban->Type_transaksi,
		);

		$this->template->display('master_beban/tambah_beban',$data);
	}

	function hapusbeban($id){
		$this->m_beban->hapus_beban($id);
		redirect('Beban');
	}

	function simpan_beban(){
		$beban 			= $this->input->post('beban');
		$tipetransaksi 	= $this->input->post('tipetransaksi');

		$data 			= array(
			'Beban' 			=> $beban,
			'Type_transaksi'	=> $tipetransaksi,
			'Createdby'			=> $this->session->userdata('user_name'),
			'Createddate'		=> date('Y-m-d H:i:s'),
		);

		$this->m_beban->simpan_beban($data);
		redirect('Beban');
	}

	function update_beban(){
		$idbeban 		= $this->input->post('idbeban');
		$beban 			= $this->input->post('beban');
		$tipetransaksi 	= $this->input->post('tipetransaksi');

		$data 			= array(
			'Beban' 			=> $beban,
			'Type_transaksi'	=> $tipetransaksi,
			'Updateby' 			=> $this->session->userdata('user_name'),
			'Updatedate' 		=> date('Y-m-d H:i:s'),
		);

		$this->m_beban->update_beban($idbeban,$data);
		redirect('Beban');
	}

	function hapus(){
		$this->m_beban->hapus_dataperrow($id);
		redirect('Beban');
	}
}
?>