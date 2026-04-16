<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dataTables extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_dataTable']);
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function show()
    {
        if (!isset($_POST['draw'])) {
            show_error('Bad Request', 400);
            return;
        }

        $baseData = $this->M_dataTable->get_datatables();

        $data = [];
        $no   = (int)($_POST['start'] ?? 0);

        foreach ($baseData as $field) {
            $no++;
            $row = [];

            $row[] = $no . '.';
            $row[] = $field->nama_laundry . ' (' . $field->alamat . ')';
            $row[] = $field->NoNota;
            $row[] = !empty($field->TglTransaksi) ? date('d-m-Y', strtotime($field->TglTransaksi)) : '';
            $row[] = !empty($field->SelesaiDate)  ? date('d-m-Y', strtotime($field->SelesaiDate))  : '';
            $row[] = !empty($field->DiambilDate)  ? date('d-m-Y', strtotime($field->DiambilDate))  : '';
            $row[] = $field->Nama;
            $row[] = $field->StatusKaryawan;
            $row[] = $field->NIK;
            $row[] = $field->JenisPembayaran;
            $row[] = $field->JenisLayanan;
            $row[] = $field->JumlahBerat;
            $row[] = number_format($field->TotalTagihan, 0, ',', '.');

            $statusColors = [1 => 'danger', 2 => 'warning', 3 => 'success', 4 => 'primary'];
            $color = $statusColors[$field->IDStatusPelayanan] ?? 'default';
            $row[] = '<span class="label label-sm label-' . $color . '">' . htmlspecialchars($field->StatusPelayanan) . '</span>';

            $row[] = $field->DiambilBy;
            $row[] = $field->CreatedBy;

            $row[] = '<a class="btn btn-sm sharp btn-success" onclick="detail(' . (int)$field->ID . ')">
                        <i class="fa fa-eye"></i> Lihat
                      </a>';

            if (in_array($this->session->userdata('group_user'), [1, 166])) {
                $row[] = '<a class="btn btn-sm sharp btn-danger"
                             href="' . site_url('Mnt_Laundry/RestoreLap/' . (int)$field->ID) . '"
                             onclick="return confirm(\'Yakin ingin restore data ini?\')">
                             <i class="fa fa-undo"></i> Restore
                           </a>';
            } else {
                $row[] = '';
            }

            $data[] = $row;
        }

        $output = [
            'draw'            => (int)$_POST['draw'],
            'recordsTotal'    => $this->M_dataTable->count_all(),
            'recordsFiltered' => $this->M_dataTable->count_filtered(),
            'data'            => $data,
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }
}
