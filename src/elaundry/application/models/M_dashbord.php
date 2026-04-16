<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashbord extends CI_Model {
            
    function __construct() {
        parent::__construct();
    }

    function get_cekData(){
        $tgl = date('Y-m-d');
        $jam = date('H:i');
        $query = $this->db->query("SELECT * FROM tbl_headertamu where Rencana_checkout = '$tgl' and InActive = '1'");
        return $query->result();
    }

    function get_detailTamu(){
        $tgl = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM tbl_detailtamu as A left join master_mes as B ON A.MessID = B.MessID left join master_kamar as C ON A.KamarID = C.KamarID left join tbl_headertamu as D ON A.HeaderID = D.HeaderID where  (A.Status_tamu IS NULL OR A.Status_tamu in (1,2)) and D.Rencana_checkout = '$tgl' and D.InActive = '1'");
        return $query->result();
    }
    function get_dataKamar(){
    	$query = $this->db->query("SELECT A.KamarID,A.No_kamar,A.Kapasitas,C.Nama_mes,C.Alamat,B.Jumlah,A.Cleaning FROM master_kamar as A left join (SELECT MessID,KamarID,COUNT(DetailID) as Jumlah FROM tbl_detailtamu where Status_tamu in (1,2) GROUP BY MessID,KamarID ) as B ON A.KamarID = B.KamarID left join master_mes as C ON A.MessID = C.MessID where A.Kapasitas NOT IN (0)");
    	return $query->result();
    }

    function get_dataTamu(){
    	$query = $this->db->query("SELECT * FROM tbl_detailtamu as A left join master_mes as B ON A.MessID = B.MessID left join master_kamar as C ON A.KamarID = C.KamarID left join tbl_headertamu as D ON A.HeaderID = D.HeaderID where Status_tamu in (1,2)");
    	return $query->result();
    }

    function jmlBooking(){
        $tgl = date('Y-m-d');
        $query = $this->db->query("SELECT COUNT(B.DetailID) as Jumlah FROM tbl_headertamu as A left join tbl_detailtamu as B ON A.HeaderID = B.HeaderID where A.Rencana_checkin = '$tgl' and (B.Status_tamu = '1' OR B.Status_tamu IS NULL)");
        return $query->result();
    }

    function jmlCheckin(){
        $tgl = date('Y-m-d');
        $query = $this->db->query("SELECT COUNT(B.DetailID) as Jumlah FROM tbl_headertamu as A left join tbl_detailtamu as B ON A.HeaderID = B.HeaderID where B.CheckInDate = '$tgl' and B.Status_tamu = '2'");
        return $query->result();
    }

    function jmlCheckout(){
        $tgl = date('Y-m-d');
        $query = $this->db->query("SELECT COUNT(B.DetailID) as Jumlah FROM tbl_headertamu as A left join tbl_detailtamu as B ON A.HeaderID = B.HeaderID where B.CheckOutDate = '$tgl' and B.Status_tamu = '3'");
        return $query->result();
    }

    function jmlCancel(){
        $tgl = date('Y-m-d');
        $query = $this->db->query("SELECT COUNT(B.DetailID) as Jumlah FROM tbl_headertamu as A left join tbl_detailtamu as B ON A.HeaderID = B.HeaderID where B.CancelDate = '$tgl' and B.Status_tamu = '4'");
        return $query->result();
    }

  }