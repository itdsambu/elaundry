<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mntLaundry extends CI_Model
{
    protected $id = 'ID';
    private $view = 'vwMonitoringLaundry';

    function __construct()
    {
        parent::__construct();
    }

    // =============================================
    // MONITORING (IDStatusPelayanan=3, ApproveStatus=1)
    // =============================================

    public $column_order = [
        null,
        null,
        'NoNota',
        'TglTransaksi',
        'SelesaiDate',
        'DiambilDate',
        'Nama',
        'StatusKaryawan',
        'NIK',
        null,
        null,
        null,
        null,
        'StatusPelayanan',
        null,
        null,
        null,
    ];

    public $column_search = [
        'NoNota',
        'TglTransaksi',
        'SelesaiDate',
        'DiambilDate',
        'Nama',
        'NIK',
        'StatusKaryawan',
        'StatusPelayanan',
        'nama_laundry',
        'alamat',
        'JenisLayanan',
        'DiambilBy',
    ];

    public $order = ['ID' => 'desc'];

    private function _apply_search()
    {
        $this->db->where('IDStatusPelayanan', 3);
        $this->db->where('ApproveStatus', 1);

        $searchValue = isset($_POST['search']['value']) ? trim($_POST['search']['value']) : '';
        if ($searchValue !== '') {
            $i = 0;
            foreach ($this->column_search as $item) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like('CONVERT(VARCHAR(25),' . $item . ',126)', $searchValue);
                } else {
                    $this->db->or_like($item, $searchValue);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
                $i++;
            }
        }
    }

    public function get_datatables($id = null)
    {
        $this->db->select('*');
        $this->db->from($this->view);
        $this->_apply_search();

        if ($id !== null) {
            $this->db->where('ID', $id);
        }

        if (isset($_POST['order'])) {
            $colIndex = (int)$_POST['order']['0']['column'];
            $colDir   = $_POST['order']['0']['dir'];
            if (!empty($this->column_order[$colIndex])) {
                $this->db->order_by($this->column_order[$colIndex], $colDir);
            }
        } else {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

        $length = isset($_POST['length']) ? (int)$_POST['length'] : 10;
        $start  = isset($_POST['start'])  ? (int)$_POST['start']  : 0;
        if ($length != -1) {
            $this->db->limit($length, $start);
        }

        $query = $this->db->get();
        return ($query !== false) ? $query->result() : [];
    }

    public function count_filtered()
    {
        $this->db->select('COUNT(*) as total', false);
        $this->db->from($this->view);
        $this->_apply_search();

        $query = $this->db->get();
        if ($query !== false) {
            $row = $query->row();
            return $row ? (int)$row->total : 0;
        }
        return 0;
    }

    public function count_all()
    {
        $this->db->where('IDStatusPelayanan', 3);
        $this->db->where('ApproveStatus', 1);
        return (int)$this->db->from($this->view)->count_all_results();
    }

    // =============================================
    // APPROVAL DataTables (method terpisah)
    // =============================================

    public $column_search_approval = [
        'NoNota',
        'TglTransaksi',
        'SelesaiDate',
        'DiambilDate',
        'Nama',
        'NIK',
        'StatusKaryawan',
        'StatusPelayanan',
        'nama_laundry',
        'alamat',
        'JenisLayanan',
        'DiambilBy',
        'ApproveBy',
        'ApproveDate',
    ];

    public $column_order_approval = [
        null,
        null,
        'NoNota',
        'TglTransaksi',
        'SelesaiDate',
        'DiambilDate',
        'Nama',
        'StatusKaryawan',
        'NIK',
        null,
        null,
        null,
        'StatusPelayanan',
        null,
        'ApproveBy',
        'ApproveDate',
        null,
        null,
    ];

    private function _apply_search_approval()
    {
        $this->db->where('IDStatusPelayanan', 3);
        $this->db->where('ApproveStatus', 1);

        $searchValue = isset($_POST['search']['value']) ? trim($_POST['search']['value']) : '';
        if ($searchValue !== '') {
            $i = 0;
            foreach ($this->column_search_approval as $item) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like('CONVERT(VARCHAR(25),' . $item . ',126)', $searchValue);
                } else {
                    $this->db->or_like($item, $searchValue);
                }
                if (count($this->column_search_approval) - 1 == $i) {
                    $this->db->group_end();
                }
                $i++;
            }
        }
    }

    public function get_datatables_approval()
    {
        $this->db->select('*');
        $this->db->from($this->view);
        $this->_apply_search_approval();

        if (isset($_POST['order'])) {
            $colIndex = (int)$_POST['order']['0']['column'];
            $colDir   = $_POST['order']['0']['dir'];
            if (!empty($this->column_order_approval[$colIndex])) {
                $this->db->order_by($this->column_order_approval[$colIndex], $colDir);
            }
        } else {
            $this->db->order_by('ID', 'desc');
        }

        $length = isset($_POST['length']) ? (int)$_POST['length'] : 10;
        $start  = isset($_POST['start'])  ? (int)$_POST['start']  : 0;
        if ($length != -1) {
            $this->db->limit($length, $start);
        }

        $query = $this->db->get();
        return ($query !== false) ? $query->result() : [];
    }

    public function count_filtered_approval()
    {
        $this->db->select('COUNT(*) as total', false);
        $this->db->from($this->view);
        $this->_apply_search_approval();

        $query = $this->db->get();
        if ($query !== false) {
            $row = $query->row();
            return $row ? (int)$row->total : 0;
        }
        return 0;
    }

    public function count_all_approval()
    {
        $this->db->where('IDStatusPelayanan', 3);
        $this->db->where('ApproveStatus', 1);
        return (int)$this->db->from($this->view)->count_all_results();
    }

    // =============================================
    // QUERY LAINNYA
    // =============================================

    function get_Vlaundry($limit = 500)
    {
        $query = $this->db->query("SELECT TOP $limit * FROM vwMonitoringLaundry ORDER BY ID DESC");
        if (!$query) {
            log_message('error', 'get_Vlaundry Error: ' . $this->db->error()['message']);
            return [];
        }
        return $query->result();
    }

    function get_Vapproval()
    {
        $query = $this->db->query(
            "SELECT TOP 500 * FROM vwMonitoringLaundry
             WHERE IDStatusPelayanan = 3 AND ApproveStatus = 1
             ORDER BY ID DESC"
        );
        return $query ? $query->result() : [];
    }

    function get_dataLaporanBy($id, $IDStatusPelayanan)
    {
        return $this->db->query(
            "UPDATE tblLaundry_TrnLayanan
             SET IDStatusPelayanan = ?, IDLayanan = ?, DiambilBy = NULL, DiambilDate = NULL
             WHERE ID = ?",
            [$IDStatusPelayanan, $IDStatusPelayanan, $id]
        );
    }

    function get_MstStatusLaundry()
    {
        return $this->db->query("SELECT * FROM master_status_laundry WHERE NotActive = 0")->result();
    }

    function get_MstPembayaranLaundry()
    {
        return $this->db->query("SELECT * FROM master_pembayaran_laundry WHERE NotActive = 0")->result();
    }

    function get_MstHargaLaundry()
    {
        return $this->db->query("SELECT * FROM master_harga_laundry WHERE NotActive = 0")->result();
    }

    function get_vLaundryAll()
    {
        return $this->db->query("SELECT * FROM vwMonitoringLaundry ORDER BY TglTransaksi ASC")->result();
    }

    function get_vApproveAll()
    {
        return $this->db->query("SELECT * FROM vwMonitoringLaundry WHERE ApproveStatus = 1 ORDER BY TglTransaksi ASC")->result();
    }

    function get_vLaundryByTwoDate($tgl_1, $tgl_2, $status_pelanggan, $jenis_pembayaran, $status_laundry)
    {
        $this->db->where('TglTransaksi >=', $tgl_1);
        $this->db->where('TglTransaksi <=', date('Y-m-d', strtotime("+1 day", strtotime($tgl_2))));
        if ($status_pelanggan != '') $this->db->where('StatusKaryawan', $status_pelanggan);
        if ($jenis_pembayaran  != '') $this->db->where('JenisPembayaran', $jenis_pembayaran);
        if ($status_laundry    != '') $this->db->where('StatusPelayanan', $status_laundry);
        $this->db->order_by("TglTransaksi", "ASC");
        return $this->db->get('vwMonitoringLaundry')->result();
    }

    function get_vApproveByTwoDate($tgl_1, $tgl_2, $status_pelanggan)
    {
        return $this->db->query(
            "SELECT * FROM vwMonitoringLaundry
             WHERE TglTransaksi BETWEEN ? AND ?
               AND ApproveStatus = 1 AND StatusKaryawan = ?
             ORDER BY TglTransaksi ASC",
            [$tgl_1, $tgl_2, $status_pelanggan]
        )->result();
    }

    function get_monitoring_approve($tgl_trans_now, $periodeapproval_now, $status_tk)
    {
        return $this->db->query(
            "SELECT * FROM vwMonitoringLaundry
             WHERE PeriodeApprove = ? AND TglTransaksi >= ?
               AND StatusTK = ? AND ApproveStatus = 1
             ORDER BY TglTransaksi ASC",
            [$periodeapproval_now, $tgl_trans_now, $status_tk]
        )->result();
    }

    function get_monitoring_approve_kar($tgl_trans_now, $tgl_trans_before, $periodeapproval_now, $status_tk)
    {
        return $this->db->query(
            "SELECT * FROM vwMonitoringLaundry
             WHERE PeriodeApprove <= ?
               AND CONVERT(VARCHAR, TglTransaksi, 23) < ?
               AND CONVERT(VARCHAR, TglTransaksi, 23) >= ?
               AND StatusTK = ? AND ApproveStatus = 1
             ORDER BY TglTransaksi ASC",
            [$periodeapproval_now, $tgl_trans_now, $tgl_trans_before, $status_tk]
        )->result();
    }

    function get_vApproveByTanggal($tanggal_1, $tanggal_2)
    {
        return $this->db->query(
            "SELECT * FROM vwMonitoringLaundry
             WHERE TglTransaksi BETWEEN ? AND ? AND ApproveStatus = 1
             ORDER BY TglTransaksi ASC",
            [$tanggal_1, $tanggal_2]
        )->result();
    }

    function get_vOnlyKaryawan($status_pelanggan)
    {
        return $this->db->query(
            "SELECT * FROM vwMonitoringLaundry WHERE ApproveStatus = 1 AND StatusKaryawan = ?",
            [$status_pelanggan]
        )->result();
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
        if ($status_pelanggan != '') $this->db->where('StatusKaryawan', $status_pelanggan);
        if ($jenis_pembayaran  != '') $this->db->where('JenisPembayaran', $jenis_pembayaran);
        if ($status_laundry    != '') $this->db->where('StatusPelayanan', $status_laundry);
        $this->db->order_by("TglTransaksi", "ASC");
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
        if ($status_pelanggan != '') $this->db->where('StatusKaryawan', $status_pelanggan);
        $this->db->where('ApproveStatus', 1);
        $this->db->order_by("ApproveDate", "ASC");
        return $this->db->get('vwMonitoringLaundry')->result();
    }

    public function getListData($tanggal_1, $tanggal_2, $StatusKaryawan, $pembayaran, $laundry_status)
    {
        return $this->db->query(
            "SELECT * FROM $this->view
             WHERE CONVERT(VARCHAR, TglTransaksi, 23) >= ?
               AND CONVERT(VARCHAR, TglTransaksi, 23) <= ?
               AND StatusKaryawan = ? AND JenisPembayaran = ? AND StatusPelayanan = ?
             ORDER BY TglTransaksi ASC",
            [$tanggal_1, $tanggal_2, $StatusKaryawan, $pembayaran, $laundry_status]
        )->result();
    }

    public function getListDataFilterByStatus($tanggal_1, $tanggal_2, $status)
    {
        return $this->db->query(
            "SELECT * FROM vwMonitoringLaundry
             WHERE CONVERT(VARCHAR, TglTransaksi, 23) >= ?
               AND CONVERT(VARCHAR, TglTransaksi, 23) <= ?
               AND StatusKaryawan = ?
             ORDER BY TglTransaksi ASC",
            [$tanggal_1, $tanggal_2, $status]
        )->result();
    }

    public function getListDataFilterByDate($tanggal_1, $tanggal_2)
    {
        return $this->db->query(
            "SELECT * FROM $this->view
             WHERE CONVERT(VARCHAR, TglTransaksi, 23) >= ?
               AND CONVERT(VARCHAR, TglTransaksi, 23) <= ?
             ORDER BY TglTransaksi ASC",
            [$tanggal_1, $tanggal_2]
        )->result();
    }
}
