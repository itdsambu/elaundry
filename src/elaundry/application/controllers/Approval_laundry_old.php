<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_laundry extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model(array(['M_approve_laundry', 'm_penerimaan_laundry', 'm_jabatan', 'M_Laundry_Rekap']));
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	function approval()
	{
		$data['username']     = $this->session->userdata('user_id');
		$data['nama']         = $this->session->userdata('nama');
		$jabatan = $this->m_jabatan->list_jabatan();
		foreach ($jabatan as $row) {
			if ($row->ID_jab == $this->session->userdata('jabatan')) {
				$data['jabatan']      = $row->Nama_jab;
			}
		}
		// $data['jabatan']      = $this->session->userdata('jabatan');
		// print_r($data);
		// exit;
		$get_app_number       = $this->uri->segment(3);
		$data['app_number']   = $get_app_number;


		if ($get_app_number == 'app1' || $get_app_number == 'app2' || $get_app_number == 'app3') {
			$data['all_approval'] = $this->M_approve_laundry->get_app_data($get_app_number);
			
			$this->template->display('laundry/v_approval', $data);
		} else {
			echo "<script>
               alert('Approval Number Tidak Tersedia!!');
               window.location.assign('";
			echo base_url();
			echo "dashboard');   
               </script>";
		}
	}

	function view_lap()
	{
		$get_rekap_id         = $this->uri->segment(3);
		$get_app_number       = $this->uri->segment(4);
		$data['app_number']   = $get_app_number;

		$result_rekap = $this->M_approve_laundry->get_detail_rekap($get_rekap_id);

		foreach ($result_rekap as $result_rekap_row) {
			$n_nama_laporan         = $result_rekap_row->rekap_jns;
			$n_pos_ldy              = $result_rekap_row->pos_ldy;
			$n_tipe_laporan         = $result_rekap_row->rekap_status_pekerja;
			$n_bln_laporan          = $result_rekap_row->rekap_bulan;
			$n_thn_laporan          = $result_rekap_row->rekap_tahun;
			$n_tanggal_awal         = $result_rekap_row->rekap_tanggal_awal;
			$n_tanggal_akhir        = $result_rekap_row->rekap_tanggal_akhir;
			$n_periode_laporan      = $result_rekap_row->rekap_periode;
			$n_rekap_posting_to_psn = $result_rekap_row->rekap_posting_to_psn;
		}


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
		if (trim($n_tipe_laporan) != '') {
			$tipe_laporan = $n_tipe_laporan;
		} else {
			$tipe_laporan = NULL;
		}
		if (trim($n_bln_laporan) != '') {
			$bln_laporan = $n_bln_laporan;
		} else {
			$bln_laporan = NULL;
		}
		if (trim($n_thn_laporan) != '') {
			$thn_laporan = $n_thn_laporan;
		} else {
			$thn_laporan = NULL;
		}
		if (trim($n_tanggal_awal) != '') {
			$tanggal_awal   = date("Y-m-d", strtotime($n_tanggal_awal));
		} else {
			$tanggal_awal = NULL;
		}
		if (trim($n_tanggal_akhir) != '') {
			$tanggal_akhir  = date("Y-m-d", strtotime($n_tanggal_akhir));
		} else {
			$tanggal_akhir = NULL;
		}
		if (trim($n_periode_laporan) != '') {
			$periode_laporan  = date("Y-m-d", strtotime($n_periode_laporan));
		} else {
			$periode_laporan = NULL;
		}
		if (trim($n_rekap_posting_to_psn) != '') {
			$rekap_posting_to_psn  = date("Y-m-d", strtotime($n_rekap_posting_to_psn));
		} else {
			$rekap_posting_to_psn = NULL;
		}

		$data['post_nama_laporan']         = $n_nama_laporan;
		$data['post_pos_ldy']              = $n_pos_ldy;
		$data['post_tipe_laporan']         = $n_tipe_laporan;
		$data['post_bln_laporan']          = $n_bln_laporan;
		$data['post_thn_laporan']          = $n_thn_laporan;
		$data['post_tanggal_awal']         = $n_tanggal_awal;
		$data['post_tanggal_akhir']        = $n_tanggal_akhir;
		$data['post_periode_laporan']      = $n_periode_laporan;
		$data['post_rekap_posting_to_psn'] = $n_rekap_posting_to_psn;

		$data['username']          = $this->session->userdata('user_id');

		$data['dt_allpos_laundry'] = $this->M_Laundry_Rekap->get_allpos_laundry();

		// $data['detail_posting']    = $this->M_Laundry_Rekap->get_detail_posting($nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan);

		// if ($nama_laporan == 'Rekap1') {
		// 	$data['detail_laporan'] = $this->M_Laundry_Rekap->get_detail_rekap1($nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan);
		// 	$this->template->display('laundry/data_laporan', $data);
		// } elseif ($nama_laporan == 'Rekap2') {
		// 	$data['detail_laporan'] = $this->M_Laundry_Rekap->get_detail_rekap2($nama_laporan, $tipe_laporan, $bln_laporan, $thn_laporan, $tanggal_awal, $tanggal_akhir, $periode_laporan);
		// 	$this->template->display('laundry/data_laporan', $data);
		// } else
		
		if ($nama_laporan == 'Laporan Pendapatan Laundry (Management)') {
			//$data['detail_laporan'] = $this->M_Laundry_Rekap->get_detail_rekap3($tipe_laporan, $bln_laporan, $thn_laporan);
			$data['detail_laporan']            = $this->M_Laundry_Rekap->get_detail_rekap3($nama_laporan, $thn_laporan, $pos_ldy);
			$data['detail_laporan_allperiode'] = $this->M_Laundry_Rekap->get_detail_rekap3_allperiode($pos_ldy);
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

	function multi_approve()
	{

		$app_nama    = $this->session->userdata('nama');
		$jabatan = $this->m_jabatan->list_jabatan();
		foreach ($jabatan as $row) {
			if ($row->ID_jab == $this->session->userdata('jabatan')) {
				$app_jabatan      = $row->Nama_jab;
			}
		}
		$app_by      = $this->session->userdata('user_id');
		$app_date    = date('Y-m-d H:i:s');
		$app_comp    = gethostbyaddr($_SERVER['REMOTE_ADDR']);

		$dtapp_rekap_id = $this->input->post('dtapp_rekap_id');
		$app_menu = $this->input->post('app_menu');

		$jmlrekap_id = count($dtapp_rekap_id);

		if ($jmlrekap_id > 0) {

			$no_app = 0;
			for ($i = 0; $i < $jmlrekap_id; $i++) {
				$arr_dtapp_rekap_id = explode('//', $dtapp_rekap_id[$i]);

				$rekap_id      = $arr_dtapp_rekap_id[1];
				$dtappnumber   = $arr_dtapp_rekap_id[2];

				if ($dtappnumber == 'app1' || $dtappnumber == 'app2' || $dtappnumber == 'app3') {
					$data_app =
						array(
							$dtappnumber . '_by'       => $app_nama,
							$dtappnumber . '_date'     => $app_date,
							$dtappnumber . '_comp'     => $app_comp,
							$dtappnumber . '_status'   => '1',
							$dtappnumber . '_jabatan'  => $app_jabatan
						);

					$query_approve = $this->M_approve_laundry->approve_rekap($data_app, $rekap_id);
					if ($query_approve == '1') {
						$no_app++;
					}
				} else {
				}
			}

			if ($no_app > 0) {
				echo "<script>alert('Data Berhasil Diapprove!!');
                               window.location.assign('";
				echo base_url();
				echo "Approval_laundry/approval/" . $app_menu . "');
                               </script>";
			} else {
				echo "<script>alert('Data Batal Diapprove!!');
                               window.location.assign('";
				echo base_url();
				echo "Approval_laundry/approval/" . $app_menu . "');
                               </script>";
			}
		} else {
			echo "<script>alert('Maaf Tidak Ada Laporan Yang Dipilih!!');
                               window.location.assign('";
			echo base_url();
			echo "Approval_laundry/approval/" . $app_menu . "');
                               </script>";
		}
	}

	function index()
	{
		if ($this->session->flashdata('msg')) {
			$data['bln'] 		= $this->session->flashdata('msg')['bln'];
			$data['tahun'] 		= $this->session->flashdata('msg')['thn'];
			$data['periode'] 	= $this->session->flashdata('msg')['periode'];
			$data['status_tk'] 	= $this->session->flashdata('msg')['status_tk'];
			$status_tk 			= $this->session->flashdata('msg')['status_tk'];
			$jarak1 			= $this->session->flashdata('msg')['jarak1'];
			$jarak2 			= $this->session->flashdata('msg')['jarak2'];
			
			$data['alert']		= 'Data berhasil diapprove';
			$data['dt_allpos_laundry'] = $this->m_penerimaan_laundry->get_allpos_laundry();
			$data['getDataApproval']   = $this->M_approve_laundry->get_data($jarak1, $jarak2, $status_tk);
			$this->template->display('approval_laundry/list_approve_laundry', $data);
		} else {
			$data['dt_allpos_laundry']   = $this->m_penerimaan_laundry->get_allpos_laundry();
			$data['getDataApproval']     = $this->M_approve_laundry->get_DataPotongGaji();
			$this->template->display('approval_laundry/list_approve_laundry', $data);
		}
	}

	function ajaxData()
	{
		$periode 	= $this->uri->segment(3);
		$bulan 		= $this->uri->segment(4);
		$tahun 		= $this->uri->segment(5);
		$status_tk 	= $this->uri->segment(6);

		if ($periode == 'p1') {
			$jarak1 = $tahun . '-' . $bulan . '-01';
			$jarak2 = $tahun . '-' . $bulan . '-16';
		} else if ($periode == 'p2') {
			$jarak1 = $tahun . '-' . $bulan . '-16';
			$jarak2 = $tahun . '-' . ((int)$bulan + 1) . '-01';
		} else if ($periode == 'bulanan') {
			$jarak1 = $tahun . '-' . ((int)$bulan - 1) . '-26';
			$jarak2 = $tahun . '-' . $bulan . '-26';
		}
		$data['dt_allpos_laundry']			= $this->m_penerimaan_laundry->get_allpos_laundry();
		$data['getDataApproval'] = $this->M_approve_laundry->get_data($jarak1, $jarak2, $status_tk);
		$this->load->view('approval_laundry/ajaxDataApproval', $data);
	}
	function ajaxData2()
	{
		$periode 	= $this->input->post('periode');
		$bulan 		= $this->input->post('bulan');
		$tahun 		= $this->input->post('tahun');
		$status_tk 	= $this->input->post('tk_cek');
		
		if ($bulan == '1') { 
			$bln = '01';
		} else if ($bulan == '2') { 
			$bln = '02';
		} else if ($bulan == '3'){
			$bln = '03';
		} else if ($bulan == '4') { 
			$bln = '04';
		} else if ($bulan == '5') {
			$bln = '05';
		} else if ($bulan == '6') {
			$bln = '06';
		} else if ($bulan == '7') {
			$bln = '07';
		} else if ($bulan == '8') {
			$bln = '08';
		} else if ($bulan == '9') {
			$bln = '09';
		} else {
			$bln = $bulan;
		}

		if ($bulan + 1 == 2) {
			$blnGanda2 = '02'; 
		} else if ($bulan + 1 == 3){
			$blnGanda2 = '03';
		} else if ($bulan + 1 == 4) { 
			$blnGanda2 = '04';
		} else if ($bulan + 1 == 5) {
			$blnGanda2 = '05';
		} else if ($bulan + 1 == 6) {
			$blnGanda2 = '06';
		} else if ($bulan + 1 == 7) {
			$blnGanda2 = '07';
		} else if ($bulan + 1 == 8) {
			$blnGanda2 = '08';
		} else if ($bulan + 1 == 9) {
			$blnGanda2 = '09';
		} else if ($bulan + 1 == 13) {
			$blnGanda2 = '01';
		} else {
			$blnGanda2 = $bulan + 1;
		}

		if ($bulan - 1 == 0){
			$blnKar = '01';
		} else if ($bulan - 1 == 1){
			$blnKar = '01';
		} else if ($bulan - 1 == 2){
			$blnKar = '02';
		} else if ($bulan - 1 == 3) { 
			$blnKar = '03';
		} else if ($bulan - 1 == 4) {
			$blnKar = '04';
		} else if ($bulan - 1 == 5) {
			$blnKar = '05';
		} else if ($bulan - 1 == 6) {
			$blnKar = '06';
		} else if ($bulan - 1 == 7) {
			$blnKar = '07';
		} else if ($bulan - 1 == 8) {
			$blnKar = '08';
		} else if ($bulan - 1 == 9) {
			$blnKar = '09';
		} else {
			$blnKar = $bulan - 1;
		}

		if ($periode == 'p1') {
			$jarak1 = $tahun . '-' . $bln . '-01';
			$jarak2 = $tahun . '-' . $bln . '-16';
		} else if ($periode == 'p2') {
			$jarak1 = $tahun . '-' . $bln . '-16';
			$jarak2 = $tahun . '-' . $blnGanda2 . '-01';
		} else if ($periode == 'bulanan') {
			$jarak1 = $tahun . '-' . $blnKar . '-26';
			$jarak2 = $tahun . '-' . $bln . '-26';
		}
		
		// $data['dt_allpos_laundry']			= $this->m_penerimaan_laundry->get_allpos_laundry();
		// $data['getDataApproval'] = $this->M_approve_laundry->get_data($jarak1, $jarak2, $status_tk);
		$getDataApproval = $this->M_approve_laundry->get_data($jarak1, $jarak2, $status_tk);
		$dt_allpos_laundry = $this->m_penerimaan_laundry->get_allpos_laundry();
		// $this->load->view('approval_laundry/ajaxDataApproval', $data);

		$html_body1 = "";
		$html_body2 = "";

		$no = 1;
		if ($getDataApproval) {
			$val_sum_bayar = 0;
			foreach ($getDataApproval as $get) {
				if (is_numeric($get->TotalTagihan)) {
					$val_sum_bayar += $get->TotalTagihan;
				}
				$html_body1 .= '
					<tr class="odd gradeX">
						<td class="text-center">
							<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
								<input type="checkbox" class="checkboxes" name="ID[]" value="' . $get->ID . '" />
								<span></span>
							</label>
						</td>';
				foreach ($dt_allpos_laundry as $pos) {
					if ($get->pos_ldy == $pos->detail_id) {
						$html_body1 .= '
						<td style="background-color: ' . (($get->pos_ldy == $pos->detail_id) ? $pos->warna_laundry : $pos->warna_laundry) . ';">' . $get->nama_laundry . ' (' . $get->alamat . ')</td>';
					}
				}
				$html_body1 .= '
						<td class="text-center no_nota">' . $get->NoNota . '</td>
						<td class="text-center">' . date('d-m-Y', strtotime($get->TglTransaksi)) . '</td>
						<td class="text-center">' . (($get->SelesaiDate != NULL) ? date('d-m-Y', strtotime($get->SelesaiDate)) : "") . '</td>
						<td class="text-center">' . (($get->SelesaiDate != NULL) ? $get->DiambilDate : "") . '</td>
						<td class="nama_pelanggan">' . $get->Nama . '</td>
                        <td class="text-center st_pelanggan">' . $get->StatusKaryawan . '</td>
                        <td class="text-center nik">' . $get->NIK . '</td>
                        <td class="jns_bayar">' . $get->JenisPembayaran . '</td>
                        <td class="jenis_layanan">' . $get->JenisLayanan . '</td>
                        <td class="text-right berat">' . $get->JumlahBerat . '</td>
						<td class="total_biaya text-right">' . number_format($get->TotalTagihan, 0, ',', '.') . '</td>
						<td class="text-center st_laundry">' . (($get->IDStatusPelayanan == 1) ? '<span class="label label-sm label-danger">' . $get->StatusPelayanan . '</span>' : (($get->IDStatusPelayanan == 2) ? '<span class="label label-sm label-warning">' . $get->StatusPelayanan . '</span>' : (($get->IDStatusPelayanan == 3) ? '<span class="label label-sm label-success">' . $get->StatusPelayanan . '</span>' : (($get->IDStatusPelayanan == 4) ? '<span class="label label-sm label-primary">' . $get->StatusPelayanan . '</span>' : "")))) . '</td>
					</tr>
						';
			}
			$html_body2 .= '
						<tr>
							<td colspan="12" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
							<td style="text-align: center;">' . ((isset($val_sum_bayar)) ? number_format($val_sum_bayar, 0, ',', '.') : "") . '</td>
							<td colspan="1"></td>
						</tr>
							';
		} else {
			$html_body1 .= '
			<tr>
				<td colspan="13" class="text-center">Tidak ada data approve</td>
			</tr>';
			$html_body2 .= '
			<tr>
				<td colspan="12" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
			</tr>';
		}
		echo $html_body1 . '///' . $html_body2 . '///';
	}

	function approveTrnLaundry()
	{
		$ID 		= $this->input->post('ID');
		$periode 	= $this->input->post('txtPeriode');
		$bln  		= $this->input->post('txtbulan');
		$thn  		= $this->input->post('txttahun');
		$status_tk  = $this->input->post('StatusTK');

		if ($periode == 'p1') {
			$jarak1 = $thn . '-' . $bln . '-01';
			$jarak2 = $thn . '-' . $bln . '-15';
		} else if ($periode == 'p2') {
			$jarak1 = $thn . '-' . $bln . '-16';
			$jarak2 = date("Y-m-t", strtotime($jarak1));
		} else if ($periode == 'bulanan') {
			$jarak1 = $thn . '-' . ((int)$bln - 1) . '-26';
			$jarak2 = $thn . '-' . $bln . '-25';
		}

		$hitung = count($ID);
		for ($i = 0; $i < $hitung; $i++) {
			$data = array(
				'ApproveStatus' => 1,
				'ApproveBy'		=> $this->session->userdata('user_name'),
				'ApproveDate' 	=> date('Y-m-d H:i:s'),
				'ApproveComp' 	=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
			);

			$result = $this->M_approve_laundry->approve($ID[$i], $data);
		}
		$datax = array(
			'jarak1' 	=> $jarak1,
			'jarak2' 	=> $jarak2,
			'bln'	 	=> $bln,
			'thn'	 	=> $thn,
			'periode' 	=> $periode,
			'status_tk'	=> $status_tk
		);
		$this->session->set_flashdata('msg', $datax);
		if (!$result) {
			redirect('Approval_laundry/index');
		} else {
			redirect('Approval_laundry/index');
		}
	}
}
