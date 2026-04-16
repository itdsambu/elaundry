<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_monitoringrekapfotocopy extends CI_Model{
	function get_mastermesin(){
		return $this->db->query("select * from master_mesin")->result();
	}

	function get_masterkertas(){
		return $this->db->query("select A.ID_kertas,A.Ukuran,A.Type_kertas,A.Harga_kertas,B.Harga_perside,A.Harga_kertas + B.Harga_perside as TotalHargaFotocopy from master_kertas A full join master_tinta B ON A.Type_kertas = B.Type_kertas group by A.ID_kertas,A.Ukuran,A.Type_kertas,A.Harga_kertas,B.Harga_perside order by ID_kertas")->result();

	}

	function get_mastertinta(){
		return $this->db->query("select * from master_tinta")->result();
	}

	function get_vwtransaksifotocopy($bulan,$tahun){
		return $this->db->query("select * from vw_transaksifotocopy where MONTH(Tgl_transaksi) = '$bulan' and YEAR(Tgl_transaksi)= '$tahun'")->result();
	}

	// function get_vwtransaksifotocopy(){
	// 	$query = $this->db->query("SELECT * FROM vw_transaksifotocopy");
	// 	return $query->result();
	// }

	function get_masterdepartemen(){
		return $this->db->query("select ID_dept,Singkatan_dept,Divisi from vw_transaksifotocopy group By ID_dept,Singkatan_dept,Divisi order by Divisi")->result();
	}

	function get_total($bulan,$tahun){
		return $this->db->query("select ID_dept,Divisi,Singkatan_dept,ID_kertas,Jenis_kertas,Ukuran,Type_kertas,SUM(Jumlahside) as Totalkertasfotocopy from vw_transaksifotocopy where MONTH(Tgl_transaksi) = '$bulan' and YEAR(Tgl_transaksi)= '$tahun' group by ID_dept,Divisi,Singkatan_dept,ID_kertas,Jenis_kertas,Ukuran,Type_kertas order by Divisi")->result();
	}

	function get_totalseluruh($bulan,$tahun){
		return $this->db->query("select ID_kertas,Type_kertas,SUM(Jumlahside) as TotalkertasperID from vw_transaksifotocopy where MONTH(Tgl_transaksi) = '$bulan' and YEAR(Tgl_transaksi)= '$tahun' group by ID_kertas,Type_kertas")->result();
	}

	function get_totaljumlahuang($bulan,$tahun){
		return $this->db->query("select ID_dept,SUM(Totalkertasfotocopy) as Totalkertas,SUM(Totaluang) as Total from vw_Total where MONTH (Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun' group by ID_dept")->result();
	}

	function get_totalseluruhkertas($bulan,$tahun){
		return $this->db->query(" select Type_kertas,SUM(Totalkertasfotocopy) as Totalseluruhkertas from vw_Total where MONTH (Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun' group by Type_kertas")->result();
	}

	function get_persentase($bulan,$tahun){
		return $this->db->query("select *, TotalHasil =  cast(cast(Totalbagi as decimal (18,2)) / cast(Totalseluruhkertas as decimal (18,2)) * 100 as decimal(18,2))  from (SELECT  SUM(Totalkertasfotocopy) as Totalseluruhkertas,0 AS Flag from vw_Total where MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun' union all  SELECT  SUM(Totalkertasfotocopy) as Totalseluruhkertas,1 AS Flag from vw_Total where MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun') as a left join (SELECT Type_kertas,Sum(Totalkertasfotocopy)as Totalbagi from vw_Total where MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun' group by Type_kertas) as b on a.Flag=b.Type_kertas")->result();
	}

	function get_jumlahtotaluang($bulan,$tahun){
		return $this->db->query("select SUM(Totaluang) AS JumlahTotalUang from vw_Total where  MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun'")->result();
	}

	function get_jumlahpersentaseperdept($bulan,$tahun){
		return $this->db->query("select ID_dept,SUM(Totalkertasfotocopy) as Totalkertas,SUM(Totaluang) as Total, GrandTotal = (select SUM(C.Totaluang) AS JumlahTotalUang from vw_Total c), persentase = cast(cast(SUM(Totaluang) as decimal (18,2))/cast((select SUM(C.Totaluang) AS JumlahTotalUang from vw_Total c) as decimal (18,2)) as decimal (18,2)) from vw_Total where MONTH (Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun' group by ID_dept")->result();
	}

	function get_jumlahtotalkertasperrim($bulan,$tahun){
		return $this->db->query("select Ukuran,Jenis_kertas,cast(SUM(Totalkertasfotocopy)as decimal (18,2)) as JumlahTotalKertasPerRim, cast(SUM(Totalkertasfotocopy)as decimal (18,2)) / 500 AS Jumlahrimperkertas  from  vw_totaljumlahkertas where MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun' group by Ukuran,Jenis_kertas")->result();
	}

	function get_totalrim($bulan,$tahun){
		return $this->db->query("select A.JumlahRim from (SELECT cast(SUM(Totalkertasfotocopy) as decimal (18,2)) / 500 AS JumlahRim FROM   dbo.vw_totaljumlahkertas WHERE MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun') as A ")->result();
	}

	function get_dept($bulan,$tahun){
		return $this->db->query("select ID_dept,Divisi,Singkatan_dept from master_departemen order by Divisi")->result();
	}

	function get_approve($bulan,$tahun){
		return $this->db->query("SELECT TOP(1) Komplit_by,Komplit_date,Komplit,Approve_by2,Approve_date2,Approve_status2,Approve_by3,Approve_date,Approve_status3 FROM tbl_transaksifotocopy where MONTH(Tgl_transaksi)='$bulan' and YEAR(Tgl_transaksi)='$tahun' and Komplit = '1' group by Komplit_by,Komplit_date,Komplit,Approve_by2,Approve_date2,Approve_status2,Approve_by3,Approve_date,Approve_status3 Order by Approve_date desc")->result();
	}
}
?>