<?php
class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }

    function display($template,$data = null){
        // mode development
        $ip_address = $this->_CI->session->userdata('ip_address');
        if ($ip_address == '192.168.0.194') {
            $this->_CI->load->model('M_menuSidebar');

            $data['_getMenu1'] = $this->_CI->M_menuSidebar->selectMenu1($this->_CI->session->userdata('group_user'));
            $data['_getMenu2'] = $this->_CI->M_menuSidebar->selectMenu2($this->_CI->session->userdata('group_user'));
            $data['_getMenu3'] = $this->_CI->M_menuSidebar->selectMenu3($this->_CI->session->userdata('group_user'));

            $data['_navbar']        = $this->_CI->load->view('template/developver/T_Navbar', $data, true);
            $data['_content']       = $this->_CI->load->view($template, $data, true);
            $data['_footer']        = $this->_CI->load->view('template/developver/T_Footer', $data, true);

            $this->_CI->load->view('/V_Templates.php', $data);
        } else {
            // mode production
            $this->_CI->load->model('M_menuSidebar');

            $data['_getMenu1'] = $this->_CI->M_menuSidebar->selectMenu1($this->_CI->session->userdata('group_user'));
            $data['_getMenu2'] = $this->_CI->M_menuSidebar->selectMenu2($this->_CI->session->userdata('group_user'));
            $data['_getMenu3'] = $this->_CI->M_menuSidebar->selectMenu3($this->_CI->session->userdata('group_user'));

            $data['_navbar']  = $this->_CI->load->view('template/productions/T_Navbar',$data,true);
            $data['_content'] = $this->_CI->load->view($template,$data,true);
            $data['_footer']  = $this->_CI->load->view('template/productions/T_Footer',$data,true);
            
            $this->_CI->load->view('/Template.php',$data);
        }
        
    }
    
}