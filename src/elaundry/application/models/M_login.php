<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    private $table_name = 'tblUtlLogin';
    private $username   = 'LoginID';
    private $password   = 'LoginPassword';

    function __construct()
    {
        parent::__construct();
    }

    function log_in($userID)
    {
        $this->db->where($this->username, $userID);
        $this->db->where('NotActive', '0');
        return $this->db->get($this->table_name);
    }

    function cekpass($userID, $passID)
    {
        $this->db->where($this->username, $userID);
        $this->db->where($this->password, $passID);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //===== untuk ubah password =====
    public function getUserLogin($id)
    {
        $this->db->where($this->username, $id);
        return $this->db->get($this->table_name)->result();
    }

    function ubahPassword($userID, $data)
    {
        $this->db->where($this->username, $userID);
        $this->db->update($this->table_name, $data);
    }

    //====== Simpan Log
    function simpan_log($info)
    {
        $this->db->trans_start();
        $this->db->insert('tblutllogonline', $info);
        $signid = $this->db->insert_id();
        $this->db->trans_complete();
        return $signid;
    }

    function simpan_log_out($signid)
    {
        $this->db->set('SignOut', 'GETDATE()', false);
        $this->db->where('SignID', $signid);
        $this->db->update('tblutllogonline');
        // $this->db->trans_start();
        // $this->db->query('Update tblutllogonline Set SignOut=GetDate() Where SignID='.$signid);
        // $this->db->trans_complete();
    }

    function cekstts($userID, $data)
    {
        $this->db->where($this->username, $userID);
        $this->db->update($this->table_name, $data);
    }

    function getHistory()
    {
        $userID = $this->session->userdata('user_id');
        return  $this->db->query("select * from tblutllogonline where UserID = '$userID' order by SignID desc")->result();
    }

    function cek_user($username)
    {  
        return $this->db->get_where('tblUtlLogin', array('LoginID' => $username, 'NotActive' => '0'));
    }

    function get_serverdate()
    {
        $query = $this->db->query('select getdate() as serverdate');
        if ($query->num_rows() > 0) {
            $r = $query->row();
            $serverdate = $r->serverdate;
        }
        return tgl_ind($serverdate);
    }

    function login_onelogin($personalid, $personalstatus)
    {
        $datapost       = array(
            'personalid'     => $personalid,
            'personalstatus' => $personalstatus
        );

        // cek status personal aktif
        $q2 = json_decode($this->curl->simple_post(setAPI3() . "get_byno_personal", $datapost, array(CURLOPT_BUFFERSIZE => 10)));

        // cek status online onelogin
        $q3 = json_decode($this->curl->simple_post(setAPI3() . "get_useron_onelogin", $datapost, array(CURLOPT_BUFFERSIZE => 10)));

        // cek status user app
        if (count($q2) > 0 && count($q3) > 0) {
            $this->db->where('personalid', $personalid);
            $this->db->where('personalstatus', $personalstatus);
            return $this->db->get('tblUtlLogin');
        } else {
            return false;
        }
    }
}
