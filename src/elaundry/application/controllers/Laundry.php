<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone', 'Asia/jakarta');

class Laundry extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('M_Laundry');
        $this->load->library('user_agent');
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index()
    {
        $listmasterpos             = $this->M_Laundry->getPosLaundry();
        $data['listmasterpos']     = $listmasterpos;

        $this->template->display('master/V_Mst_Laundry', $data);
    }

    public function masterPosLaundry()
    {
        $mdl_detail_id = $this->input->post('mdl_detail_id');
        $aksi = $this->uri->segment(3);
        if ($aksi == "add") {

            $data = [
                'nama_laundry' => $this->input->post('nama_laundry'),
                'kode_laundry' => $this->input->post('kode_laundry'),
                'alamat' => $this->input->post('alamat'),
                'inactive' => 0,
                // 'created_by' => $this->session->userdata('username'),
                'created_by'     => $this->session->userdata('user_name'),
                'created_date'      => date('Y-m-d'),
                'tanggal_efektif' => date("Y-m-d", strtotime($this->input->post('tanggal_efektif'))),
                'warna_laundry' => $this->input->post('warna_laundry')
            ];
            // print_r($data);die;
            $this->M_Laundry->addPosLaundry($data);

            echo "<script>alert('Data Master Laundry Berhasil Ditambahkan!!');
                window.location.assign('";
            echo base_url();
            echo "Laundry/masterPosLaundry');
                </script>";
        } else if ($aksi == "delete") {

            $data['inactive']     = '1';
            $data['updated_by']   = strtoupper($this->session->userdata('username'));
            $data['updated_date'] = date('Y-m-d H:i:s');

            if (!$this->M_Laundry->updatePosLaundry($data, $this->uri->segment(4))) {
                echo "<script>alert('Data berhasil dihapus!!');
                      window.location.assign('" . base_url() . "Laundry/masterPosLaundry');
                   </script>";
            }
        } else if ($aksi == "get_dt_update") {
            $id        = $this->input->post('id');
            $dt_update = $this->M_Laundry->getPosLaundryBy($id);

            $data  = '';
            $data2 = '';
            $data3 = '';
            $data4 = '';
            $data5 = '';

            foreach ($dt_update as $dt_update_row) {
                $data  = $dt_update_row->nama_laundry;
                $data2 = $dt_update_row->kode_laundry;
                $data3 = $dt_update_row->alamat;
                $data4 = date("d/m/Y", strtotime($dt_update_row->tanggal_efektif));
                $data5 = $dt_update_row->warna_laundry;
            }
            echo $data . '//' . $data2 . '//' . $data3 . '//' . $data4 . '//' . $data5 . '//' . $id;
        } else if ($aksi == "update") {
            $data['nama_laundry']         = $this->input->post('nama_laundry');
            $data['kode_laundry']         = $this->input->post('kode_laundry');
            $data['alamat']         = $this->input->post('alamat');
            $data['tanggal_efektif'] = date("Y-m-d", strtotime($this->input->post('tanggal_efektif')));
            $data['warna_laundry']      = $this->input->post('warna_laundry');

            $data['updated_by']      = strtoupper($this->session->userdata('username'));
            $data['updated_date']    = date('Y-m-d H:i:s');

            if (!$this->M_Laundry->updatePosLaundry($data, $mdl_detail_id))
                echo "<script>alert('Data berhasil diupdate!!');
                      window.location.assign('" . base_url() . "Laundry/masterPosLaundry');
                   </script>";
        } else {
            $data['listmasterpos']    = $this->M_Laundry->getPosLaundry();
            $this->template->display('master/V_Mst_Laundry', $data);
        }
    }
}
