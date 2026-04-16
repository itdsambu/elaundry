<?php

class M_RekapPotongan extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function allRecords()
	{
		$query = $this->db->query(
            "SELECT DISTINCT
                DATEPART( YEAR, TglTransaksi ) AS year,
                DATEPART( MONTH, TglTransaksi ) AS month,
                COUNT ( id ) AS count
            FROM
                vwMonitoringLaundry 
            WHERE
                ApproveStatus = 1 
                AND Cash = 0 
            GROUP BY
                DATEPART( MONTH, TglTransaksi ),
                DATEPART( YEAR, TglTransaksi ) 
            ORDER BY
                month ASC;"
        );
		return $query->result();
	}

    function getRecordsBy($status, $year) {
        // Hos mau nya yang tampil hanya dari bulan pengajuan module ini dimana dari bulan 07 dan seterus nya
        $query = $this->db->query(
            "SELECT DISTINCT
                DATEPART( YEAR, TglTransaksi ) AS year,
                DATEPART( MONTH, TglTransaksi ) AS month,
                COUNT ( id ) AS count 
            FROM
                vwMonitoringLaundry 
            WHERE
                StatusTK = $status
                AND ApproveStatus = 1 
                AND Cash = 0 
                AND DATEPART( YEAR, TglTransaksi ) = $year
                AND DATEPART( MONTH, TglTransaksi ) > 6
            GROUP BY
                DATEPART( MONTH, TglTransaksi ),
                DATEPART( YEAR, TglTransaksi ) 
            ORDER BY
            MONTH ASC"
        );
		return $query->result();
    }

    function getDataRekapKaryawan($PeriodeApprove, $TransAwal, $TransAkhir) {
        $query = $this->db->query(
            "SELECT
            PeriodeApprove,
            RegFixNo,
            statusTK,
            Nik,
            Nama,
            DeptAbbr,
            Perusahaan,
            SUM ( TotalTagihan ) AS TotalTagihan
            FROM
                (
                SELECT
                    PeriodeApprove,
                    RegFixNo,
                    StatusTK,
                    NIK,
                    Nama,
                    DeptAbbr,
                    Perusahaan,
                    TotalTagihan 
                FROM
                    vwMonitoringLaundry 
                WHERE
                    PeriodeApprove <= '$PeriodeApprove'
                    AND CONVERT ( VARCHAR, TglTransaksi, 23 ) < '$TransAwal' 
                    AND CONVERT ( VARCHAR, TglTransaksi, 23 ) >= '$TransAkhir' 
                    AND StatusTK = 1 
                    AND ApproveStatus = 1 
                    AND Cash = 0
                ) AS a 
            GROUP BY
                PeriodeApprove,
                RegFixNo,
                statusTK,
                Nik,
                Nama,
                DeptAbbr,
                Perusahaan 
            ORDER BY
                RegFixNo"
        );
		return $query->result();
    }

    function getRekapHarianPr1($PeriodeApprove, $bukaBuku, $tutpBuku) {
        $query = $this->db->query(
            "SELECT
            PeriodeApprove,
            RegFixNo,
            statusTK,
            Nik,
            Nama,
            DeptAbbr,
            Perusahaan,
            SUM ( TotalTagihan ) AS TotalTagihan
            FROM
                (
                SELECT
                    PeriodeApprove,
                    RegFixNo,
                    StatusTK,
                    NIK,
                    Nama,
                    DeptAbbr,
                    Perusahaan,
                    TotalTagihan 
                FROM
                    vwMonitoringLaundry 
                WHERE
                    PeriodeApprove <= '$PeriodeApprove'
                    AND CONVERT ( VARCHAR, TglTransaksi, 23 ) < '$tutpBuku' 
                    AND CONVERT ( VARCHAR, TglTransaksi, 23 ) >= '$bukaBuku' 
                    AND StatusTK = 2 
                    AND ApproveStatus = 1 
                    AND Cash = 0
                ) AS a 
            GROUP BY
                PeriodeApprove,
                RegFixNo,
                statusTK,
                Nik,
                Nama,
                DeptAbbr,
                Perusahaan 
            ORDER BY
                RegFixNo"
        );
		return $query->result();
    }

    function getRekapHarianPr2($PeriodeApprove, $bukaBuku2, $tutpBuku2) {
        $query = $this->db->query(
            "SELECT
            PeriodeApprove,
            RegFixNo,
            statusTK,
            Nik,
            Nama,
            DeptAbbr,
            Perusahaan,
            SUM ( TotalTagihan ) AS TotalTagihan
            FROM
                (
                SELECT
                    PeriodeApprove,
                    RegFixNo,
                    StatusTK,
                    NIK,
                    Nama,
                    DeptAbbr,
                    Perusahaan,
                    TotalTagihan 
                FROM
                    vwMonitoringLaundry 
                WHERE
                    PeriodeApprove <= '$PeriodeApprove'
                    AND CONVERT ( VARCHAR, TglTransaksi, 23 ) < '$tutpBuku2' 
                    AND CONVERT ( VARCHAR, TglTransaksi, 23 ) >= '$bukaBuku2' 
                    AND StatusTK = 2 
                    AND ApproveStatus = 1 
                    AND Cash = 0
                ) AS a 
            GROUP BY
                PeriodeApprove,
                RegFixNo,
                statusTK,
                Nik,
                Nama,
                DeptAbbr,
                Perusahaan 
            ORDER BY
                RegFixNo"
        );
		return $query->result();
    }

    function getIsApproved($year, $month) {
        $query = $this->db->query(
            "SELECT
                * 
            FROM
                tblLaundryRekap 
            WHERE
                rekap_tahun = $year 
                AND rekap_bulan = $month
            ORDER BY
                rekap_id"
        );
		return $query->result();
    }

    function gerPersonalIdBy($nameUser) {
        $query = $this->db->query("SELECT personalid FROM tblUtlLogin WHERE NamaUser = '$nameUser'");
		return $query->result();
    }
}

/* End of file M_RekapPotongan.php */
