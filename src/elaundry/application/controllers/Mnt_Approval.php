<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mnt_Approval extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_mntLaundry', 'm_penerimaan_laundry']);
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['get_monitoring']           = $this->M_mntLaundry->get_Vapproval();
        $data['get_MstStatusLaundry']     = $this->M_mntLaundry->get_MstStatusLaundry();
        $data['get_MstHargaLaundry']      = $this->M_mntLaundry->get_MstHargaLaundry();
        $data['get_MstPembayaranLaundry'] = $this->M_mntLaundry->get_MstPembayaranLaundry();
        $data['dt_allpos_laundry']        = $this->m_penerimaan_laundry->get_allpos_laundry();
        $this->template->display('tbl_trnLaundry/list_mnt_approval', $data);
    }

    function AjaxCariDataMntt()
    {
        $periode   = $this->input->post('periode');
        $bulan     = (int)$this->input->post('bulan');
        $tahun     = (int)$this->input->post('tahun');
        $status_tk = $this->input->post('tk_cek');
        $month     = '-' . str_pad($bulan, 2, '0', STR_PAD_LEFT);

        if ($status_tk == '1') {
            if ($bulan == 1) {
                $tgl_trans_now       = ($tahun - 1) . '-12-26';
                $tgl_trans_before    = ($tahun - 1) . '-12-26';
                $periodeapproval_now = $tahun . $month . '-16';
            } else {
                $prev                = str_pad($bulan - 1, 2, '0', STR_PAD_LEFT);
                $tgl_trans_now       = $tahun . $month . '-26';
                $tgl_trans_before    = $tahun . '-' . $prev . '-26';
                $periodeapproval_now = $tahun . $month . '-16';
            }
            $data['get_monitoring'] = $this->M_mntLaundry->get_monitoring_approve_kar(
                $tgl_trans_now,
                $tgl_trans_before,
                $periodeapproval_now,
                $status_tk
            );
        } else {
            $day                 = ($periode == 'p1') ? '01' : '16';
            $tgl_trans_now       = $tahun . $month . '-' . $day;
            $periodeapproval_now = $tahun . $month . '-' . $day;
            $data['get_monitoring'] = $this->M_mntLaundry->get_monitoring_approve(
                $tgl_trans_now,
                $periodeapproval_now,
                $status_tk
            );
        }

        $data['dt_allpos_laundry'] = $this->m_penerimaan_laundry->get_allpos_laundry();
        $this->load->view('tbl_trnLaundry/ajax/ajaxDataMonitoringApprove', $data);
    }

    function ModalDetailItem()
    {
        $id = $this->input->get('id');
        $data['getDataHdr']               = $this->m_penerimaan_laundry->get_dataHeaderid($id);
        $data['getDataTamu']              = $this->m_penerimaan_laundry->get_detailLaundry($id);
        $data['get_MstStatusLaundry']     = $this->m_penerimaan_laundry->get_MstStatusLaundry();
        $data['get_MstPembayaranLaundry'] = $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
        $data['get_MstHargaLaundry']      = $this->m_penerimaan_laundry->get_MstHargaLaundry();
        $data['get_MstKategory']          = $this->m_penerimaan_laundry->get_MstKategory();
        $data['get_vwItemKategory']       = $this->m_penerimaan_laundry->get_vwItemKategory();
        $this->load->view('tbl_trnLaundry/ajaxDetailMonitoring', $data);
    }

    public function showMntApproval()
    {
        if (!isset($_POST['draw'])) {
            show_error('Bad Request', 400);
            return;
        }

        $baseDataApp = $this->M_mntLaundry->get_datatables_approval();

        $data = [];
        $no   = (int)($_POST['start'] ?? 0);

        foreach ($baseDataApp as $field) {
            $no++;
            $row = [];
            $row[] = $no . '.';
            $row[] = $field->nama_laundry . ' (' . $field->alamat . ')';
            $row[] = $field->NoNota;
            $row[] = !empty($field->TglTransaksi) ? date('d-m-Y', strtotime($field->TglTransaksi)) : '';
            $row[] = !empty($field->SelesaiDate)  ? date('d-m-Y', strtotime($field->SelesaiDate))  : '';
            $row[] = !empty($field->DiambilDate)  ? date('d-m-Y', strtotime($field->DiambilDate))  : '';
            $row[] = $field->Nama;
            $row[] = $field->StatusKaryawan;
            $row[] = $field->NIK;
            $row[] = $field->JenisPembayaran;
            $row[] = $field->JenisLayanan;
            $row[] = number_format($field->TotalTagihan, 0, ',', '.');

            $statusColors = [1 => 'danger', 2 => 'warning', 3 => 'success', 4 => 'primary'];
            $color  = $statusColors[$field->IDStatusPelayanan] ?? 'default';
            $row[] = '<span class="label label-sm label-' . $color . '">' . htmlspecialchars($field->StatusPelayanan) . '</span>';

            $row[] = $field->DiambilBy;
            $row[] = $field->ApproveBy;
            $row[] = !empty($field->ApproveDate) ? date('d-m-Y', strtotime($field->ApproveDate)) : '';
            $row[] = '<a class="btn btn-sm sharp btn-success" onclick="detail(' . (int)$field->ID . ')">
                        <i class="fa fa-eye"></i> Lihat
                      </a>';
            $row[] = '';
            $data[] = $row;
        }

        $output = [
            'draw'            => (int)$_POST['draw'],
            'recordsTotal'    => $this->M_mntLaundry->count_all_approval(),
            'recordsFiltered' => $this->M_mntLaundry->count_filtered_approval(),
            'data'            => $data,
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }
}
