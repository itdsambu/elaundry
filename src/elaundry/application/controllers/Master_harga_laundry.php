<?php
defined('BASEPATH') or exit('No Direct script Access Allowed');

class Master_harga_laundry extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_master_harga_laundry');
		$this->load->library('user_agent');
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		$listmasterharga 			= $this->m_master_harga_laundry->list_master_harga_laundry();
		$data['listmasterharga'] 	= $listmasterharga;

		$this->template->display('master_harga_laundry/list_harga_laundry', $data);
	}

	function tambah()
	{
		$data 	= array(
			'action' 		=> site_url('Master_harga_laundry/simpan_harga_laundry'),
			'IDLayanan' 	=> set_value('ID'),
			'JenisLayanan' 	=> '',
			'Biaya' 		=> '',
			'NotActive' 	=> '',
			'is_kilat' 		=> ''
		);

		$this->template->display('master_harga_laundry/tambah_harga_laundry', $data);
	}

	function edit($id)
	{
		$laundry 	= $this->m_master_harga_laundry->get_by_id($id)->row();
		$data 		= array(
			'action' 		=> site_url('master_harga_laundry/update_harga_laundry'),
			'IDLayanan' 	=> $laundry->IDLayanan,
			'JenisLayanan' 	=> $laundry->JenisLayanan,
			'Biaya' 		=> $laundry->Biaya,
			'NotActive' 	=> $laundry->NotActive,
			'is_kilat' 		=> $laundry->is_kilat
		);

		$this->template->display('master_harga_laundry/tambah_harga_laundry', $data);
	}

	function simpan_harga_laundry()
	{
		$JenisLayanan 	= $this->input->post('JenisLayanan');
		$Biaya 			= $this->input->post('Biaya');
		$NotActive 		= $this->input->post('NotActive');
		$is_kilat 		= $this->input->post('is_kilat');

		$data 	= array(
			'JenisLayanan'	=> $JenisLayanan,
			'Biaya' 		=> $Biaya,
			'NotActive' 	=> $NotActive,
			'is_kilat' 		=> $is_kilat,
			'CreatedBy' 	=> $this->session->userdata('user_name'),
			'CreatedDate' 	=> date('Y-m-d H:i:s'),
			'CreatedComp'	=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
		);

		$this->m_master_harga_laundry->simpan_master_harga_laundry($data);
		redirect('Master_harga_laundry?msg=success');
	}

	function update_harga_laundry()
	{
		$IDLayanan 		= $this->input->post('IDLayanan');
		$JenisLayanan 	= $this->input->post('JenisLayanan');
		$Biaya 			= $this->input->post('Biaya');
		$NotActive 		= $this->input->post('NotActive');
		$is_kilat 		= $this->input->post('is_kilat');

		$data 	= array(
			'JenisLayanan' 		=> $JenisLayanan,
			'Biaya' 			=> $Biaya,
			'NotActive' 		=> $NotActive,
			'is_kilat' 			=> $is_kilat,
			'LastUpdatedBy' 	=> $this->session->userdata('user_name'),
			'LastUpdatedDate' 	=> date('Y-m-d H:i:s'),
			'LastUpdatedComp'	=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
		);

		$this->m_master_harga_laundry->update_master_harga_laundry($IDLayanan, $data);
		redirect('Master_harga_laundry?msg=success3');
	}

	function hapus($id)
	{
		$this->m_master_harga_laundry->hapus_datalist($id);
		redirect('Master_harga_laundry?msg=success2');
	}
}
