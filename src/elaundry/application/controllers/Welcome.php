<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set("Asia/Jakarta");

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $this->load->model(array('M_login', 'M_dashbord', 'm_penerimaan_laundry'));
    }

    public function index()
    {
        $group_user                       = $this->session->userdata('group_user');
        $ip_address                       = $this->session->userdata('ip_address');
        $data['Titel']                    = 'Home';
        $data['cekData']                  = $this->M_dashbord->get_cekData();
        // echo "<pre>";
        // print_r($group_user);
        // echo "<pre>";
        $data['status_laundry']           = '1';
        $pos_ldy                          = $this->input->post('pos_ldy');
        $data['getDataHeader']            = $this->m_penerimaan_laundry->getTrnLayananHdr($pos_ldy);
        $data['get_MstStatusLaundry']     = $this->m_penerimaan_laundry->get_MstStatusLaundry();
        $data['get_MstPembayaranLaundry'] = $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
        $data['get_MstHargaLaundry']      = $this->m_penerimaan_laundry->get_MstHargaLaundry();
        log_message('debug', 'ENVIRONMENT: ' . ENVIRONMENT);
        if ($ip_address == '192.168.0.194' || '192.168.0.195') {;
            $this->template->display('tbl_trnLaundry/list_telat_prg', $data);
        } else {
            $this->template->display('tbl_trnLaundry/list_telat', $data);
        }

        // $this->template->display('dashboard', $data);
    }

    function temp()
    {

        $this->template->display2('dashboard2');
    }

    function log_history()
    {
        $data['getData']   = $this->M_login->getHistory();
        // print_r($data['getData']);
        // exit;

        $this->template->display('log_history', $data);
    }

    function logout()
    {
        $signid = $this->session->userdata('sign_id');

        // status menjadi offline
        $userID = $this->session->userdata('user_id');
        $data['Status'] = 0;
        $sts = $this->M_login->cekstts($userID, $data);

        if ($signid <> '') {
            $this->M_login->simpan_log_out($signid);
        }

        $this->session->sess_destroy();
        redirect('Login');
    }
}
