<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone', 'Asia/jakarta');

class Laundry_Rekap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model(['M_Laundry_Rekap', 'M_departemen', 'm_jabatan']);
        $this->load->library('user_agent');
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    function laporan()
    {
        $data['username']          = $this->session->userdata('user_id');
        $data['dt_allpos_laundry'] = $this->M_Laundry_Rekap->get_allpos_laundry();

        $data['all_report']        = $this->M_Laundry_Rekap->get_top50_report();

        $this->template->display('laundry/data_laporan', $data);
    }

    public function index()
    {
        $this->template->display('laundry/Rekap_Laundry_Harian');
    }

    public function harian()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');

        $data['dt_petugas'] = $this->M_Laundry_Rekap->getDataPetugas($tanggal_awal, $tanggal_akhir);

        // print_r($data['dt_petugas']);
        // die;
        $data['getDept']  = $this->M_departemen->list_departemen();
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $this->template->display('laundry/Rekap_Laundry_Harian', $data);
    }

    function detail_harian()
    {
        $nik          = $this->uri->segment(3);
        $tanggal_awal  = $this->uri->segment(4);
        $tanggal_akhir = $this->uri->segment(5);
        $row = $this->M_Laundry_Rekap->get_data_header($nik, $tanggal_awal, $tanggal_akhir);
        // print_r($row);
        // die;

        foreach ($row as $key) {
            // print_r($row);
            $idheader = $key->ID;
            $key->baju = 0;
            $key->celana_panjang = 0;
            $key->celana_pendek = 0;
            $key->jaket = 0;
            $key->sprai_selimut = 0;
            $key->lain = 0;

            $col = $this->M_Laundry_Rekap->get_detail_harian($idheader);
            // print_r($col);
            // die;
            foreach ($col as $hasil) {
                if ($hasil->id_item == '4' || $hasil->id_item == '3' || $hasil->id_item == '13' || $hasil->id_item == '16' || $hasil->id_item == '19') {
                    $key->baju = $key->baju + $hasil->jumlah;
                } else if ($hasil->id_item == '10') {
                    $key->celana_panjang = $key->celana_panjang + $hasil->jumlah;
                } else if ($hasil->id_item == '11') {
                    $key->celana_pendek = $key->celana_pendek + $hasil->jumlah;
                } else if ($hasil->id_item == '5') {
                    $key->jaket = $key->jaket + $hasil->jumlah;
                } else if ($hasil->id_item == '24' || $hasil->id_item == '8') {
                    $key->sprai_selimut = $key->sprai_selimut + $hasil->jumlah;
                } else {
                    $key->lain = $key->lain + $hasil->jumlah;
                }
                $petugas = $key->CreatedBy;
            }
        }

        $data['dt_header'] = $row;
        $data['petugas'] = $petugas;
        $this->template->display('laundry/detail_rekap_laundry_harian', $data);
    }

    function get_detail_laporan()
    {

        $n_nama_laporan    = $this->input->post('nama_laporan');
        $n_pos_ldy         = $this->input->post('pos_ldy');
        // $n_tipe_laporan    = $this->input->post('tipe_laporan');
        // $n_periode_laporan = $this->input->post('periode_laporan');
        // $n_bln_laporan     = $this->input->post('bln_laporan');
        $n_thn_laporan     = $this->input->post('thn_laporan');
        // $n_tanggal_awal    = $this->input->post('tanggal_awal');
        // $n_tanggal_akhir   = $this->input->post('tanggal_akhir');

        if (trim($n_nama_laporan) != '') {
            $nama_laporan = $n_nama_laporan;
        } else {
            $nama_laporan = NULL;
        }
        if (trim($n_pos_ldy) != '') {
            $pos_ldy = $n_pos_ldy;
        } else {
            $pos_ldy = NULL;
        }
        // if (trim($n_tipe_laporan) != '') {
        //     $tipe_laporan = $n_tipe_laporan;
        // } else {
        //     $tipe_laporan = NULL;
        // }
        // if (trim($n_periode_laporan) != '') {
        //     $periode_laporan  = $n_periode_laporan;
        // } else {
        //     $periode_laporan = NULL;
        // }
        // if (trim($n_bln_laporan) != '') {
        //     $bln_laporan = $n_bln_laporan;
        // } else {
        //     $bln_laporan = NULL;
        // }
        if (trim($n_thn_laporan) != '') {
            $thn_laporan = $n_thn_laporan;
        } else {
            $thn_laporan = NULL;
        }
        // if (trim($n_tanggal_awal) != '') {
        //     $tanggal_awal   = date("Y-m-d", strtotime($n_tanggal_awal));
        // } else {
        //     $tanggal_awal = NULL;
        // }
        // if (trim($n_tanggal_akhir) != '') {
        //     $tanggal_akhir  = date("Y-m-d", strtotime($n_tanggal_akhir));
        // } else {
        //     $tanggal_akhir = NULL;
        // }

        $data['post_nama_laporan']    = $this->input->post('nama_laporan');
        $data['post_pos_ldy']         = $this->input->post('pos_ldy');
        // $data['post_tipe_laporan']    = $this->input->post('tipe_laporan');
        // $data['post_periode_laporan'] = $this->input->post('periode_laporan');
        // $data['post_bln_laporan']     = $this->input->post('bln_laporan');
        $data['post_thn_laporan']     = $this->input->post('thn_laporan');
        // $data['post_tanggal_awal']    = $this->input->post('tanggal_awal');
        // $data['post_tanggal_akhir']   = $this->input->post('tanggal_akhir');

        $data['username']             = $this->session->userdata('user_id');

        $data['dt_allpos_laundry']    = $this->M_Laundry_Rekap->get_allpos_laundry();

        // $data['detail_posting']       = $this->M_laundry_rekap->get_detail_posting($nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan);

        // if ($nama_laporan == 'Rekap1') {
        //     $data['detail_laporan'] = $this->M_laundry_rekap->get_detail_rekap1($nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan, $pos_ldy);
        //     $this->template->display('laundry/data_laporan', $data);
        // } elseif ($nama_laporan == 'Rekap2') {
        //     $data['detail_laporan'] = $this->M_laundry_rekap->get_detail_rekap2($nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan);
        //     $this->template->display('laundry/data_laporan', $data);
        // } else
        // $x = [$nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan, $pos_ldy];

        if ($nama_laporan == 'Laporan Pendapatan Laundry (Management)') {
            // $data['detail_laporan'] = $this->M_Laundry_Rekap->get_detail_rekap3($nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan, $pos_ldy);
            $data['detail_laporan'] = $this->M_Laundry_Rekap->get_detail_rekap3($nama_laporan, $thn_laporan, $pos_ldy);
            $data['cek_rekap_tersedia'] = $this->M_Laundry_Rekap->get_row($thn_laporan, $pos_ldy);
            // print_r($data['cek_rekap_tersedia']);
            // die;
            $data['detail_laporan_allperiode'] = $this->M_Laundry_Rekap->get_detail_rekap3_allperiodee($pos_ldy);
            $this->template->display('laundry/data_laporan', $data);
        } else {
            echo "<script>
               alert('Jenis Laporan Tidak Tersedia!!');
               window.location.assign('";
            echo base_url();
            echo "laundry/data_laporan'); 
               </script>";
        }
    }

    function get_data_approve()
    {
        $data['username']     = $this->session->userdata('user_id');
        $data['nama']         = $this->session->userdata('nama');
        $jabatan = $this->m_jabatan->list_jabatan();
        foreach ($jabatan as $row) {
            if ($row->ID_jab == $this->session->userdata('jabatan')) {
                $jabatan      = $row->Nama_jab;
            }
        }
        $rekap_jns = 'Laporan Pendapatan Laundry (Management)';
        $create_by = $this->session->userdata('nama');
        $create_date = date('Y-m-d H:i:s');
        $create_comp = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $create_status = 1;
        $tahun = $this->uri->segment(3);
        $pos_ldy = $this->uri->segment(4);
        $bulan = $this->uri->segment(5);

        $data2 = array(
            'rekap_jns' => $rekap_jns,
            'create_by' => $create_by,
            'create_date' => $create_date,
            'create_comp' => $create_comp,
            'create_status' => $create_status,
            'create_jabatan' => $jabatan,
            'rekap_tahun' => $tahun,
            'pos_ldy' => $pos_ldy,
            'rekap_bulan' => $bulan
        );
        $this->M_Laundry_Rekap->insert_rekap($data2);
        $maxid = $this->db->insert_id();

        echo "<script>alert('Data berhasil disimpan....!!!! ');</script>";
        redirect('/Laundry_Rekap/laporan', 'refresh');
    }
}
