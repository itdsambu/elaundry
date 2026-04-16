<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone','Asia/jakarta');

class Level1 extends CI_Controller{

    function __construct(){
        parent:: __construct();
        
        $this->load->model('M_level1');

        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

    function index(){
        $data['getData'] = $this->M_level1->select();

        $this->template->display('master/submenu/level1/index',$data);
    }

    function input(){
        $this->template->display('master/submenu/level1/input');
    }

    function save(){
        $data = array(
            'MenuID'        => $this->input->post('MenuID'),
            'MenuName'      => $this->input->post('MenuName'),
            'MenuLabel'     => $this->input->post('MenuLabel'),
            'MenuIcon'      => $this->input->post('MenuIcon')
        );
        $result = $this->M_level1->save($data);

        if(!$result){
            redirect('Level1/?msg=success');
        }else{
            redirect('Level1/?msg=failed');
        }
    }

    function update(){
        $id                   = $this->uri->segment(3);
        $data['getUser']      = $this->M_level1->get($id);

        $this->template->display('master/submenu/level1/update',$data);
    }

    function saveupdate(){
        $data= array(
            // 'MenuID'        => $this->input->post('MenuID'),
            'MenuName'      => $this->input->post('MenuName'),
            'MenuLabel'     => $this->input->post('MenuLabel'),
            'MenuIcon'      => $this->input->post('MenuIcon')
        );
        $id = $this->input->post('MenuID');
        
        $result = $this->M_level1->update($id,$data);
        
        if(!$result){
            redirect('Level1/?msg=success');
        }else{
            redirect('Level1/?msg=failed');
        }
    }

    function delete(){
        $id = $this->uri->segment(3);

        $result = $this->M_level1->delete($id);

        if(!$result){
            redirect('Level1/?msg=success');
        }else{
            redirect('Level1/?msg=failed');
        }
    }
}