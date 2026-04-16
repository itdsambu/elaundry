<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mntLaundry extends CI_Model
{
    protected $id    = 'ID';
    private $view    = 'vwMonitoringLaundry';

    function __construct()
    {
        parent::__construct();
    }

    // Monitoring Approval
    public $column_order = array(
        null,
        'nama_laundry',
        'NoNota',
        'TglTransaksi',
        'SelesaiDate',
        'DiambilDate',
        'Nama',
        'StatusKaryawan',
        'NIK',
        'JenisPembayaran',
        'JenisLayanan',
        'TotalTagihan',
        'StatusPelayanan',
        'DiambilBy',
        'ApproveBy',
        'ApproveDate',
        null
    );

    public $column_search = array(
        'nama_laundry',
        'alamat',
        'NoNota',
        'TglTransaksi',
        'SelesaiDate',
        'DiambilDate',
        'Nama',
        'StatusKaryawan',
        'NIK',
        'JenisPembayaran',
        'JenisLayanan',
        'TotalTagihan',
        'StatusPelayanan',
        'DiambilBy',
        'ApproveBy',
        'ApproveDate'
    );

    public $order = array('ID' => 'desc'); // default order

    private function _get_datatables_query($id = null)
    {
        $this->db->select('*');
        $this->db->from($this->view);
        $this->db->where('IDStatusPelayanan', '3');
        $this->db->where('ApproveStatus', '1');

        $i = 0;

        foreach ($this->column_search as $item) { // loop column
            if ($_POST['search']['value']) { // if datatable send POST for search

                if ($i === 0) { // first loop
                    $this->db->group_start();
                    $this->db->like('CONVERT(VARCHAR(25),' . $item . ',126)', $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if ($id != null) {
            $this->db->where('ID', $id);
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($id = null)
    {
        if ($id != null) {
            $this->_get_datatables_query($id);
        } else {
            $this->_get_datatables_query();
        }

        if ($_POST['length'] != '')
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        if ($query == TRUE) {
            return $query->result();
        }
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        if ($query !== FALSE && $query->num_rows() > 0) {
            return $query->num_rows();
        }
    }

    public function count_all()
    {
        return $this->db->from($this->view)->count_all_results();
    }

    // function get_Vlaundry()
    // {
    // 	$query = $this->db->query("SELECT * FROM vwMonitoringLaundry order by ID asc");
    // 	return $query->result();
    // }

    function get_Vlaundry()
    {
        $query = $this->db->query(
            "SELECT TOP 22400 *
        							FROM vwMonitoringLaundry
        							ORDER BY ID ASC;
        							"
        );
        if (!$query) {
            $error = $this->db->error();
            die("SQL Error: " . $error['message']);
        }
        return $query->result();
    }


    function get_dataLaporanBy($id, $IDStatusPelayanan)
    {
        $query =  $this->db->query("UPDATE tblLaundry_TrnLayanan SET IDStatusPelayanan = '$IDStatusPelayanan', IDLayanan = '$IDStatusPelayanan', DiambilBy = NULL, DiambilDate = NULL WHERE ID = '$id'");
        return $query;
    }


    // function get_Vapproval()
    // {
    // 	$query = $this->db->query("SELECT * FROM vwMonitoringLaundry where IDStatusPelayanan=3 and ApproveStatus=1 order by ID asc");
    // 	return $query->result();
    // }

    // function get_Vapproval()
    // {
    // 	$query = $this->db->query("SELECT TOP 10000 *
    // 								FROM vwMonitoringLaundry
    // 								WHERE IDStatusPelayanan = 3 AND ApproveStatus = 1
    // 								ORDER BY ID ASC
    // 	");

    // 	if (!$query) {
    // 		$error = $this->db->error();
    // 		die("SQL Error: " . $error['message']);
    // 	}
    // 	return $query->result();
    // }

    function get_Vapproval()
    {
        $query = $this->db->query("SELECT TOP 5000 *
									FROM vwMonitoringLaundry
									WHERE IDStatusPelayanan = 3
									AND ApproveStatus = 1
									ORDER BY ID DESC
		");
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
        $query = $this->db->query("SELECT * FROM vwMonitoringLaundry where TglTransaksi between '" . $tgl_1 . "' and '" . $tgl_2 . "' and ApproveStatus = 1 and StatusKaryawan = '" . $status_pelanggan . "' ORDER BY TglTransaksi ASC");
        return $query->result();
    }

    function get_monitoring_approve($tgl_trans_now, $periodeapproval_now, $status_tk)
    {
        $query = $this->db->query("SELECT * FROM vwMonitoringLaundry where PeriodeApprove = '$periodeapproval_now' and TglTransaksi >= '$tgl_trans_now' and StatusTK='$status_tk' and ApproveStatus = 1 ORDER BY TglTransaksi ASC");
        return $query->result();
    }
    function get_monitoring_approve_kar_old($tgl_trans_saatini, $tgl_trans_sebelumnya, $status_tk)
    {
        $query = $this->db->query("SELECT * FROM vwMonitoringLaundry where TglTransaksi <= '$tgl_trans_saatini' and TglTransaksi >= '$tgl_trans_sebelumnya' and StatusTK='$status_tk' and ApproveStatus = 1 ORDER BY TglTransaksi ASC");
        return $query->result();
    }
    function get_monitoring_approve_kar_keliru($tgl_trans_now, $tgl_trans_before, $periodeapproval_now, $status_tk)
    {
        $query = $this->db->query("SELECT * FROM vwMonitoringLaundry where PeriodeApprove <= '$periodeapproval_now' and TglTransaksi <= '$tgl_trans_now' and TglTransaksi >= '$tgl_trans_before' and StatusTK='$status_tk' and ApproveStatus = 1 ORDER BY TglTransaksi ASC");
        return $query->result();
    }
    function get_monitoring_approve_kar($tgl_trans_now, $tgl_trans_before, $periodeapproval_now, $status_tk)
    {
        $query = $this->db->query(
            "SELECT
				*
			FROM
				vwMonitoringLaundry
			WHERE
				PeriodeApprove <= '$periodeapproval_now'
				AND CONVERT ( VARCHAR, TglTransaksi, 23 ) < '$tgl_trans_now'
				AND CONVERT ( VARCHAR, TglTransaksi, 23 ) >= '$tgl_trans_before'
				AND StatusTK = '$status_tk'
				AND ApproveStatus = 1
			ORDER BY
				TglTransaksi ASC"
        );
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

    public function getListData($tanggal_1, $tanggal_2, $StatusKaryawan, $pembayaran, $laundry_status)
    {
        $query = $this->db->query(
            "SELECT
				*
			FROM
				$this->view
			WHERE
				convert(varchar, TglTransaksi,23) >= '$tanggal_1'
				AND convert(varchar, TglTransaksi,23) <= '$tanggal_2'
				AND StatusKaryawan = '$StatusKaryawan'
				AND JenisPembayaran = '$pembayaran'
				AND StatusPelayanan = '$laundry_status'
			ORDER BY
				TglTransaksi ASC"
        );
        return $query->result();
    }

    public function getListDataFilterByStatus($tanggal_1, $tanggal_2, $status)
    {
        $query = $this->db->query(
            "SELECT
				*
			FROM
				vwMonitoringLaundry
			WHERE
				CONVERT ( VARCHAR, TglTransaksi, 23 ) >= '$tanggal_1'
				AND CONVERT ( VARCHAR, TglTransaksi, 23 ) <= '$tanggal_2'
				AND StatusKaryawan = '$status'
			ORDER BY
				TglTransaksi ASC"
        );
        return $query->result();
    }

    public function getListDataFilterByDate($tanggal_1, $tanggal_2)
    {
        $query = $this->db->query(
            "SELECT
				*
			FROM
				$this->view
			WHERE
				convert(varchar, TglTransaksi,23) >= '$tanggal_1'
				AND convert(varchar, TglTransaksi,23) <= '$tanggal_2'
			ORDER BY
				TglTransaksi ASC"
        );
        return $query->result();
    }
}
