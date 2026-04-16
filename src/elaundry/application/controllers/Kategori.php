<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone','Asia/jakarta');

class Kategori extends CI_Controller{

    function __construct(){
        parent:: __construct();
        
        $this->load->model('M_kategori');

        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

    function index(){
        $data['getData'] = $this->M_kategori->select();

        $this->template->display('master/pembelian/mstKategori/index',$data);
    }

    function input(){

        $this->template->display('master/pembelian/mstKategori/input');
    }

    function save(){
        $data= array(
            'Kategori'      => $this->input->post('txtkategori'),
            'InActive'      => $this->input->post('txtinactive'),
            'CreatedBy'     => strtoupper($this->session->userdata('user_name')),
            'CreatedDate'   => date('Y-m-d H:i:s')
        );
        $result = $this->M_kategori->save($data);

        if(!$result){
            redirect('Kategori/?msg=failed');
        }else{
            redirect('Kategori/?msg=success');
        }
    }

    function update(){
        $id                   = $this->uri->segment(3);
        $data['getData']      = $this->M_kategori->get($id);

        $this->template->display('master/pembelian/mstKategori/update',$data);
    }

    function saveupdate(){
        $data= array(
            'Kategori'     => $this->input->post('txtkategori'),
            'InActive'     => $this->input->post('txtinactive'),
            'UpdateBy'     => strtoupper($this->session->userdata('user_name')),
            'UpdateDate'   => date('Y-m-d H:i:s')
        );
        $id = $this->input->post('txtkategoriid');
        
        $result = $this->M_kategori->update($id,$data);
        
        if(!$result){
            redirect('Kategori/?msg=success');
        }else{
            redirect('Kategori/?msg=failed');
        }
    }

    function delete(){
        $id = $this->uri->segment(3); 

        $result = $this->M_kategori->delete($id);

        if(!$result){
            redirect('Kategori?msg=success_delete');
        }else{
            redirect('Kategori?msg=failed_delete');
        }
    }
}