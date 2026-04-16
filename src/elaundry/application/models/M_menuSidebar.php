<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menuSidebar extends CI_Model{

    private $menu1 = 'vwUtlMenu_lv1';
    private $menu2 = 'vwUtlMenu_lv2';
    private $menu3 = 'vwUtlMenu_lv3'; 

    function __construct(){
        parent:: __construct();
    }

    public function selectMenu1($GrupID){
        $this->db->where('GroupID', $GrupID);
        $this->db->order_by('MenuID', 'ASC');
        $query = $this->db->get($this->menu1);
        return $query->result();
    }

    public function selectMenu2($GrupID){
        $this->db->where('GroupID', $GrupID);
        $this->db->order_by('MenuID', 'ASC');
        $query = $this->db->get($this->menu2);
        return $query->result();
    }
    public function selectMenu3($GrupID){
        $this->db->where('GroupID', $GrupID);
        $this->db->order_by('MenuID', 'ASC');
        $query = $this->db->get($this->menu3);
        return $query->result();
    }
    public function total()
    {
       $query = $this->db->query("SELECT * FROM tbl_headertamu where Approve_dept = '1' and Status = '0'");
        return $query->num_rows();
    }
}

/* End of file m_menuSidebar.php */
/* Location: ./application/models/m_menuSidebar.php */