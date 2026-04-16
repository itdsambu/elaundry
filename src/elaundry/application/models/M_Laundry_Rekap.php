<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Laundry_Rekap extends CI_Model
{

    private $primary_key = 'KategoriID';
    private $table_name  = 'tblMstKategori';
    private $pos_laundry = 'tbl_mst_pos_laundry';

    function __construct()
    {
        parent::__construct();
    }

    function getDataPetugas($tanggal_awal, $tanggal_akhir)
    {
        $query = "SELECT
            b.NamaUser,
            b.DeptID,
            b.nik,
            b.JabID,
            b.status_petugas 
        FROM
            tblLaundry_TrnLayanan AS a
            LEFT JOIN tblUtlLogin AS b ON a.CreatedBy = b.NamaUser 
            AND a.TglTransaksi BETWEEN '" . $tanggal_awal . "' 
            AND '" . $tanggal_akhir . "' 
            AND b.status_petugas = '1' 
        WHERE
            b.NamaUser IS NOT NULL 
        GROUP BY
            b.NamaUser,
            b.DeptID,
            b.nik,
            b.JabID,
            b.status_petugas;";

            return $this->db->query($query)->result();
    }

    function get_data_header($nik, $tanggal_awal, $tanggal_akhir)
    {
        $row  = "SELECT NamaUser FROM tblUtlLogin WHERE nik = '" . $nik . "'";
        $data = $this->db->query($row)->result();
        foreach ($data as $key) {
            $nama = $key->NamaUser;
        }

        $query =  "SELECT * FROM tblLaundry_TrnLayanan as a  WHERE a.TglTransaksi BETWEEN '" . $tanggal_awal . "' AND '" . $tanggal_akhir . "' AND CreatedBy is not null AND CreatedBy = '" . $nama . "'";
        return $this->db->query($query)->result();
    }

    function get_detail_harian($idheader)
    {
        $query =  "SELECT * FROM tbl_Dtl_Laundry WHERE header_id = " . $idheader . "";
        return $this->db->query($query)->result();
    }

    function get_top50_report()
    {
        $query = $this->db->query(
            "SELECT TOP 50 a.*, a.pos_ldy,b.nama_laundry, b.alamat, b.warna_laundry FROM tblLaundryRekap a LEFT JOIN tbl_mst_pos_laundry b on a.pos_ldy=b.detail_id  WHERE create_status = '1' ORDER BY a.rekap_id DESC"
        );
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_allpos_laundry()
    {
        $this->db->from('tbl_mst_pos_laundry');
        $this->db->where('inactive', 0);
        $this->db->order_by(1, 'ASC');

        // if (!$this->db->get()->result()) {
        //     // 	print_r($data);
        //     print_r($this->db->error());
        // }
        // exit;
        return $this->db->get()->result();
    }

    function get_detail_posting($nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan)
    {
        $this->db->from('tblLaundryRekap');
        $this->db->where('rekap_jns', $nama_laporan);
        // $query = $this->db->query("SELECT * FROM tblLaundryRekap WHERE rekap_jns='$nama_laporan' AND rekap_status_pekerja='$tipe_laporan' AND rekap_bulan='$bln_laporan' AND rekap_tahun='$thn_laporan'");
        if ($nama_laporan == 'Rekap1') {
            $query = $this->db->query(
                "SELECT TOP 1 *,                                        
                                        
                                        'MADYO SANTOSO' as app2_v2_by,
                                        app2_date as app2_v2_date,
                                        app2_comp as app2_v2_comp,
                                        app2_status as app2_v2_status,
                                        'Staff Executive' as app2_v2_jabatan,
                                        '2168' as app2_v2_personalid,
                                        '1' as app2_v2_personalstatus, -- app spesial edisi :D

                                        (SELECT TOP 1 personalid FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.create_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.create_jabatan COLLATE DATABASE_DEFAULT) as create_personalid,
                                        (SELECT TOP 1 personalid FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.app1_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.app1_jabatan COLLATE DATABASE_DEFAULT) as app1_personalid,
                                        (SELECT TOP 1 personalid FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.app2_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.app2_jabatan COLLATE DATABASE_DEFAULT) as app2_personalid,
                                        (SELECT TOP 1 personalid FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.app3_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.app3_jabatan COLLATE DATABASE_DEFAULT) as app3_personalid,
                                        (SELECT TOP 1 personalid FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.app4_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.app4_jabatan COLLATE DATABASE_DEFAULT) as app4_personalid,

                                        (SELECT TOP 1 personalstatus FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.create_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.create_jabatan COLLATE DATABASE_DEFAULT) as create_personalstatus,
                                        (SELECT TOP 1 personalstatus FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.app1_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.app1_jabatan COLLATE DATABASE_DEFAULT) as app1_personalstatus,
                                        (SELECT TOP 1 personalstatus FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.app2_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.app2_jabatan COLLATE DATABASE_DEFAULT) as app2_personalstatus,
                                        (SELECT TOP 1 personalstatus FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.app3_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.app3_jabatan COLLATE DATABASE_DEFAULT) as app3_personalstatus,
                                        (SELECT TOP 1 personalstatus FROM tblMstUser WHERE personalid IS NOT NULL AND Nama=tblLaundryRekap.app4_by COLLATE DATABASE_DEFAULT AND Jabatan=tblLaundryRekap.app4_jabatan COLLATE DATABASE_DEFAULT) as app4_personalstatus
                                    FROM 
                                        tblLaundryRekap 
                                    WHERE 
                                        rekap_jns='Rekap2' 
                                        AND rekap_bulan='$bln_laporan' 
                                        AND rekap_tahun='$thn_laporan' 
                                    ORDER BY 
                                        rekap_ID DESC");
        } elseif ($nama_laporan == 'Rekap2') {
            if ($tipe_laporan == '1') {
                $query = $this->db->query("WITH 
                                  t1 as
                                  (SELECT DateValue FROM GenerateDateRange('" . $tanggal_awal . "', '" . $tanggal_akhir . "', 1)),
                                  t2 as
                                  (SELECT * FROM fnTanggalPotonganLaundryKR())
                                  select t1.*, t2.* from t1 left join t2 on t1.DateValue=t2.tanggal
                                  where t1.DateValue is not null and t2.tanggal is not null");
            } elseif ($tipe_laporan == '2') {
                $query = $this->db->query("WITH 
                                  t1 as
                                  (SELECT DateValue FROM GenerateDateRange('" . $tanggal_awal . "', '" . $tanggal_akhir . "', 1)),
                                  t2 as
                                  (SELECT * FROM fnTanggalPotonganLaundryTK())
                                  select t1.*, t2.* from t1 left join t2 on t1.DateValue=t2.tanggal
                                  where t1.DateValue is not null and t2.tanggal is not null");
            } else {
                $query = $this->db->query("WITH 
                                  t1 as
                                  (SELECT DateValue FROM GenerateDateRange('" . $tanggal_awal . "', '" . $tanggal_akhir . "', 1)),
                                  t2 as
                                  (SELECT * FROM fnTanggalPotonganLaundryTK()),
                                  t3 as 
                                  (SELECT * FROM fnTanggalPotonganLaundryKR())
                                  select t1.*, t2.*, t3.* from t1 left join t2 on t1.DateValue=t2.tanggal
                                  left join t3 on t1.DateValue=t3.tanggal
                                  where t1.DateValue is not null and t2.tanggal is not null and t3.tanggal is not null");
            }
        } elseif ($nama_laporan == 'Rekap3') {
            $query = $this->db->query("SELECT * FROM tblLaundryRekap WHERE rekap_jns='$nama_laporan' AND rekap_bulan='$bln_laporan' AND rekap_tahun='$thn_laporan'");
        } else {
            $query = $this->db->query("SELECT * FROM tblLaundryRekap WHERE rekap_jns='$nama_laporan' AND rekap_status_pekerja='$tipe_laporan' AND rekap_bulan='$bln_laporan' AND rekap_tahun='$thn_laporan' AND tanggal_awal='$tanggal_awal' AND tanggal_akhir='$tanggal_akhir'");
        }
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_detail_rekap3($nama_laporan, $thn_laporan, $pos_ldy)
    {

        $query = $this->db->query("WITH mths AS (
            SELECT
                1 AS mth,
                DATENAME( MONTH, CAST ( " . $thn_laporan . " * 100+1 AS VARCHAR ) + '01' ) AS monthname UNION ALL
            SELECT
                mth + 1,
                DATENAME( MONTH, CAST ( " . $thn_laporan . " * 100+ ( mth + 1 ) AS VARCHAR ) + '01' ) 
            FROM
                mths 
            WHERE
                mth < 12 
            ),
            t1 AS (
            SELECT
                * 
            FROM
                (
                SELECT COALESCE
                    ( SUM ( COALESCE ( n.total, 0 ) ), 0 ) AS TotalHarga,
                    n.keterangan_bayar,
                    n.periode 
                FROM
                    (
                    SELECT COALESCE
                        ( a.TotalTagihan, 0 ) AS total,
                    CASE
                            
                            WHEN a.cash= '0' THEN
                            'potong_gaji' 
                            WHEN a.cash= '1' THEN
                            'cash' ELSE 'lainnya' 
                        END AS keterangan_bayar,
                    CASE
                            
                            WHEN ( a.StatusTK = '1' OR a.StatusTK = '3' OR a.StatusTK = '4' ) 
                            AND DAY ( a.TglTransaksi ) > 25 THEN
                                CONVERT (
                                    VARCHAR ( 7 ),
                                    DATEADD(
                                        dd,- ( DAY ( DATEADD( mm, 1, a.TglTransaksi ) ) - 1 ),
                                        DATEADD( mm, 1, a.TglTransaksi ) 
                                    ),
                                    126 
                                ) ELSE CONVERT ( VARCHAR ( 7 ), a.TglTransaksi, 126 ) 
                            END AS periode 
                        FROM
                            tblLaundry_TrnLayanan AS a
                        WHERE
                            a.pos_ldy= '" . $pos_ldy . "' 
                            AND a.TglTransaksi IS NOT NULL
                            AND a.ApproveStatus IS NOT NULL 
                        ) n 
                    WHERE
                        n.periode LIKE '%" . $thn_laporan . "%' 
                    GROUP BY
                        n.periode,
                        n.keterangan_bayar 
                    ) d PIVOT ( MAX ( TotalHarga ) FOR keterangan_bayar IN ( potong_gaji, cash, lainnya ) ) piv 
                ),
                t2 AS (
                SELECT
                    * 
                FROM
                    (
                    SELECT COALESCE
                        ( SUM ( COALESCE ( n.berat, 0 ) ), 0 ) AS TotalBerat,
                        n.keterangan_bayar,
                        n.periode 
                    FROM
                        (
                        SELECT COALESCE
                            ( CAST ( a.JumlahBerat AS DECIMAL ( 8, 1 ) ), 0 ) AS berat,
                        CASE
                                
                                WHEN a.cash= '0' THEN
                                'potong_gaji' 
                                WHEN a.cash= '1' THEN
                                'cash' ELSE 'lainnya' 
                            END AS keterangan_bayar,
                        CASE
                                
                                WHEN ( a.StatusTK = '1' OR a.StatusTK = '3' OR a.StatusTK = '4' ) 
                                AND DAY ( a.TglTransaksi ) > 25 THEN
                                    CONVERT (
                                        VARCHAR ( 7 ),
                                        DATEADD(
                                            dd,- ( DAY ( DATEADD( mm, 1, a.TglTransaksi ) ) - 1 ),
                                            DATEADD( mm, 1, a.TglTransaksi ) 
                                        ),
                                        126 
                                    ) ELSE CONVERT ( VARCHAR ( 7 ), a.TglTransaksi, 126 ) 
                                END AS periode 
                            FROM
                                tblLaundry_TrnLayanan AS a
                            WHERE
                                a.pos_ldy= '" . $pos_ldy . "' 
                                AND a.TglTransaksi IS NOT NULL
                                AND a.ApproveStatus IS NOT NULL 
                            ) n 
                        WHERE
                            n.periode LIKE '%" . $thn_laporan . "%' 
                        GROUP BY
                            n.periode,
                            n.keterangan_bayar 
                        ) d PIVOT ( MAX ( TotalBerat ) FOR keterangan_bayar IN ( potong_gaji, cash, lainnya ) ) piv 
                    ),
                    t3 AS (
                    SELECT
                        *,
                        (
                        SELECT TOP
                            1 personalid 
                        FROM
                            vwUtlLogin 
                        WHERE
                            personalid IS NOT NULL 
                            AND NamaUser = tblLaundryRekap.app1_by COLLATE DATABASE_DEFAULT 
                            AND Nama_jab = tblLaundryRekap.app1_jabatan COLLATE DATABASE_DEFAULT 
                        ) AS app1_personalid,
                        (
                        SELECT TOP
                            1 personalid 
                        FROM
                            vwUtlLogin 
                        WHERE
                            personalid IS NOT NULL 
                            AND NamaUser = tblLaundryRekap.app2_by COLLATE DATABASE_DEFAULT 
                            AND Nama_jab = tblLaundryRekap.app2_jabatan COLLATE DATABASE_DEFAULT 
                        ) AS app2_personalid,
                        (
                        SELECT TOP
                            1 personalid 
                        FROM
                            vwUtlLogin 
                        WHERE
                            personalid IS NOT NULL 
                            AND NamaUser = tblLaundryRekap.app3_by COLLATE DATABASE_DEFAULT 
                            AND Nama_jab = tblLaundryRekap.app3_jabatan COLLATE DATABASE_DEFAULT 
                        ) AS app3_personalid,
                        (
                        SELECT TOP
                            1 personalid 
                        FROM
                            vwUtlLogin 
                        WHERE
                            personalid IS NOT NULL 
                            AND NamaUser = tblLaundryRekap.app4_by COLLATE DATABASE_DEFAULT 
                            AND Nama_jab = tblLaundryRekap.app4_jabatan COLLATE DATABASE_DEFAULT 
                        ) AS app4_personalid,
                        (
                        SELECT TOP
                            1 personalstatus 
                        FROM
                            vwUtlLogin 
                        WHERE
                            personalid IS NOT NULL 
                            AND NamaUser = tblLaundryRekap.app1_by COLLATE DATABASE_DEFAULT 
                            AND Nama_jab = tblLaundryRekap.app1_jabatan COLLATE DATABASE_DEFAULT 
                        ) AS app1_personalstatus,
                        (
                        SELECT TOP
                            1 personalstatus 
                        FROM
                            vwUtlLogin 
                        WHERE
                            personalid IS NOT NULL 
                            AND NamaUser = tblLaundryRekap.app2_by COLLATE DATABASE_DEFAULT 
                            AND Nama_jab = tblLaundryRekap.app2_jabatan COLLATE DATABASE_DEFAULT 
                        ) AS app2_personalstatus,
                        (
                        SELECT TOP
                            1 personalstatus 
                        FROM
                            vwUtlLogin 
                        WHERE
                            personalid IS NOT NULL 
                            AND NamaUser = tblLaundryRekap.app3_by COLLATE DATABASE_DEFAULT 
                            AND Nama_jab = tblLaundryRekap.app3_jabatan COLLATE DATABASE_DEFAULT 
                        ) AS app3_personalstatus,
                        (
                        SELECT TOP
                            1 personalstatus 
                        FROM
                            vwUtlLogin 
                        WHERE
                            personalid IS NOT NULL 
                            AND NamaUser = tblLaundryRekap.app4_by COLLATE DATABASE_DEFAULT 
                            AND Nama_jab = tblLaundryRekap.app4_jabatan COLLATE DATABASE_DEFAULT 
                        ) AS app4_personalstatus 
                    FROM
                        tblLaundryRekap 
                    WHERE
                        pos_ldy = '" . $pos_ldy . "' 
                        AND rekap_tahun = '" . $thn_laporan . "' 
                    ) SELECT
                    mths.*,
                    t1.*,
                    t2.potong_gaji AS berat_potong_gaji,
                    t2.cash AS berat_cash,
                    t2.lainnya AS berat_lainnya,t3.* 
                FROM
                    mths
                    FULL JOIN t1 ON CAST ( mths.mth AS INT ) = CAST ( RIGHT ( t1.periode, 2 ) AS INT )
                    FULL JOIN t2 ON CAST ( mths.mth AS INT ) = CAST ( RIGHT ( t2.periode, 2 ) AS INT ) LEFT JOIN t3 ON mths.mth= t3.rekap_bulan
            ORDER BY
            mths.mth ASC;");

        // var_dump($query);die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_row($thn_laporan, $pos_ldy)
    {
        $query = $this->db->query("SELECT *  FROM tblLaundryRekap WHERE rekap_tahun = '$thn_laporan' AND pos_ldy = '$pos_ldy'");

        // print_r($query->num_rows());
        // exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_row2($thn_laporan, $pos_ldy, $bulan)
    {
        $query = $this->db->query("SELECT *  FROM tblLaundryRekap WHERE rekap_tahun = '$thn_laporan' AND pos_ldy = '$pos_ldy' AND rekap_bulan = '$bulan'");

        // print_r($query->num_rows());
        // exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_detail_rekap3_allperiode($pos_ldy)
    {
        $query = $this->db->query(
            "SELECT
              *
            FROM
              vw_laundry_allperiode_pascaapp
            where
              pos_ldy='$pos_ldy'
            UNION
            SELECT
              periode,
              pos_ldy,
              CAST(potong_gaji AS DECIMAL ( 18, 2 )) potong_gaji,
              CAST(cash AS DECIMAL ( 18, 2 )) cash,
              CAST(lainnya AS DECIMAL ( 18, 2 )) lainnya,
              CAST(berat_potong_gaji AS DECIMAL ( 18, 2 )) berat_potong_gaji,
              CAST(berat_cash AS DECIMAL ( 18, 2 )) berat_cash,
              CAST(berat_lainnya AS DECIMAL ( 18, 2 )) berat_lainnya 
            FROM
              tbl_laundry_allperiode_praapp
            where
              pos_ldy='$pos_ldy'
            order by 
              periode asc"
        );
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function get_detail_rekap3_allperiodee($pos_ldy)
    {
        $query = $this->db->query("SELECT
            a.* 
        FROM
            vw_laundry_allperiode_pascaapp a
            INNER JOIN tblLaundryRekap b ON a.pos_ldy= b.pos_ldy 
            AND (
                SUBSTRING ( a.periode, 6, 7 ) LIKE b.rekap_bulan 
                OR SUBSTRING ( a.periode, 7, 7 ) LIKE b.rekap_bulan 
            ) 
        WHERE
            a.pos_ldy = '$pos_ldy' UNION
        SELECT
            periode,
            pos_ldy,
            CAST ( potong_gaji AS DECIMAL ( 18, 2 ) ) potong_gaji,
            CAST ( cash AS DECIMAL ( 18, 2 ) ) cash,
            CAST ( lainnya AS DECIMAL ( 18, 2 ) ) lainnya,
            CAST ( berat_potong_gaji AS DECIMAL ( 18, 2 ) ) berat_potong_gaji,
            CAST ( berat_cash AS DECIMAL ( 18, 2 ) ) berat_cash,
            CAST ( berat_lainnya AS DECIMAL ( 18, 2 ) ) berat_lainnya 
        FROM
            tbl_laundry_allperiode_praapp 
        WHERE
            pos_ldy = '$pos_ldy' 
        ORDER BY
            periode ASC");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function insert_rekap($data2)
    {
        $this->db->trans_begin();
        $this->db->insert('tblLaundryRekap', $data2);
        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $result = 0;
        } else {
            $this->db->trans_commit();
            $result = 1;
        }
        return $result;
        return TRUE;

        // if (!$this->db->insert('tblLaundryRekap', $data2)) {
        //     print_r($data2);
        //     print_r($this->db->error());
        // }
        // exit;
        // $this->db->insert('tblLaundryRekap', $data2);
        // $hdrid = $this->db->insert_id();
        // return $hdrid;
    }

    function updateLaundryRekap($get_rekap_id, $data_status) {
        $this->db->trans_begin();
		$this->db->where('rekap_id', $get_rekap_id);
		$this->db->update('tblLaundryRekap', $data_status);
		if ($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();
			$result = 0;
		} else {
			$this->db->trans_commit();
			$result = 1;
		}
		return $result;
    }
}
