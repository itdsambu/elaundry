<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mnt_Laundry extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_mntLaundry', 'M_dataTable', 'm_penerimaan_laundry']);
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index()
    {
        // HAPUS get_Vlaundry() — tidak perlu load semua data,
        // DataTables sudah pakai server-side (AJAX) dari C_dataTables/show
        $data['get_MstPembayaranLaundry'] = $this->M_mntLaundry->get_MstPembayaranLaundry();
        $data['get_MstStatusLaundry']     = $this->M_mntLaundry->get_MstStatusLaundry();

        $this->template->display('tbl_trnLaundry/list_mnt_laundry', $data);
    }

    public function ajaxListDataMonitoring()
    {
        $tanggal_1        = $this->uri->segment(3);
        $tanggal_2        = $this->uri->segment(4);
        $jenis_pembayaran = $this->uri->segment(5);
        $status_pelanggan = $this->uri->segment(6);
        $status_laundry   = $this->uri->segment(7);

        $laundry_status = urldecode($status_laundry);
        $pembayaran     = urldecode($jenis_pembayaran);

        if ($status_pelanggan == 'HARIAN') {
            $StatusKaryawan = 'HARIAN/BORONGAN';
        } else {
            $StatusKaryawan = $status_pelanggan;
        }

        $data['listData'] = $this->M_mntLaundry->getListData($tanggal_1, $tanggal_2, $StatusKaryawan, $pembayaran, $laundry_status);
        $this->load->view('tbl_trnLaundry/ajax/listDataMonitoring', $data);
    }

    public function ajaxFilterMntByStatus()
    {
        $tanggal_1        = $this->uri->segment(3);
        $tanggal_2        = $this->uri->segment(4);
        $status_pelanggan = $this->uri->segment(5);

        $status = ($status_pelanggan == 'HARIAN') ? 'HARIAN/BORONGAN' : $status_pelanggan;

        $data['listData'] = $this->M_mntLaundry->getListDataFilterByStatus($tanggal_1, $tanggal_2, $status);
        $this->load->view('tbl_trnLaundry/ajax/listDataMonitoring', $data);
    }

    public function ajaxFilterMntByDate()
    {
        $tanggal_1 = $this->uri->segment(3);
        $tanggal_2 = $this->uri->segment(4);

        $data['listData'] = $this->M_mntLaundry->getListDataFilterByDate($tanggal_1, $tanggal_2);
        $this->load->view('tbl_trnLaundry/ajax/listDataMonitoring', $data);
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

        $ip_address = $this->session->userdata('ip_address');
        if ($ip_address == '192.168.0.194' || $ip_address == '192.168.0.196') {
            $this->load->view('tbl_trnLaundry/ajax/modalDetailMonitoring', $data);
        } else {
            $this->load->view('tbl_trnLaundry/ajaxDetailMonitoring', $data);
        }
    }

    function RestoreLap()
    {
        $id              = $this->uri->segment(3);
        $IDStatusPelayanan = 1;
        $this->M_mntLaundry->get_dataLaporanBy($id, $IDStatusPelayanan);
        redirect('Mnt_Laundry', 'refresh');
    }
}
