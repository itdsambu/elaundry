<?php
defined('BASEPATH') or exit('No Direct script Access Allowed');

class Master_item_laundry extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_master_item_laundry');
		$this->load->library('user_agent');
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		$listmasteritem 			= $this->m_master_item_laundry->list_master_item_laundry();
		$data['listmasteritem'] 	= $listmasteritem;

		$this->template->display('master_item_laundry/list_item_laundry', $data);
	}

	function tambah()
	{
		$list_kategory 	= $this->m_master_item_laundry->get_kategory();
		$data2 			= array('list_kategory' => $list_kategory);
		$data 			= array(
			'action' 		=> site_url('master_item_laundry/simpan_item_laundry'),
			'Id_Item'		=> '',
			'NamaItem' 		=> '',
			'Id_Kategory'	=> '',
			'NotActive' 	=> '',
			'singkatan' 	=> ''
		);

		$this->template->display('master_item_laundry/tambah_item_laundry', array_merge($data, $data2));
	}

	function edit($id)
	{
		$laundry 	= $this->m_master_item_laundry->get_by_id($id)->row();
		$list_kategory 	= $this->m_master_item_laundry->get_kategory();
		$data2 			= array('list_kategory' => $list_kategory);
		$data 		= array(
			'action' 		=> site_url('master_item_laundry/update_item_laundry'),
			'Id_Item' 		=> $laundry->Id_Item,
			'NamaItem'		=> $laundry->NamaItem,
			'Id_Kategory' 	=> $laundry->Id_Kategory,
			'NotActive' 	=> $laundry->NotActive,
			'singkatan' 	=> $laundry->singkatan
		);

		$this->template->display('master_item_laundry/tambah_item_laundry', array_merge($data, $data2));
	}

	function simpan_item_laundry()
	{
		$NamaItem 		= $this->input->post('NamaItem');
		$Id_Kategory 	= $this->input->post('Id_Kategory');
		$NotActive 		= $this->input->post('NotActive');
		$singkatan 		= $this->input->post('singkatan');

		$data 		= array(
			'NamaItem'		=> $NamaItem,
			'Id_Kategory'	=> $Id_Kategory,
			'NotActive'		=> $NotActive,
			'singkatan'		=> $singkatan,
			'CreatedBy' 	=> $this->session->userdata('user_name'),
			'CreatedDate' 	=> date('Y-m-d H:i:s'),
			'CreatedComp'	=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
		);

		$this->m_master_item_laundry->simpan_master_item_laundry($data);
		redirect('Master_item_laundry?msg=success');
	}

	function update_item_laundry()
	{
		$Id_Item 		= $this->input->post('Id_Item');
		$NamaItem 		= $this->input->post('NamaItem');
		$Id_Kategory 	= $this->input->post('Id_Kategory');
		$NotActive 		= $this->input->post('NotActive');
		$singkatan 		= $this->input->post('singkatan');

		$data 	= array(
			'NamaItem' 			=> $NamaItem,
			'Id_Kategory' 		=> $Id_Kategory,
			'NotActive' 		=> $NotActive,
			'singkatan' 		=> $singkatan,
			'LastUpdatedBy' 	=> $this->session->userdata('user_name'),
			'LastUpdatedDate' 	=> date('Y-m-d H:i:s'),
			'LastUpdatedComp'	=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
		);

		$this->m_master_item_laundry->update_master_item_laundry($Id_Item, $data);
		redirect('Master_item_laundry?msg=success3');
	}

	function hapus($id)
	{
		$this->m_master_item_laundry->hapus_datalist($id);
		redirect('Master_item_laundry?msg=success2');
	}
}
