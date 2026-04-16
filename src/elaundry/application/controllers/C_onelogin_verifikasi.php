<?php

date_default_timezone_set("Asia/Jakarta");


if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class C_onelogin_verifikasi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model(array('M_login'));
    if ($this->session->userdata('user_id')) {
      redirect('Welcome');
    }
  }

  function index()
  {
    $personalid     = $this->input->get('personalid');
    $personalstatus = $this->input->get('personalstatus');
    $appkey         = $this->input->get('appkey');

    $result = $this->M_login->login_onelogin($personalid, $personalstatus);
    if ($appkey == 'psgp1_elaundry' && $result != false && $result->num_rows() > 0) {
      $row = $result->row();
      $serverdate = $this->M_login->get_serverdate();
      // $this->session->set_userdata('username', $row->Username);
      // $this->session->set_userdata('nama', $row->Nama);
      // $this->session->set_userdata('jabatan', $row->Jabatan);
      // $this->session->set_userdata('departemen', $row->Departemen);
      // $this->session->set_userdata('groupid', $row->LevelID);
      // $this->session->set_userdata('groupname', $row->GroupName);
      // $this->session->set_userdata('serverdate', $serverdate);
      // $this->session->set_userdata('personal_id', $personalid);
      // $this->session->set_userdata('personalstatus', $personalstatus);

      $this->session->set_userdata('user_id', $row->LoginID);
      $this->session->set_userdata('user_name', $row->NamaUser);    //mengambil field UserName untuk disimpan di session
      $this->session->set_userdata('group_user', $row->GroupID);
      $this->session->set_userdata('nama', $row->NamaUser);
      $this->session->set_userdata('jabatan', $row->JabID);

      $this->simpan_log();
      // var_dump('masuk');die;
      //redirect('welcome', 'refresh');
      redirect('Welcome');
    } else {
      redirect('/C_onelogin_logout/invalidaccess', 'refresh');
      exit;
    }
  }

  public function index2()
  {
    $this->load->view('login');
  }


  public function login2()
  {
    $username = $this->input->get('username');
    $passwd = $this->input->get('password');
    if ($username === '' && $passwd === '') {
      $pesan = pesan("Masukkan user dan password!", pesan_peringatan());
      $this->session->set_flashdata('message', $pesan);
      redirect('login');
    }
    $checkres = $this->cekUser($username, $passwd);
    switch ($checkres) {
      case 100:
        redirect('Welcome');
        break;

      default:
        redirect('login');
        break;
    }
  }


  function loginUser()
  {
    $username = $this->input->post('txtIdUser');
    $passwd = $this->input->post('txtPasswd');

    if ($username === '' && $passwd === '') {
      $pesan = pesan("Masukkan user dan password!", pesan_peringatan());
      $this->session->set_flashdata('message', $pesan);
      redirect('login');
    }

    $checkres = $this->cekUser($username, $passwd);
    switch ($checkres) {
      case 100:
        redirect('Welcome');
        break;
      case 300:
        $pesan = pesan("Password Kadaluarsa.", pesan_error());
        $this->session->set_flashdata('message', $pesan);
        redirect('password');
        break;

      default:
        redirect('login');
        break;
    }
  }

  function cekUser($username, $passwd)
  {
    $cek_user = $this->M_login->cek_user($username);

    if ($cek_user->num_rows() > 0) {
      $row = $cek_user->row();
      if ($row->NotActive === 1) {
        $pesan = pesan("User Sudah Tidak Aktif Lagi.", pesan_aktif());
        $this->session->set_flashdata('message', $pesan);
        return 1;
      }

      if ($passwd === $row->LoginPassword) {
        $serverdate = $this->M_login->get_serverdate();
        $this->session->set_userdata('username', $username);
        // $this->session->set_userdata('username', $row->Username);
        // $this->session->set_userdata('nama', $row->Nama);
        // $this->session->set_userdata('jabatan', $row->Jabatan);
        // $this->session->set_userdata('departemen', $row->Departemen);
        // $this->session->set_userdata('groupid', $row->LevelID);

        $this->session->set_userdata('user_id', $row->LoginID);
        $this->session->set_userdata('user_name', $row->NamaUser);    //mengambil field UserName untuk disimpan di session
        $this->session->set_userdata('group_user', $row->GroupID);
        $this->session->set_userdata('nama', $row->NamaUser);
        $this->session->set_userdata('jabatan', $row->JabID);
        $this->session->set_userdata('personalid', $row->personalid);
        $this->session->set_userdata('serverdate', $serverdate);

        $this->simpan_log();
        $exp_date = date('Ymd', strtotime($row->LastUpdatePassword));
        $now_date = date('Ymd');
        if ($passwd == md5(sha1('123')) || $passwd == md5(sha1('1234')) || ($exp_date + 300) < $now_date) {
          return 300;
        } else {
          return 100;
        }
      } else {
        $pesan = pesan("Password Anda Salah.", pesan_error());
        $this->session->set_flashdata('message', $pesan);
        return 2;
      }
    } else {
      $pesan = pesan("User $username Tidak Terdaftar.", pesan_info());
      $this->session->set_flashdata('message', $pesan);
      return 0;
    }
  }

  function simpan_log()
  {
    $this->load->library(array('user_agent', 'mobile_detect', 'misc'));

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

    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $ipaddr = ($_SERVER['REMOTE_ADDR'] == '::1') ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];

    $info = array(
      'userid'        => strtoupper($this->session->userdata('user_id')),
      'tanggal'       => date('Y-m-d H:i:s'),
      'hostname'      => $hostname,
      'ipadress'      => $ipaddr,
      'device'        => $deviceType,
      'browser'       => $agent,
      'platform'      => $this->misc->platform(),
      'user_agent'    => $this->agent->agent_string()
    );

    $signid = $this->M_login->simpan_log($info);
    if ($signid === 0) {
      $this->session->set_userdata('signid', 0);
    } else {
      $this->session->set_userdata('signid', $signid);
    }
  }

  public function logout()
  {
    $username = $this->input->get('username');
    if ($username == $this->session->userdata('user_id')) {
      /* $this->session->sess_destroy();
			redirect('login'); */
      echo var_dump($username . 'yaya');
    } else {
      echo var_dump($username . ' mp mp');
    }
  }
}
