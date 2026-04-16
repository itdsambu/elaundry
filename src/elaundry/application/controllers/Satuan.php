<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone','Asia/jakarta');

class Satuan extends CI_Controller{

    function __construct(){
        parent:: __construct();
        
        $this->load->model('M_satuan');

        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

    function index(){
        $data['getData'] = $this->M_satuan->select();

        $this->template->display('master/pembelian/mstSatuan/index',$data);
    }

    function input(){

        $this->template->display('master/pembelian/mstSatuan/input');
    }

    function save(){
        $data= array(
            'Abbr'          => $this->input->post('txtabbr'),
            'Satuan'        => $this->input->post('txtnamasatuan'),
            'InActive'      => $this->input->post('txtinactive'),
            'CreatedBy'     => strtoupper($this->session->userdata('user_name')),
            'CreatedDate'   => date('Y-m-d H:i:s')
        );
        $result = $this->M_satuan->save($data);

        if(!$result){
            redirect('Satuan/?msg=failed');
        }else{
            redirect('Satuan/?msg=success');
        }
    }

    function update(){
        $id                   = $this->uri->segment(3);
        $data['getData']      = $this->M_satuan->get($id);

        $this->template->display('master/pembelian/mstSatuan/update',$data);
    }

    function saveupdate(){
        $data= array(
            'Abbr'          => $this->input->post('txtabbr'),
            'Satuan'        => $this->input->post('txtnamasatuan'),
            'InActive'      => $this->input->post('txtinactive'),
            'UpdateBy'      => strtoupper($this->session->userdata('user_name')),
            'UpdateDate'    => date('Y-m-d H:i:s')
        );
        $id = $this->input->post('txtsatuanid');
        
        $result = $this->M_satuan->update($id,$data);
        
        if(!$result){
            redirect('Satuan/?msg=success');
        }else{
            redirect('Satuan/?msg=failed');
        }
    }

    function delete(){
        $id = $this->uri->segment(3); 

        $result = $this->M_satuan->delete($id);

        if(!$result){
            redirect('Satuan?msg=success_delete');
        }else{
            redirect('Satuan?msg=failed_delete');
        }
    }
}