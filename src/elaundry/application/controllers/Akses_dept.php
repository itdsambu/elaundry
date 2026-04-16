<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Akses_dept extends CI_Controller{

	function __construct(){
		parent:: __construct();

		$this->load->model('M_akses_dept');
		 if(!$this->session->userdata('user_id')){
            redirect('login');
        }
	}

	function index(){

		$data['getGroupUser']  = $this->M_akses_dept->get_dataGroupUser();
		$data['getDepartemen'] = $this->M_akses_dept->get_dataDepartemen();
		$this->template->display('utility/akses_dept/input',$data);
	}

	function save(){
		$groupname = $this->input->post('groupname');
		$chkid     = $this->input->post('checkbox');
        $jummenu   = count($this->input->post('checkbox'));

        for ($i=0; $i < $jummenu; $i++) { 
        	$data =array(
        		'GroupID' 	=> $groupname,
        		'SubDeptID' => $chkid[$i],
        		'Cek' 		=> 1,
        		'CreatedBy' => strtoupper($this->session->userdata('user_name')),
        		'CreatedDate' => date('Y-m-d H:i:s')
        	);

        	$result = $this->M_akses_dept->simpan($data);
        }

        if($result){
            redirect('Akses_dept/?msg=failed');
        }else{
            redirect('Akses_dept/?msg=success');
        }
	}
}