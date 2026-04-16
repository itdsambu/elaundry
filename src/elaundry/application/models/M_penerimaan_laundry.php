<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_penerimaan_laundry extends CI_Model
{
    private $table_name  = 'tblLaundry_TrnLayanan';
    function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->db2 = $this->load->database('db2', TRUE);
    }

    function getTrnLayananHdr($pos_ldy)
    {
        if (trim($pos_ldy) != '') {
            $kondisi_pos_ldy = "AND pos_ldy = '$pos_ldy'";
        } else {
            $kondisi_pos_ldy = "";
        }

        $query = $this->db->query("SELECT
                                        b.detail_id ldy_detail_id,
                                        b.nama_laundry ldy_nama,
                                        b.alamat ldy_alamat,
                                        b.warna_laundry ldy_warna,
                                        a.* 
                                    FROM
                                        tblLaundry_TrnLayanan a
                                        JOIN tbl_mst_pos_laundry b ON a.pos_ldy= b.detail_id 
                                        AND b.inactive= 0 
                                    WHERE
                                        a.IDStatusPelayanan= 1 
                                        $kondisi_pos_ldy 
                                        AND a.Hapus= 0 
                                    ORDER BY
                                        a.ID DESC;");
        return $query->result();
    }

    function getTrnLayananHdrPengambilan($pos_ldy)
    {
        if (trim($pos_ldy) != '') {
            $kondisi_pos_ldy = "AND pos_ldy = '$pos_ldy'";
        } else {
            $kondisi_pos_ldy = "";
        }

        $query = $this->db->query("SELECT
                                        b.detail_id ldy_detail_id,
                                        b.nama_laundry ldy_nama,
                                        b.alamat ldy_alamat,
                                        b.warna_laundry ldy_warna,
                                        a.*
                                    FROM
                                        tblLaundry_TrnLayanan a
                                        JOIN tbl_mst_pos_laundry b ON a.pos_ldy= b.detail_id
                                        AND b.inactive= 0
                                    WHERE
                                        ( a.IDStatusPelayanan= 2 OR a.IDStatusPelayanan= 4 )
                                        -- 		 IDStatusPelayanan = 1
                                        --  OR IDStatusPelayanan = 4
                                        $kondisi_pos_ldy
                                        AND a.Hapus= 0
                                    ORDER BY
                                        a.ID DESC;");
        return $query->result();
    }

    function get_MstStatusLaundry()
    {
        $query = $this->db->query("SELECT * FROM master_status_laundry WHERE NotActive='0'");
        return $query->result();
    }

    function get_MstHargaLaundry()
    {
        $query = $this->db->query("SELECT * FROM master_harga_laundry WHERE NotActive='0'");
        return $query->result();
    }

    function get_dataHeaderid($id)
    {
        $query = $this->db->query("SELECT * FROM tblLaundry_TrnLayanan where ID = '$id'");
        return $query->result();
    }

    function get_detailLaundry($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_Dtl_Laundry where header_id = '$id'");
        return $query->result();
    }

    function get_detailLaundryAmbil($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_Dtl_Laundry where header_id = '$id' and ceklist=0");
        return $query->result();
    }

    function get_detailLaundryOut($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_Dtl_Laundry where header_id = '$id' and ceklist=1");
        return $query->result();
    }

    function get_MstPembayaranLaundry()
    {
        $query = $this->db->query("SELECT * FROM master_pembayaran_laundry WHERE NotActive='0'");
        return $query->result();
    }

    function get_vwItemKategory()
    {
        $query = $this->db->query("SELECT * FROM vw_itemkategory WHERE NotActive='0'");
        return $query->result();
    }

    function get_AllKategoriLanudry()
    {
        $query = $this->db->query("SELECT * FROM master_kategory_laundry WHERE NotActive='0'");
        return $query->result();
    }

    function get_AllItemLaundry()
    {
        $query = $this->db->query("SELECT * FROM master_item_laundry WHERE NotActive='0'");
        return $query->result();
    }

    function get_MstLokasiLaundry()
    {
        $query = $this->db->query("SELECT * FROM master_lokasi_laundry WHERE NotActive='0'");
        return $query->result();
    }

    function get_MstPosLaundry()
    {
        $query = $this->db->query("SELECT * FROM tbl_mst_pos_laundry WHERE inactive='0'");
        return $query->result();
    }

    function get_MstKategory()
    {
        $query = $this->db->query("SELECT * FROM master_kategory_laundry WHERE NotActive='0'");
        return $query->result();
    }

    function get_DataTK($StatusTK, $NIK)
    {
        $query = $this->db->query(
            "SELECT
				* 
			FROM
				PSGKlinik..vw_sambupedia_all_pekerja_aktif 
			WHERE
				personalstatus = '$StatusTK' 
				AND ( nik = '$NIK' OR nama LIKE '%$NIK%' AND tgl_keluar IS NULL)
				AND tglkeluar_temp IS NULL"
        );
        return $query->result();
        // var_dump($query);die;
    }

    function get_last_hdr_id()
    {
        // $query = $this->db->query()
        $query = $this->db->query("SELECT TOP 1 NoNota as Nota from tblLaundry_TrnLayanan order by ID desc");
        if ($query->num_rows() == 0) {
            return array();
        } else {
            return $query->row()->Nota;
        }
    }

    function get_link_upload($id)
    {
        return $this->db->query("SELECT link_upload_label from tblLaundry_TrnLayanan where ID='$id'")->row()->link_upload_label;
    }

    function get_link_uploaddetail($id)
    {
        return $this->db->query("SELECT link_upload_itemdetail from tbl_Dtl_Laundry where detail_id='$id'")->row()->link_upload_itemdetail;
    }

    function get_DtlFotoByHdr($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_foto_laundry WHERE header_id='$id'");
        return $query->result();
    }

    function simpanHeader($data)
    {
        // if (!$this->db->insert('tblLaundry_TrnLayanan', $data)) {
        // 	print_r($data);
        // 	print_r($this->db->error());
        // }
        // exit;
        $this->db->insert('tblLaundry_TrnLayanan', $data);
        $hdrid = $this->db->insert_id();
        return $hdrid;
    }

    function getheaderid_detail($id)
    {
        return $this->db->query("SELECT header_id from tbl_Dtl_Laundry where detail_id='$id'")->row()->header_id;
    }

    // function get_dtl_id()
    // {
    // 	$dtl = $this->db->query("select max(detail_id) from tbl_Dtl_Laundry");
    // 	print_r($dtl);
    // 	exit;
    // 	return $dtl;
    // }

    function insertFoto($data)
    {
        $this->db->insert('tbl_foto_laundry', $data);
    }

    function simpanDetail($data)
    {
        $this->db->insert('tbl_Dtl_Laundry', $data);
    }

    function sendToTelegram($data)
    {
        $this->db2->insert('telegramoutbox', $data);
    }

    function updateHeaderSelesai($id, $data)
    {
        $this->db->where('ID', $id);
        $this->db->update('tblLaundry_TrnLayanan', $data);
    }

    function updateHeaderDiambil($id, $data)
    {
        $this->db->where('ID', $id);
        $this->db->update('tblLaundry_TrnLayanan', $data);
    }

    function updateDetail($id, $data)
    {
        $this->db->where('detail_id', $id);
        $this->db->update('tbl_Dtl_Laundry', $data);
    }

    function updateForm($hdrid, $data)
    {
        $this->db->where('ID', $hdrid);
        $this->db->update('tblLaundry_TrnLayanan', $data);
    }

    function delete($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete($this->table_name);
    }

    function cek_data_rekap2($tanggal_selesai, $StatusTK)
    {
        if ($StatusTK == '1') {
            $query =  $this->db->query("SELECT * FROM fnTanggalPotonganLaundryKR() where tanggal='" . $tanggal_selesai . "'");
        } elseif ($StatusTK == '2') {
            $query =  $this->db->query("SELECT * FROM fnTanggalPotonganLaundryTK() where tanggal='" . $tanggal_selesai . "'");
        } else {
            /*$query =  $this->db->query("SELECT * FROM fnTanggalPotonganLaundryKR() where tanggal='".$tanggal_selesai."'
                                    UNION ALL 
                                 SELECT * FROM fnTanggalPotonganLaundryKR() where tanggal='".$tanggal_selesai."'");*/
            $query =  $this->db->query("SELECT * FROM fnTanggalPotonganLaundryKR() where tanggal='" . $tanggal_selesai . "'");
        }

        return $query;
    }

    function dt_nota($tahun, $bulan, $pos_ldy)
    {
        $kode_laundry = $this->db->query("SELECT kode_laundry FROM tbl_mst_pos_laundry WHERE detail_id='$pos_ldy'")->row()->kode_laundry;

        $query = "SELECT
                  CONCAT (RIGHT('000'+ CONVERT(VARCHAR,
                     (SELECT COALESCE( CAST ( MAX ( SUBSTRING ( NoNota, 1, 3 ) + 1) AS INTEGER ), 1 ) 
                FROM
				tblLaundry_TrnLayanan 
                WHERE
                  pos_ldy='$pos_ldy'
                  AND MONTH (ProsesDate) = '$bulan' 
                  AND YEAR (ProsesDate) = '$tahun')),3), '/', '$kode_laundry', '/', '$bulan', '/', '$tahun') AS no_nota";
        // if (!$query) {
        // 	print_r($this->db->error());
        // }
        // die;

        return $this->db->query($query)->result();
    }

    function get_allpos_laundry()
    {
        $this->db->from('tbl_mst_pos_laundry');
        $this->db->where('inactive', 0);
        $this->db->order_by(1, 'ASC');
        return $this->db->get()->result();
    }

    function get_dataLaporanBy($id, $IDStatusPelayanan)
    {
        $query =  $this->db->query("UPDATE tblLaundry_TrnLayanan SET IDStatusPelayanan = '$IDStatusPelayanan' WHERE ID = '$id'");

        return $query;
    }

    function get_getPersonId($signid, $user_name)
    {
        $query =  $this->db->query("SELECT * FROM dbo.tblUtlLogin a LEFT OUTER JOIN dbo.tblutllogonline AS B ON A.LoginID = B.userid WHERE a.LoginID = '$user_name' AND B.signid = '$signid'");

        return $query;
    }
}
