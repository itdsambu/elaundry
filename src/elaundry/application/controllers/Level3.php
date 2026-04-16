<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone', 'Asia/jakarta');

class Level3 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_level2', 'M_level3'));

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    function index()
    {
        $data['getData'] = $this->M_level3->select();

        $this->template->display('master/submenu/level3/index', $data);
    }

    function input()
    {
        $data['getMenu2'] = $this->M_level2->select();

        $this->template->display('master/submenu/level3/input', $data);
    }

    function save()
    {
        $data = array(
            'MenuID'        => $this->input->post('MenuID'),
            'MenuName'      => $this->input->post('MenuName'),
            'MenuLabel'     => $this->input->post('MenuLabel'),
            'MenuIcon'      => $this->input->post('MenuIcon'),
            'MenuLink'      => $this->input->post('MenuLink'),
            'MenuHeader'    => $this->input->post('MenuHeader')
        );
        $result = $this->M_level3->save($data);

        if (!$result) {
            redirect('Level3/?msg=success');
        } else {
            redirect('Level3/?msg=failed');
        }
    }

    function update()
    {
        $id               = $this->uri->segment(3);
        $data['getUser']  = $this->M_level3->get($id);
        $data['getMenu2'] = $this->M_level2->select();

        $this->template->display('master/submenu/level3/update', $data);
    }

    function saveupdate()
    {
        $data = array(
            'MenuName'      => $this->input->post('MenuName'),
            'MenuLabel'     => $this->input->post('MenuLabel'),
            'MenuIcon'      => $this->input->post('MenuIcon'),
            'MenuLink'      => $this->input->post('MenuLink'),
            'MenuHeader'    => $this->input->post('MenuHeader')
        );
        $id = $this->input->post('MenuID');

        $result = $this->M_level3->update($id, $data);

        if (!$result) {
            redirect('Level3/?msg=success');
        } else {
            redirect('Level3/?msg=failed');
        }
    }

    function delete()
    {
        $id = $this->uri->segment(3);

        $result = $this->M_level3->delete($id);

        if (!$result) {
            redirect('Level3/?msg=success');
        } else {
            redirect('Level3/?msg=failed');
        }
    }
}
