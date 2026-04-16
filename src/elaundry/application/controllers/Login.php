<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('M_login');

        if ($this->session->userdata('user_id')) {
            redirect('Welcome');
        }
    }

    function index()
    {
        $this->session->flashdata('message', 'Silahkan LogIn menggunakan aplikasi OneLogin.');
        $this->load->view('Login');
    }

    function login2()
    {
        $this->load->view('Login2');
    }

    function login_user()
    {
        if (isset($_GET['username'])) {
            $userID = $_GET['username'];
            // $passID = md5(sha1($_GET['password']));
            $passID = $_GET['password'];

            $lo = $this->cekLogin($userID, $passID);
        } else {
            $userID = $this->input->post('username');
            $passID = md5(sha1($this->input->post('password')));

            $lo = $this->cekLogin1($userID, $passID);
        }

        // if (strtoupper($userID)=="ADMIN" and strtoupper($this->input->post('password'))=="ADMIN"){
        //     $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Failed! Your account is not active.</strong></div>");
        //     redirect('Login');
        // } else {
        // $lo = $this->cekLogin($userID,$passID);
        switch ($lo) {
            case 0:
                redirect('Login');
                break;
            case 1:
                redirect('Login');
                break;
            case 2:
                redirect('Login');
                break;
            case 3:
                redirect('Login');
                break;
            case 4:
                redirect('Login');
                break;
            case 10:
                redirect('Login');
                break;
            case 100:
                redirect('Welcome');
                break;
        }
        // }
    }

    function cekLogin($userID, $passID)
    {
        $log = $this->M_login->log_in($userID);

        $cek = $this->M_login->cekpass($userID, $passID);

        // status menjadi online
        $data['Status'] = 1;
        $sts = $this->M_login->cekstts($userID, $data);

        if ($log->num_rows() > 0) {
            $row = $log->row();
            if ($row->NotActive == 1) {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Failed! Your account is not active.</strong></div>");
                return 1;
            } elseif ($cek == true) {
                $this->session->set_userdata('user_id', $userID);
                $this->session->set_userdata('user_name', $row->NamaUser);    //mengambil field UserName untuk disimpan di session
                $this->session->set_userdata('group_user', $row->GroupID);
                $this->session->set_userdata('nama', $row->NamaUser);
                $this->session->set_userdata('jabatan', $row->JabID);
                $this->set_info_device();
                $this->simpan_log();
                // print_r($this->simpan_log());
                return 100;
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Failed! Wrong password.</strong></div>");
                return 3;
            }
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Failed! Account $userID is not active.</strong></div>");
            return 0;
        }
    }

    function cekLogin1($userID, $passID)
    {
        $log = $this->M_login->log_in($userID);
        $cek = $this->M_login->cekpass($userID, $passID);

        // status menjadi online
        $data['Status'] = 1;
        $sts = $this->M_login->cekstts($userID, $data);

        if ($log->num_rows() > 0) {
            $row = $log->row();
            if ($row->NotActive == 1) {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Failed! Your account is not active.</strong></div>");
                return 1;
            } elseif ($cek == true) {
                // if($row->GroupID == 1 || $row->GroupID == 8 || $row->GroupID == 112 || $row->GroupID == 165 || $row->GroupID == 170){
                $this->session->set_userdata('user_id', $userID);
                $this->session->set_userdata('user_name', $row->NamaUser);    //mengambil field UserName untuk disimpan di session
                $this->session->set_userdata('group_user', $row->GroupID);
                $this->session->set_userdata('nama', $row->NamaUser);
                $this->session->set_userdata('jabatan', $row->JabID);
                $this->session->set_userdata('personalid', $row->personalid);
                $this->set_info_device();
                $this->simpan_log();
                // print_r($this->simpan_log());
                return 100;
                // }else{
                //     $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Warning! Must use OneLogin.</strong></div>");
                //     return 10;
                // }
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Failed! Wrong password.</strong></div>");
                return 3;
            }
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Failed! Account $userID is not active.</strong></div>");
            return 0;
        }
    }

    function simpan_log()
    {
        $detect = new Mobile_Detect();

        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? '' : '') : 'PC');

        foreach ($detect->getRules() as $name => $regex) :
            $check = $detect->{'is' . $name}();
            if ($check == 'true') {
                $deviceType .= $name . ' ';
            }
        endforeach;

        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }

        $info = array(
            'tanggal'   => date('Y-m-d H:i:s'),
            'signin'    => date('Y-m-d H:i:s'),
            'userid'    => $this->session->userdata('user_id'),
            'hostname'  => $this->session->userdata('host_name'),
            'ipadress'  => $this->session->userdata('ip_address'),
            'device'    => $deviceType,
            'browser'   => $agent,
            'platform'  => $this->misc->platform(),
            'user_agent' => $this->agent->agent_string()
        );

        $signid = $this->M_login->simpan_log($info);
        if ($signid === 0) {
            $this->session->set_userdata('sign_id', 0);
        } else {
            $this->session->set_userdata('sign_id', $signid);
        }
    }

    function set_info_device()
    {
        $ipaddr = $_SERVER['REMOTE_ADDR'];
        $this->session->set_userdata('ip_address', $ipaddr);

        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->session->set_userdata('host_name', $hostname);
    }
}
