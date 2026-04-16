<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menuAkses extends CI_Model{

    private $menu1 = 'vwUtlMenu_lv1';
    private $menu2 = 'vwUtlMenu_lv2';
    private $menu3 = 'vwUtlMenu_lv3';

    function __construct(){
        parent:: __construct();
    }
    
    function menu_lv1($GroupID){
        $query = $this->db->query('SELECT GroupID, MenuID, MenuName, MenuLabel, MenuIcon, 1 AS Atc FROM vwUtlMenu_lv1 WHERE GroupID = '.$GroupID.' UNION ALL SELECT NULL as GroupID, MenuID, MenuName, MenuLabel, MenuIcon, 0 AS Atc FROM tblUtlMenu_lv1 
            WHERE MenuID NOT IN (SELECT MenuID FROM vwUtlMenu_lv1 WHERE GroupID = '.$GroupID.') order by MenuID asc');
        return $query->result();
    }

    function menu_lv2($GroupID){
        $query = $this->db->query('SELECT GroupID, MenuID, MenuName, MenuLabel, MenuIcon, MenuHeader, 1 AS Atc FROM vwUtlMenu_lv2 WHERE GroupID = '.$GroupID.' UNION ALL SELECT NULL as GroupID, MenuID, MenuName, MenuLabel, MenuIcon, MenuHeader, 0 AS Atc FROM tblUtlMenu_lv2 
            WHERE MenuID NOT IN (SELECT MenuID FROM vwUtlMenu_lv2 WHERE GroupID = '.$GroupID.') order by MenuID asc');
        return $query->result();
    }

    function menu_lv3($GroupID){
        $query = $this->db->query('SELECT GroupID, MenuID, MenuName, MenuLabel, MenuIcon, MenuHeader, 1 AS Atc FROM vwUtlMenu_lv3 WHERE GroupID = '.$GroupID.' UNION ALL SELECT NULL as GroupID, MenuID, MenuName, MenuLabel, MenuIcon, MenuHeader, 0 AS Atc FROM tblUtlMenu_lv3 
            WHERE MenuID NOT IN (SELECT MenuID FROM vwUtlMenu_lv3 WHERE GroupID = '.$GroupID.') order by MenuID asc');
        return $query->result();
    }
    
    function save($GroupID,$MenuID){
        $info = array(
            'GroupID'	=> $GroupID,
            'MenuID'	=> $MenuID
        );

        $this->db->trans_start();
        $cek = $this->db->get_where('tblUtlMenuAkses',$info);

        if ($cek->num_rows() == 0){		
                $this->db->insert('tblUtlMenuAkses',$info);
        }
        $this->db->trans_complete();
    }
    
    function delete($id){
        $this->db->where('GroupID',$id);
        $this->db->delete('tblUtlMenuAkses');
    }
}