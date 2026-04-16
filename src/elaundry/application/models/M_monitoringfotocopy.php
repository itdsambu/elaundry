<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

Class m_monitoringfotocopy extends CI_Model{
	function get_masterkertas(){
		return $this->db->query("SELECT A.ID_kertas,A.Ukuran,A.Type_kertas,A.Harga_kertas,B.Harga_perside,A.Harga_kertas + B.Harga_perside as Jumlahtotal from master_kertas A full join master_tinta B ON A.Type_kertas = B.Type_kertas group by A.ID_kertas,A.Ukuran,A.Type_kertas,A.Harga_kertas,B.Harga_perside order by ID_kertas")->result();
	}

	function get_mastermesin(){
		return $this->db->query('SELECT * from master_mesin')->result();
	}

	function get_mastertinta(){
		return $this->db->query('SELECT * from master_tinta')->result();
	}

	function get_tbltransaksifotocopy($iddept,$bulan,$tahun){
		return $this->db->query("SELECT * from tbl_transaksifotocopy where ID_dept ='$iddept' and MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi) ='$tahun' ")->result();
	}

	function get_tbltransaksiperawatan(){
		return $this->db->query('SELECT * from tbl_transaksiperawatan')->result();
	}

	function get_tbltransaksipergantian(){
		return $this->db->query('SELECT * from tbl_transaksitinta')->result();
	}

	function get_tanggaltransaksi($iddept,$bulan,$tahun){
		return $this->db->query("SELECT Tgl_transaksi from tbl_transaksifotocopy  where ID_dept ='$iddept' and MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi) ='$tahun' group by Tgl_transaksi")->result();
	}

	function ajaxmonitoring($iddept,$bulan,$tahun){
		return $this->db->query("SELECT Tgl_transaksi,ID_kertas,Type_kertas,SUM(Jumlahside) as Totalside,Komplit from vw_transaksifotocopy where ID_dept = '$iddept' and MONTH(Tgl_transaksi) = '$bulan' and YEAR(Tgl_transaksi)= '$tahun' group by Tgl_transaksi,ID_kertas,Type_kertas,Komplit")->result();
	}

	function get_masterdepartemen(){
		$grupid=$this->session->userdata('group_user');
		return $this->db->query("SELECT * from master_departemen where ID_dept in (SELECT subdeptid from tblUtlMenuAksesSubDept where GroupID='$grupid' )")->result();
	}

	function get_view($iddept,$bulan,$tahun){
		return $this->db->query("SELECT ID_kertas,SUM(Jumlahside) as Totalkertasfotocopy from vw_transaksifotocopy where ID_dept = '$iddept' and MONTH(Tgl_transaksi) = '$bulan' and YEAR(Tgl_transaksi)= '$tahun' group by ID_kertas")->result();
	}

	function list_dept($iddept){
		return $this->db->query("SELECT * from master_departemen where ID_dept='$iddept'")->result();
	}

	function get_tanggal($iddept,$bulan,$tahun){
		return $this->db->query("SELECT Type_kertas,Tgl_transaksi,Komplit from vw_transaksifotocopy where ID_dept ='$iddept' and MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi) ='$tahun' group by Type_kertas,Tgl_transaksi,Komplit")->result();
	}
	function get_approve($iddept,$bulan,$tahun){
		return $this->db->query("SELECT ID_dept,Komplit_by,Komplit_date,Komplit,Approve_by1,Approve_date1,Approve_status1,Approve_by2,Approve_date2,Approve_status2,Approve_by3,Approve_status3,Approve_date from vw_transaksifotocopy where ID_dept='$iddept' and MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun' group by ID_dept,Komplit_by,Komplit_date,Komplit,Approve_by1,Approve_date1,Approve_status1,Approve_by2,Approve_date2,Approve_status2,Approve_by3,Approve_status3,Approve_date")->result();
	}
}
?>