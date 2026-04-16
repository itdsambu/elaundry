<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mnt_Laundry extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model(array(['M_mntLaundry', 'm_penerimaan_laundry']));
		define('FPDF_FONTPATH',  $this->config->item('fonts_path'));
		// $this->load->library('Fpdf');
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		$tanggal_1 = $this->input->post('tanggal_1');
		$tanggal_2 = $this->input->post('tanggal_2');
		$status_pelanggan = $this->input->post('status_pelanggan');
		$jenis_pembayaran = $this->input->post('jenis_pembayaran');
		$status_laundry = $this->input->post('status_laundry');
		// print_r($tanggal_1);

		$data['get_MstStatusLaundry'] 		= $this->M_mntLaundry->get_MstStatusLaundry();
		$data['get_MstHargaLaundry'] 		= $this->M_mntLaundry->get_MstHargaLaundry();
		$data['get_MstPembayaranLaundry'] 	= $this->M_mntLaundry->get_MstPembayaranLaundry();
		$data['dt_allpos_laundry']			= $this->m_penerimaan_laundry->get_allpos_laundry();
		if (isset($_POST['btntampil'])) {
			if ($tanggal_1 == '' && $tanggal_2 == '' && $status_pelanggan == '' && $jenis_pembayaran == '' && $status_laundry == '0') {
				$data['get_monitoring'] = $this->M_mntLaundry->get_vLaundryAll();
			} else if ($tanggal_1 != '' && $tanggal_2 != '') {
				$data['get_monitoring'] = $this->M_mntLaundry->get_vLaundryByTwoDate($tanggal_1, $tanggal_2, $status_pelanggan, $jenis_pembayaran, $status_laundry);
			} else {
				$data['get_monitoring'] = $this->M_mntLaundry->get_vLaundryByOneField($tanggal_1, $tanggal_2, $status_pelanggan, $jenis_pembayaran, $status_laundry);
			}
		} else {
			$data['get_monitoring'] = $this->M_mntLaundry->get_Vlaundry();
		}

		// Agar tidak bentrok saja dengan productions nya
		if ($this->session->userdata('ip_address') == '192.168.0.194') {
			$this->template->display('tbl_trnLaundry/list_mnt_laundry_dev', $data);
		} else {
			$this->template->display('tbl_trnLaundry/list_mnt_laundry', $data);
		}
	}

	// function AjaxCariDataMnt()
	// {
	// 	$tanggal_1 = $this->input->post('tanggal_1');
	// 	$tanggal_2 = $this->input->post('tanggal_2');
	// 	$status_pelanggan = $this->input->post('status_pelanggan');
	// 	$jenis_pembayaran = $this->input->post('jenis_pembayaran');
	// 	$status_laundry = $this->input->post('status_laundry');

	// 	if ($tanggal_1 == '' && $tanggal_2 == '' && $status_pelanggan == '' && $jenis_pembayaran == '' && $status_laundry == '0') {
	// 		$data['get_monitoring'] = $this->M_mntLaundry->get_vLaundryAll();
	// 	} else if ($tanggal_1 != '' && $tanggal_2 != '') {
	// 		$data['get_monitoring'] = $this->M_mntLaundry->get_vLaundryByTwoDate($tanggal_1, $tanggal_2, $status_pelanggan, $jenis_pembayaran, $status_laundry);
	// 	} else {
	// 		$data['get_monitoring'] = $this->M_mntLaundry->get_vLaundryByOneField($tanggal_1, $tanggal_2, $status_pelanggan, $jenis_pembayaran, $status_laundry);
	// 	}
	// 	$this->load->view('tbl_trnLaundry/ajaxDataMonitoring', $data);
	// }

	function ModalDetailItem()
	{
		$id = $this->input->get('id');

		$data['getDataHdr'] 	= $this->m_penerimaan_laundry->get_dataHeaderid($id);
		$data['getDataTamu'] 	= $this->m_penerimaan_laundry->get_detailLaundry($id);

		$data['get_MstStatusLaundry'] 		= $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry'] 	= $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry'] 		= $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['get_MstKategory'] 			= $this->m_penerimaan_laundry->get_MstKategory();
		$data['get_vwItemKategory'] 		= $this->m_penerimaan_laundry->get_vwItemKategory();
		$this->load->view('tbl_trnLaundry/ajaxDetailMonitoring', $data);
	}

	// DataTables
	
	// End DataTables
}
