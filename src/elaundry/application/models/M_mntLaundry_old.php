<?php
/** @noinspection ALL */
defined('BASEPATH') or exit('No direct script access allowed');

class M_mntLaundry extends CI_Model
{

	function get_Vlaundry()
	{
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry order by ID asc");
		return $query->result();
	}

	function get_Vapproval()
	{
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where IDStatusPelayanan=3 and ApproveStatus=1 order by ID asc");
		return $query->result();
	}

	function get_MstStatusLaundry()
	{
		$query = $this->db->query("SELECT * FROM master_status_laundry where NotActive=0");
		return $query->result();
	}

	function get_MstPembayaranLaundry()
	{
		$query = $this->db->query("SELECT * FROM master_pembayaran_laundry where NotActive=0");
		return $query->result();
	}

	function get_MstHargaLaundry()
	{
		$query = $this->db->query("SELECT * FROM master_harga_laundry where NotActive=0");
		return $query->result();
	}

	function get_vLaundryAll()
	{
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry ORDER BY TglTransaksi asc");
		return $query->result();
	}
	function get_vApproveAll()
	{
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where ApproveStatus=1 ORDER BY TglTransaksi asc");
		return $query->result();
	}
	function get_vLaundryByTwoDate($tgl_1, $tgl_2, $status_pelanggan, $jenis_pembayaran, $status_laundry)
	{
		$this->db->where('TglTransaksi >=', $tgl_1);
		$this->db->where('TglTransaksi <=', date('Y-m-d', strtotime("+1 day", strtotime($tgl_2))));
		if ($status_pelanggan != '') {
			$this->db->where('StatusKaryawan', $status_pelanggan);
		}
		if ($jenis_pembayaran != '') {
			$this->db->where('JenisPembayaran', $jenis_pembayaran);
		}
		if ($status_laundry != '') {
			$this->db->where('StatusPelayanan', $status_laundry);
		}
		$this->db->order_by("TglTransaksi", "asc");
		return $this->db->get('vwMonitoringLaundry')->result();
	}
	function get_vApproveByTwoDate($tgl_1, $tgl_2, $status_pelanggan)
	{
		// $this->db->where('ApproveDate >=', $tgl_1);
		// $this->db->where('ApproveDate <', date('Y-m-d',strtotime("+1 day", strtotime($tgl_2))));
		// if($status_pelanggan!=''){
		// 	$this->db->where('StatusKaryawan', $status_pelanggan);
		// }
		// $this->db->where('ApproveStatus',1);
		// $this->db->order_by("ApproveDate", "asc");
		// return $this->db->get('vwMonitoringLaundry')->result();

		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where TglTransaksi between '" . $tgl_1 . "' and '" . $tgl_2 . "' and ApproveStatus = 1 and StatusKaryawan = '" . $status_pelanggan . "' ORDER BY TglTransaksi ASC");
		// print_r($query);
		// exit;
		return $query->result();
	}

	function get_monitoring_approve($tgl_trans_now, $periodeapproval_now, $status_tk)
	{
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where PeriodeApprove = '$periodeapproval_now' and TglTransaksi >= '$tgl_trans_now' and StatusTK='$status_tk' and ApproveStatus = 1 ORDER BY TglTransaksi ASC");
		return $query->result();
	}
	function get_monitoring_approve_kar_old($tgl_trans_saatini, $tgl_trans_sebelumnya, $status_tk)
	{
		//return $this->db->query("SELECT * FROM vwMonitoringLaundry where PeriodeApprove = '$periodeapp' and TglTransaksi >= '$jarak1' and StatusTK='$status_tk' and ApproveStatus = 1 ORDER BY TglTransaksi ASC")->result();
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where TglTransaksi <= '$tgl_trans_saatini' and TglTransaksi >= '$tgl_trans_sebelumnya' and StatusTK='$status_tk' and ApproveStatus = 1 ORDER BY TglTransaksi ASC");
		return $query->result();
	}
	function get_monitoring_approve_kar($tgl_trans_now, $tgl_trans_before, $periodeapproval_now, $status_tk)
	{
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where PeriodeApprove <= '$periodeapproval_now' and TglTransaksi <= '$tgl_trans_now' and TglTransaksi >= '$tgl_trans_before' and StatusTK='$status_tk' and ApproveStatus = 1 ORDER BY TglTransaksi ASC");
		return $query->result();
	}

	function get_vApproveByTanggal($tanggal_1, $tanggal_2)
	{
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where TglTransaksi between '" . $tanggal_1 . "' and '" . $tanggal_2 . "' and ApproveStatus = 1 ORDER BY TglTransaksi ASC");
		return $query->result();
	}
	function get_vOnlyKaryawan($status_pelanggan)
	{
		$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where ApproveStatus = 1 and StatusKaryawan = '$status_pelanggan'");
		return $query->result();
	}
	function get_vLaundryByOneField($tgl_1, $tgl_2, $status_pelanggan, $jenis_pembayaran, $status_laundry)
	{
		if ($tgl_1 != '') {
			$this->db->where('TglTransaksi >=', $tgl_1);
			$this->db->where('TglTransaksi <', date('Y-m-d', strtotime("+1 day", strtotime($tgl_1))));
		}
		if ($tgl_2 != '') {
			$this->db->where('TglTransaksi >=', $tgl_2);
			$this->db->where('TglTransaksi <', date('Y-m-d', strtotime("+1 day", strtotime($tgl_2))));
		}
		if ($status_pelanggan != '') {
			$this->db->where('StatusKaryawan', $status_pelanggan);
		}
		if ($jenis_pembayaran != '') {
			$this->db->where('JenisPembayaran', $jenis_pembayaran);
		}
		if ($status_laundry != '') {
			$this->db->where('StatusPelayanan', $status_laundry);
		}
		$this->db->order_by("TglTransaksi", "asc");
		return $this->db->get('vwMonitoringLaundry')->result();
	}
	function get_vApproveByOneField($tgl_1, $tgl_2, $status_pelanggan)
	{
		if ($tgl_1 != '') {
			$this->db->where('ApproveDate >=', $tgl_1);
			$this->db->where('ApproveDate <', date('Y-m-d', strtotime("+1 day", strtotime($tgl_1))));
		}
		if ($tgl_2 != '') {
			$this->db->where('ApproveDate >=', $tgl_2);
			$this->db->where('ApproveDate <', date('Y-m-d', strtotime("+1 day", strtotime($tgl_2))));
		}
		if ($status_pelanggan != '') {
			$this->db->where('StatusKaryawan', $status_pelanggan);
		}
		$this->db->where('ApproveStatus', 1);
		$this->db->order_by("ApproveDate", "asc");
		return $this->db->get('vwMonitoringLaundry')->result();
	}

	// DataTables
	
	// End DataTables
}
