<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mnt_Laundry extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model(array(['M_mntLaundry', 'M_dataTable', 'm_penerimaan_laundry']));
		define('FPDF_FONTPATH',  $this->config->item('fonts_path'));

		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index() {
		$ip_address         = $this->session->userdata('ip_address');

		$data['get_monitoring']              = $this->M_mntLaundry->get_Vlaundry();
		$data['get_MstPembayaranLaundry']    = $this->M_mntLaundry->get_MstPembayaranLaundry();
		$data['get_MstStatusLaundry']        = $this->M_mntLaundry->get_MstStatusLaundry();

		$this->template->display('tbl_trnLaundry/list_mnt_laundry', $data);
	}

	public function ajaxListDataMonitoring(){
		$tanggal_1          = 	$this->uri->segment(3);
		$tanggal_2          =	$this->uri->segment(4);
		$jenis_pembayaran   = 	$this->uri->segment(5);
		$status_pelanggan   = 	$this->uri->segment(6);
		$status_laundry     = 	$this->uri->segment(7);

		if ($status_laundry == 'SEDANG%20DIPROSES') {
			$laundry_status = 'SEDANG DIPROSES';
		} else if ($status_laundry == 'SELESAI%20DIKERJAKAN') {
			$laundry_status = 'SELESAI DIKERJAKAN';
		} else if ($status_laundry == 'TELAH%20DIAMBIL') {
			$laundry_status = 'TELAH DIAMBIL';
		} else {
			$laundry_status = $status_laundry;
		}

		if ($jenis_pembayaran == 'Potong%20Gaji') {
			$pembayaran = 'Potong Gaji';
		} else {
			$pembayaran = $jenis_pembayaran;
		}

		if ($status_pelanggan == 'HARIAN') {
			$StatusKaryawan	= 'HARIAN/BORONGAN';
		} else {
			$StatusKaryawan = $status_pelanggan;
		}

		// echo json_encode($status_pelanggan);
		$data['listData'] = $this->M_mntLaundry->getListData($tanggal_1, $tanggal_2, $StatusKaryawan, $pembayaran, $laundry_status);
		
		$this->load->view('tbl_trnLaundry/ajax/listDataMonitoring', $data);
	}

	public function ajaxFilterMntByStatus() {
		$tanggal_1          = $this->uri->segment(3);
		$tanggal_2          = $this->uri->segment(4);
		$status_pelanggan   = $this->uri->segment(5);

		if ($status_pelanggan == 'HARIAN') {
			$status = 'HARIAN/BORONGAN';
		} else {
			$status = $status_pelanggan;
		}

		$data['listData'] = $this->M_mntLaundry->getListDataFilterByStatus($tanggal_1, $tanggal_2, $status);

		// var_dump($status_pelanggan);
		$this->load->view('tbl_trnLaundry/ajax/listDataMonitoring', $data);
	}

	public function ajaxFilterMntByDate() {
		$tanggal_1    = $this->uri->segment(3);
		$tanggal_2    = $this->uri->segment(4);

		$data['listData'] = $this->M_mntLaundry->getListDataFilterByDate($tanggal_1, $tanggal_2);

		$this->load->view('tbl_trnLaundry/ajax/listDataMonitoring', $data);
	}

	function ModalDetailItem() {
		$id = $this->input->get('id');

		$data['getDataHdr']                 = $this->m_penerimaan_laundry->get_dataHeaderid($id);
		$data['getDataTamu']                = $this->m_penerimaan_laundry->get_detailLaundry($id); // ini tidak perlu lagi

		$data['get_MstStatusLaundry']       = $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry']   = $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry']        = $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['get_MstKategory']            = $this->m_penerimaan_laundry->get_MstKategory();
		$data['get_vwItemKategory']         = $this->m_penerimaan_laundry->get_vwItemKategory(); // ini tidak perlu lagi

		$ip_address = $this->session->userdata('ip_address');

		if ($ip_address == '192.168.0.194' || $ip_address == '192.168.0.196') {
			$this->load->view('tbl_trnLaundry/ajax/modalDetailMonitoring', $data);
		} else {
			$this->load->view('tbl_trnLaundry/ajaxDetailMonitoring', $data);
		}
	}

	function RestoreLap() {
		$id                   = $this->uri->segment(3);
		$IDStatusPelayanan    = 1;

		$data['resotoreLap']  = $this->M_mntLaundry->get_dataLaporanBy($id, $IDStatusPelayanan);
		redirect('Mnt_Laundry', 'refresh');
	}
} 
?>
