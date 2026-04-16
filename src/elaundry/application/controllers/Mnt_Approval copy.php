<?php
	
	defined('BASEPATH') or exit('No direct script access allowed');
	
	class Mnt_Approval extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			
			$this->load->model([['M_mntLaundry', 'm_penerimaan_laundry']]);
			define('FPDF_FONTPATH', $this->config->item('fonts_path'));
			if (!$this->session->userdata('user_id')) {
				redirect('login');
			}
		}
		
		public function index() {
			$data['get_monitoring']              = $this->M_mntLaundry->get_Vapproval();
			$data['get_MstStatusLaundry']        = $this->M_mntLaundry->get_MstStatusLaundry();
			$data['get_MstHargaLaundry']         = $this->M_mntLaundry->get_MstHargaLaundry();
			$data['get_MstPembayaranLaundry']    = $this->M_mntLaundry->get_MstPembayaranLaundry();
			$data['dt_allpos_laundry']           = $this->m_penerimaan_laundry->get_allpos_laundry();
			
		
			$this->template->display('tbl_trnLaundry/list_mnt_approval', $data);
		}
		function AjaxCariDataMntt() {
			$periode   = $this->input->post('periode');
			$bulan     = $this->input->post('bulan');
			$tahun     = $this->input->post('tahun');
			$status_tk = $this->input->post('tk_cek');
			
			if ($bulan == '1' || $bulan == '2' || $bulan == '3' || $bulan == '4' || $bulan == '5' || $bulan == '6' || $bulan == '7' || $bulan == '8' || $bulan == '9') {
				$month = '-0' . $bulan;
			} else {
				$month = '-' . $bulan;
			}
			
			// Karyawan
			if ($status_tk == '1') {
				if ($month == '-01') {
					$tgl_trans_now          = $tahun . $month . '-26';
					$tgl_trans_before       = $tahun - 1 . ((int)$bulan - 13) . '-26';
					$periodeapproval_now    = $tahun . $month . '-16';
					$periodeapproval_before = $tahun - 1 . ((int)$bulan - 12) . '-16';
					
				} elseif ($month == '-02' || $month == '-03' || $month == '-04' || $month == '-05' || $month == '-06' || $month == '-07' || $month == '-08' || $month == '-09' || $month == '-10') {
					$tgl_trans_now          = $tahun . $month . '-26';
					$tgl_trans_before       = $tahun . '-0' . ((int)$bulan - 1) . '-26';
					$periodeapproval_now    = $tahun . $month . '-16';
					$periodeapproval_before = $tahun . '-0' . ((int)$bulan - 1) . '-16';
				} else {
					$tgl_trans_now          = $tahun . '-' . $month . '-26';
					$tgl_trans_before       = $tahun . '-' . ((int)$bulan - 1) . '-26';
					$periodeapproval_now    = $tahun . $month . '-16';
					$periodeapproval_before = $tahun . '-' . ((int)$bulan - 1) . '-16';
				}
				$data['get_monitoring']    = $this->M_mntLaundry->get_monitoring_approve_kar($tgl_trans_now, $tgl_trans_before, $periodeapproval_now, $status_tk);
			} else {
				// Harian/Borongan or CV sytem 2 kali gajian 2 kali potongan
				if ($periode == 'p1') {
					if ($month == '-01') {
						$tgl_trans_now       = $tahun . $month . '-01';
						$periodeapproval_now = $tahun . $month . '-01';
					} elseif ($month == '-02' || $month == '-03' || $month == '-04' || $month == '-05' || $month == '-06' || $month == '-07' || $month == '-08' || $month == '-09' || $month == '-10') {
						$tgl_trans_now       = $tahun . $month . '-01';
						$periodeapproval_now = $tahun . $month . '-01';
					} else {
						$tgl_trans_now       = $tahun . $month . '-01';
						$periodeapproval_now = $tahun . $month . '-01';
					}
					$data['get_monitoring']    = $this->M_mntLaundry->get_monitoring_approve($tgl_trans_now, $periodeapproval_now, $status_tk);
				} else {
					if ($month == '-01') {
						$tgl_trans_now       = $tahun . $month . '-16';
						$periodeapproval_now = $tahun . $month . '-16';
					} elseif ($month == '-02' || $month == '-03' || $month == '-04' || $month == '-05' || $month == '-06' || $month == '-07' || $month == '-08' || $month == '-09' || $month == '-10') {
						$tgl_trans_now       = $tahun . $month . '-16';
						$periodeapproval_now = $tahun . $month . '-16';
					} else {
						$tgl_trans_now       = $tahun . $month . '-16';
						$periodeapproval_now = $tahun . $month . '-16';
					}
					$data['get_monitoring']    = $this->M_mntLaundry->get_monitoring_approve($tgl_trans_now, $periodeapproval_now, $status_tk);
				}
			}
			
			$data['dt_allpos_laundry'] = $this->m_penerimaan_laundry->get_allpos_laundry();
			$this->load->view('tbl_trnLaundry/ajax/ajaxDataMonitoringApprove', $data);
		}
		
		function ModalDetailItem() {
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

		// instalasi data Table
		public function showMntApproval() {
            $baseDataApp    = $this->M_mntLaundry->get_datatables();
    
            $data           = array();
            $no             = $_POST['start'];

            foreach ($baseDataApp as $field) {
                $no++;
                $row = array();
                $row[] = $no . '.';
                $row[] = $field->nama_laundry . ' (' . $field->alamat . ')';
                $row[] = $field->NoNota;
                $row[] = date('Y-m-d', strtotime($field->TglTransaksi));
                $row[] = isset($field->SelesaiDate) != null ? date('Y-m-d', strtotime($field->SelesaiDate)) : '';
                $row[] = isset($field->DiambilDate) != null ? date('Y-m-d', strtotime($field->DiambilDate)) : '';
                $row[] = $field->Nama;
                $row[] = $field->StatusKaryawan;
                $row[] = $field->NIK;
                $row[] = $field->JenisPembayaran;
                $row[] = $field->JenisLayanan;
                $row[] = number_format($field->TotalTagihan, 0, ',', '.');
                
                if ($field->IDStatusPelayanan == 1) {
                    $status = '<span class="label label-sm label-danger">' . $field->StatusPelayanan . '</span>';
                } elseif ($field->IDStatusPelayanan == 2) {
                    $status = '<span class="label label-sm label-warning">' . $field->StatusPelayanan . '</span>';
                } elseif ($field->IDStatusPelayanan == 3) {
                    $status = '<span class="label label-sm label-success">' . $field->StatusPelayanan . '</span>';
                } elseif ($field->IDStatusPelayanan == 4) {
                    $status = '<span class="label label-sm label-primary">' . $field->StatusPelayanan . '</span>';
                }
                
                $row[] = $status;
    
                $row[] = $field->DiambilBy;
                $row[] = $field->ApproveBy;
                $row[] = $field->ApproveDate;
                $row[] = '<a class="btn btn-sm sharp btn-success" id="'. $field->ID .'" onclick="detail(this.id)">
                    <i class="fa fa-eye"></i>
                    Lihat
                </a>';
    
                $row[] = '';
                $data[] = $row;
            }
    
            $output = array(
                "draw"            => $_POST['draw'],
                "recordsTotal"    => $this->M_mntLaundry->count_all(),
                "recordsFiltered" => $this->M_mntLaundry->count_filtered(),
                "data"            => $data,
            );

            echo json_encode($output);
        }
	}