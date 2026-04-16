<?php
defined('BASEPATH') or exit('No Direct Script access Allowed');

class M_approve_laundry extends CI_model
{

	// function get_DataPotongGaji()
	// {
	// 	$query = $this->db->query("SELECT * from vwMonitoringLaundry where JenisPembayaran='Potong Gaji' AND (ApproveStatus is null or ApproveStatus=0) order by DiambilDate asc");
	// 	return $query->result();
	// }

	function get_DataPotongGaji()
	{
		$query = $this->db->query(
		"SELECT
			* 
		FROM
			vwMonitoringLaundry 
		WHERE
			JenisPembayaran = 'Potong Gaji' 
			AND ( ApproveStatus IS NULL OR ApproveStatus = 0 ) 
		ORDER BY
			TglTransaksi DESC"
	);
		return $query->result();
	}

	function get_data($jarak1, $jarak2, $status_tk)
	{
		// $query = $this->db->query("SELECT * FROM vwMonitoringLaundry where TglTransaksi < '$jarak2' and StatusTK='$status_tk' and JenisPembayaran='Potong Gaji' and (ApproveStatus is null or ApproveStatus=0) order by TglTransaksi DESC");
		$query = $this->db->query(
			"SELECT
				* 
			FROM
				vwMonitoringLaundry
			WHERE
				convert(varchar, TglTransaksi,23) >= '$jarak1'
				AND convert(varchar, TglTransaksi,23) <= '$jarak2'
				AND StatusTK = '$status_tk'
				AND JenisPembayaran = 'Potong Gaji'
				AND ( ApproveStatus IS NULL OR ApproveStatus = 0 )  
			ORDER BY
				TglTransaksi ASC"
		);
		return $query->result();
	}

	function approve($ID, $data)
	{
		$this->db->where('ID', $ID);
		$this->db->update('tblLaundry_TrnLayanan', $data);
	}

	function get_app_data($get_app_number)
	{
		$this->db->from('tblLaundryRekap');
		$this->db->where('create_status', '1');

		if ($get_app_number == 'app1') {
			$this->db->where('app1_status', NULL);
			$this->db->where('app2_status', NULL);
			$this->db->where('app3_status', NULL);
		} elseif ($get_app_number == 'app2') {
			$this->db->where('app1_status', '1');
			$this->db->where('app2_status', NULL);
			$this->db->where('app3_status', NULL);
		} else {
			$this->db->where('app1_status', '1');
			$this->db->where('app2_status', '1');
			$this->db->where('app3_status', NULL);
			$this->db->where('rekap_jns !=', 'Rekap2');
		}
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	function approve_rekap($data_app, $rekap_id)
	{
		$this->db->trans_begin();
		$this->db->where('rekap_id', $rekap_id);
		$this->db->update('tblLaundryRekap', $data_app);
		if ($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();
			$result = 0;
		} else {
			$this->db->trans_commit();
			$result = 1;
		}
		return $result;
	}

	function get_detail_rekap($get_rekap_id)
	{
		$this->db->from('tblLaundryRekap');
		$this->db->where('create_status', '1');
		$this->db->where('rekap_id', $get_rekap_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
}
