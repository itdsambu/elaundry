<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dataTable extends CI_Model
{
    protected $id = 'ID';
    private $view = 'vwMonitoringLaundry';

    function __construct()
    {
        parent::__construct();
    }

    public $column_order = [
        null,              // 0  - No
        null,              // 1  - Lokasi
        'NoNota',          // 2
        'TglTransaksi',    // 3
        'SelesaiDate',     // 4
        'DiambilDate',     // 5
        'Nama',            // 6
        'StatusKaryawan',  // 7
        'NIK',             // 8
        null,              // 9  - JenisPembayaran
        null,              // 10 - JenisLayanan
        null,              // 11 - JumlahBerat
        null,              // 12 - TotalTagihan
        'StatusPelayanan', // 13
        null,              // 14 - DiambilBy
        null,              // 15 - CreatedBy
        null,              // 16 - Actions
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

    /**
     * Apply WHERE filter + search ke query builder.
     * Dipanggil oleh get_datatables() dan count_filtered().
     */
    private function _apply_search()
    {
        // Filter wajib
        $this->db->where('IDStatusPelayanan', 3);
        $this->db->where('ApproveStatus', 1);

        // Search dari DataTables
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

        // Order
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

        // LIMIT wajib ada — tanpa ini semua data masuk buffer
        $length = isset($_POST['length']) ? (int)$_POST['length'] : 10;
        $start  = isset($_POST['start'])  ? (int)$_POST['start']  : 0;
        if ($length != -1) {
            $this->db->limit($length, $start);
        }

        $query = $this->db->get();
        return ($query !== false) ? $query->result() : [];
    }

    /**
     * PERBAIKAN UTAMA — pakai SELECT COUNT(*) bukan get() + num_rows()
     *
     * num_rows() pada driver SQL Server (sqlsrv) memaksa semua baris
     * dimuat ke memory PHP terlebih dahulu sebelum bisa dihitung.
     * Dengan data > 10.000 baris ini langsung meledak dengan IMSSP/-59.
     *
     * SELECT COUNT(*) hanya mengembalikan 1 baris angka — jauh lebih efisien.
     */
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
}
