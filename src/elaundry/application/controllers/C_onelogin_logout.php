<?php

date_default_timezone_set("Asia/Jakarta");


if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class C_onelogin_logout extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model(array('M_login'));
  }

  function index()
  {
    $signid = $this->session->userdata('signid');
    $this->M_login->simpan_log_out($signid);

    $this->unset_only();
    $this->load->view('errors/html/logout');
    // echo '<div align="center" style="width:100%;background-color:#F08519;"><img height="100%" src="' . base_url() . '/assets/out.png" alt=""></div>';

    //redirect('login');
  }

  function unset_only()
  {
    $user_data = $this->session->all_userdata();

    foreach ($user_data as $key => $value) {
      if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
        $this->session->unset_userdata($key);
      }
    }
  }

  function invalidaccess()
  {
    session_destroy();
    $this->load->view('errors/html/invalid');
    // echo '<div align="center" style="width:100%;background-color:#F08519;"><img height="100%" src="' . base_url() . '/assets/403.png" alt=""></div>';
    // exit();
  }
}
