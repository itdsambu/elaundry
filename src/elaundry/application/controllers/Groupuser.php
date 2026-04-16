<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone','Asia/jakarta');

class Groupuser extends CI_Controller{

    function __construct(){
        parent:: __construct();
        
        $this->load->model(array('M_group_user','M_level1','M_level2','M_level3','M_menuAkses'));

        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

    function index(){
        $data['getData'] = $this->M_group_user->select();

        $this->template->display('utility/group_user/index',$data);
    }

    function input(){
        $data['menu1']  = $this->M_level1->select();
        $data['menu2']  = $this->M_level2->select();
        $data['menu3']  = $this->M_level3->select();

        $this->template->display('utility/group_user/input', $data);
    }

    function save(){
        $data = array(
            'GroupName'     => $this->input->post('GroupName'),
            'CreatedBy'     => strtoupper($this->session->userdata('user_name')),
            'CreatedDate'   => date('Y-m-d H:i:s')
        );
        
        // save group user
        $result = $this->M_group_user->save($data);

        // save menu akses
        $save_menuAkses = $this->save_menuAkses($result);

        if(!$result){
            redirect('Groupuser/?msg=failed');
        }else{
            redirect('Groupuser/?msg=success');
        }
    }

    function update(){
        $id              = $this->uri->segment(3);
        $data['getUser'] = $this->M_group_user->get($id);
        $data['menu1']   = $this->M_menuAkses->menu_lv1($id);
        $data['menu2']   = $this->M_menuAkses->menu_lv2($id);
        $data['menu3']   = $this->M_menuAkses->menu_lv3($id);

        $this->template->display('utility/group_user/update',$data);
    }

    function saveupdate(){
        $id = $this->input->post('GroupID');

        $data= array(
            'GroupName'     => $this->input->post('GroupName'),
            'UpdatedBy'     => strtoupper($this->session->userdata('user_name')),
            'UpdatedDate'   => date('Y-m-d H:i:s')
        );

        // save group user
        $result = $this->M_group_user->update($id,$data);

        // delete menu akses
        $del_menuAkses = $this->M_menuAkses->delete($id);

        // save menu akses
        $save_menuAkses = $this->save_menuAkses($id);
        
        if(!$result){
            redirect('Groupuser/?msg=success');
        }else{
            redirect('Groupuser/?msg=failed');
        }
    }

    function delete(){
        $id = $this->uri->segment(3); 

        // delete menu akses
        $del_access_menu = $this->M_menuAkses->delete($id);

        // delete group user
        $result = $this->M_group_user->delete($id);

        if(!$result){
            redirect('Groupuser?msg=success_delete');
        }else{
            redirect('Groupuser?msg=failed_delete');
        }
    }

    //=========================================================================================================================
    // MENU AKSES
    //=========================================================================================================================

    function save_menuAkses($id){
        $chkid   = $this->input->post('checkbox');
        $jummenu = count($this->input->post('checkbox'));

        if (!empty($chkid)){            
            for($i=0; $i < $jummenu; $i++){
                if (isset($chkid[$i])){
                    $menuid = $chkid[$i];
                    $this->M_menuAkses->save($id,$menuid);
                }
            }
        }
    }
}