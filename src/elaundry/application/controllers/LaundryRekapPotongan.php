<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone', 'Asia/jakarta');

class LaundryRekapPotongan extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model(['M_RekapPotongan', 'M_departemen', 'm_jabatan']);
        $this->load->library('user_agent');
        $this->model = $this->{'M_RekapPotongan'};
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title']      = 'Laporan Potongan Laundry';
        $data['allRecords'] = $this->model->allRecords();
        
        $this->template->display('tbl_RekapPotongan/index', $data);
    }

    function getRecords() {
       $status = $this->input->post('Status');
       $year   = $this->input->post('tahun');

       $reqModel = $this->model->getRecordsBy($status, $year);

       $nmStatus = $status == 1 ? 'Kayawan' : 'Harian';

        if (count($reqModel) > 0) {

            $res = array(
                'status'   => true,
                'vstatus'  => 'Success',
                'pesan'    => "Load Data $nmStatus",
                'statusTk' => $nmStatus,
                'data'     => $reqModel,
            );

        } else {

            $res = array(
                'status'  => false,
                'vstatus' => 'Faild',
                'pesan'   => "Data Not Found $nmStatus....!",
            );

        }


       echo json_encode($res);
    }

    function detailPerperiode() {
        $year                 = $this->uri->segment(3);
        $month                = $this->uri->segment(4);
        $status               = $this->uri->segment(5);
        $data['title']        = 'Laporan Potongan Laundry';

        if ($status == 1) {
            $lessOneMonth         = ($month == '01') ? '12' : sprintf('%02d', $month - 1);
            $lessOneYear          = ($month == '01') ? $year - 1 : $year;

            $result               = ($lessOneMonth >= 9) ? $lessOneMonth : "0$lessOneMonth";

            $PeriodeApprove       = ($month == '01') ? "$lessOneYear-$result-26" : "$year-$month-26";

            $TransAwal            = "$year-$month-26";
            $TransAkhir           = "$lessOneYear-$result-26";

            $periodeAwal          = "26-$result-$lessOneYear";
            $periodeAkhir         = "25-$month-$year";

            $data['periodeTgl']   = "$periodeAwal s/d $periodeAkhir";

            $data['dataRekap']    = $this->M_RekapPotongan->getDataRekapKaryawan($PeriodeApprove, $TransAwal, $TransAkhir);
            $this->template->display('tbl_RekapPotongan/detailRekapKaryawan', $data);

        } else {
            $nextMonth        = $month == '12' ? '01' : sprintf('%02d', $month + 1);
            $nextYear         = $month == '12' ? $year + 1 : $year;

            $periodeApprove   = $month == '01' ? "$nextYear-$nextMonth-26" : "$year-$month-16";
            $bukaBuku         = "$year-$month-01";
            $tutupBuku        = "$year-$month-16";

            $bukaBuku2        = "$year-$month-16";
            $tutupBuku2       = "$nextYear-$nextMonth-01";

            $data['periode1'] = $this->M_RekapPotongan->getRekapHarianPr1($periodeApprove, $bukaBuku, $tutupBuku);
            $data['periode2'] = $this->M_RekapPotongan->getRekapHarianPr2($periodeApprove, $bukaBuku2, $tutupBuku2);

            $data['periodeTgl1'] = "01-$month-$year s/d 15-$month-$year";
            $data['periodeTgl2'] = "16-$month-$year s/d 31-$month-$year";

            $this->template->display('tbl_RekapPotongan/detailRekapHarian', $data);
        }
    }

}

/* End of file LaundryRekapPotongan.php */
