<?php
	
	/** @noinspection ALL */
	defined('BASEPATH') or exit('No direct script access allowed');
	
	class Mnt_Approval extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			
			$this->load->model([['M_mntLaundry', 'm_penerimaan_laundry']]);
			define('FPDF_FONTPATH', $this->config->item('fonts_path'));
			// $this->load->library('Fpdf');
			if (!$this->session->userdata('user_id')) {
				redirect('login');
			}
		}
		
		public function index()
		{
			$data['get_monitoring'] = $this->M_mntLaundry->get_Vapproval();
			$data['get_MstStatusLaundry'] = $this->M_mntLaundry->get_MstStatusLaundry();
			$data['get_MstHargaLaundry'] = $this->M_mntLaundry->get_MstHargaLaundry();
			$data['get_MstPembayaranLaundry'] = $this->M_mntLaundry->get_MstPembayaranLaundry();
			$data['dt_allpos_laundry'] = $this->m_penerimaan_laundry->get_allpos_laundry();
			$this->template->display('tbl_trnLaundry/list_mnt_approval', $data);
		}
		
		// function AjaxCariDataMnt()
		// {
		// 	$tanggal_1 = $this->input->post('tanggal_1');
		// 	$tanggal_2 = $this->input->post('tanggal_2');
		// 	$status_pelanggan = $this->input->post('status_pelanggan');
		
		// 	if ($tanggal_1 == NULL && $tanggal_2 == NULL && $status_pelanggan == '0') {
		// 		$data['get_monitoring'] = $this->M_mntLaundry->get_vApproveAll();
		// 	} elseif ($tanggal_1 != NULL && $tanggal_2 != NULL) {
		// 		if ($status_pelanggan == '0') {
		// 			$data['get_monitoring'] = $this->M_mntLaundry->get_vApproveByTanggal($tanggal_1, $tanggal_2);
		// 		} else {
		// 			$data['get_monitoring'] = $this->M_mntLaundry->get_vApproveByTwoDate($tanggal_1, $tanggal_2, $status_pelanggan);
		// 		}
		// 	} elseif ($tanggal_1 == NULL && $tanggal_2 == NULL && $status_pelanggan != '') {
		// 		$data['get_monitoring'] = $this->M_mntLaundry->get_vOnlyKaryawan($status_pelanggan);
		// 	}
		// 	$this->load->view('tbl_trnLaundry/ajaxDataMonitoringApprove', $data);
		// }
		function AjaxCariDataMntt()
		{
			$periode = $this->input->post('periode');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$status_tk = $this->input->post('tk_cek');
			//cek lagi bulannya, yg bulan 1 harus diselipakn 0
			if ($bulan == '1' || $bulan == '2' || $bulan == '3' || $bulan == '4' || $bulan == '5' || $bulan == '6' || $bulan == '7' || $bulan == '8' || $bulan == '9') {
				$intBulan = '0' . $bulan;
			} else {
				$intBulan = $bulan;
			}
			if ($periode == 'p1') {
				$jarak1 = $tahun . '-' . $intBulan . '-01';
				$jarak2 = $tahun . '-' . $intBulan . '-16';
				$periodeapp = $tahun . '-' . $intBulan . '-01';
			} else if ($periode == 'p2') {
				$jarak1 = $tahun . '-' . $intBulan . '-16';
				$jarak2 = $tahun . '-' . ((int)$intBulan + 1) . '-01';
				$periodeapp = $tahun . '-' . $intBulan . '-16';
			} else if ($periode == 'bulanan') {
				if ($intBulan == '01') {
					$jarak1 = $tahun . '-' . $intBulan . '-26';
				} else {
					$jarak1 = $tahun . '-' . ((int)$intBulan - 1) . '-26';
				}
				// $jarak1     = $tahun . '-' . ((int)$intBulan - 1) . '-26';
				$jarak2 = $tahun . '-' . $intBulan . '-26';
				$periodeapp = $tahun . '-' . $intBulan . '-16';
			}
			
			//var_dump($jarak1);
			//die;
			
			$data['dt_allpos_laundry'] = $this->m_penerimaan_laundry->get_allpos_laundry();
			
			if ($intBulan == '01' && $status_tk == '1') {
				$data['get_monitoring'] = $this->M_mntLaundry->get_monitoring_approve_kar($jarak1, $status_tk, $periodeapp);
			} else {
				$data['get_monitoring'] = $this->M_mntLaundry->get_monitoring_approve($jarak1, $status_tk, $periodeapp);
			}
			$this->load->view('tbl_trnLaundry/ajaxDataMonitoringApprove', $data);
		}
		
		function ModalDetailItem()
		{
			$id = $this->input->get('id');
			
			$data['getDataHdr'] = $this->m_penerimaan_laundry->get_dataHeaderid($id);
			$data['getDataTamu'] = $this->m_penerimaan_laundry->get_detailLaundry($id);
			
			$data['get_MstStatusLaundry'] = $this->m_penerimaan_laundry->get_MstStatusLaundry();
			$data['get_MstPembayaranLaundry'] = $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
			$data['get_MstHargaLaundry'] = $this->m_penerimaan_laundry->get_MstHargaLaundry();
			$data['get_MstKategory'] = $this->m_penerimaan_laundry->get_MstKategory();
			$data['get_vwItemKategory'] = $this->m_penerimaan_laundry->get_vwItemKategory();
			$this->load->view('tbl_trnLaundry/ajaxDetailMonitoring', $data);
		}
	}
