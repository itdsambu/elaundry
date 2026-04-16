<?php
defined('BASEPATH') or exit('No direct script acess allowed');

class Pengambilan_laundry extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_penerimaan_laundry');
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['status_laundry'] 			= '2';
		$pos_ldy                   			= $this->input->post('pos_ldy');
		$data['getDataHeader'] 				= $this->m_penerimaan_laundry->getTrnLayananHdrPengambilan($pos_ldy);
		$data['get_MstStatusLaundry'] 		= $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry'] 	= $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry'] 		= $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['dt_allpos_laundry']			= $this->m_penerimaan_laundry->get_allpos_laundry();

		if ($this->session->userdata('ip_address') == '192.168.0.194') {
			$this->template->display('tbl_trnLaundry/list_penerimaan_laundry2', $data);
		} else {
			$this->template->display('tbl_trnLaundry/list_penerimaan_laundry', $data);
		}
	}

	public function show(){
		echo json_encode("tes");
	}

	function UpdateDiambil()
	{
		$id = $this->uri->segment(3);
		$stat_laundry = $this->uri->segment(4);
		$data['getDataHdr'] = $this->m_penerimaan_laundry->get_dataHeaderid($id);
		if ($stat_laundry == 4) {
			$data['getDataDtl'] = $this->m_penerimaan_laundry->get_detailLaundryOut($id);
		} elseif ($stat_laundry == 4) {
			$data['getDataDtl'] = $this->m_penerimaan_laundry->get_detailLaundryAmbil($id);
		} else {
			$data['getDataDtl'] = $this->m_penerimaan_laundry->get_detailLaundry($id);
		}
		// $data['get_MstStatusLaundry'] 		= $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry'] 	= $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry'] 		= $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['get_vwItemKategory'] 		= $this->m_penerimaan_laundry->get_vwItemKategory();
		$data['get_MstLokasiLaundry'] 		= $this->m_penerimaan_laundry->get_MstLokasiLaundry();
		$data['get_MstPosLaundry'] 		= $this->m_penerimaan_laundry->get_MstPosLaundry();
		$this->template->display('tbl_trnLaundry/update_transaksiLaundry', $data);
	}

	function UpdateData()
	{
		$ID   				= $this->input->post('ID');
		$DiambilBy   		= $this->input->post('DiambilBy');
		$detail_id 			= $this->input->post('detail_id');
		$cek_item   		= $this->input->post('cek_item');
		$qty_item   		= $this->input->post('qty_item');
		$keterangan   		= $this->input->post('keterangan');
		$jumlah   			= $this->input->post('jumlah');
		$jumlah_1   		= $this->input->post('jumlah_1');
		$nama_item			= $this->input->post('nama_item');
		if (!empty($_FILES['txtUploadPengambil']['name'])) {
			$link_pengambil = '/fileUpload/laundry/pengambil/pengambil';
		} else {
			$link_pengambil = '';
		}

		$hdrdata 	= $this->m_penerimaan_laundry->get_dataHeaderid($ID);
		foreach ($hdrdata as $hdr) {
			$NoNota 		= $hdr->NoNota;
			$SelesaiDate 	= date('d-m-Y', strtotime($hdr->SelesaiDate));
			$Nama 			= $hdr->Nama;
			$NIK 			= $hdr->NIK;
			$DeptAbbr 		= $hdr->DeptAbbr;
			$Cash 			= $hdr->Cash;
			$IDLayanan 		= $hdr->IDLayanan;
			$Berat 			= $hdr->JumlahBerat;
			$TotalBiaya 	= number_format($hdr->TotalTagihan, 2, ',', '.');
			$telegramid 	= $hdr->telegramid;
		}

		if ($Cash == 1) {
			$t_cash = 'Tunai';
		} elseif ($Cash == 0) {
			$t_cash = 'Potong Gaji';
		} else {
			$t_cash = '';
		}

		if ($IDLayanan == '1') {
			$t_layanan = 'CUCI KERING';
		} elseif ($IDLayanan == '2') {
			$t_layanan = 'SETRIKA';
		} elseif ($IDLayanan == '3') {
			$t_layanan = 'CUCI KERING + SETRIKA';
		} else {
			$t_layanan = '';
		}

		$tanggal_ambil = date("d-m-Y H:i:s");

		if ($_POST['btnupdate'] == 'outstanding') {
			$datahdr2 = array(
				'OutstandingDate' 	=> date("Y-m-d H:i:s"),
				'IDStatusPelayanan' => 4,
				'LastUpdatedBy'		=> $this->session->userdata('user_name'),
				'LastUpdatedDate'	=> date('Y-m-d H:i:s'),
				'LastUpdatedComp'	=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
			);
		} elseif ($_POST['btnupdate'] == 'diambil') {
			$datahdr2 = array(
				'DiambilBy' 		=> $DiambilBy,
				'link_upload_pengambil' => $link_pengambil,
				'DiambilDate' 		=> date("Y-m-d H:i:s"),
				'IDStatusPelayanan' => 3,
				'LastUpdatedBy'		=> $this->session->userdata('user_name'),
				'LastUpdatedDate'	=> date('Y-m-d H:i:s'),
				'LastUpdatedComp'	=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
			);
		}

		$this->m_penerimaan_laundry->updateHeaderDiambil($ID, $datahdr2);

		if ($link_pengambil != '') {
			$config['upload_path'] 		= './fileUpload/laundry/pengambil/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
			$config['max_size'] 		= '8000';
			$config['file_name'] 		= 'pengambil' . $ID . '.jpg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			if (!$this->upload->do_upload('txtUploadPengambil')) {
				$errors = $this->upload->display_errors();
				$data 	= array('UploadFile' => 0,);
				$this->m_penerimaan_laundry->updateForm($ID, $data);
			} else {
				$upload_berkas = $this->upload->data();
				$data 	= array('UploadFile' => 1,);
				$this->m_penerimaan_laundry->updateForm($ID, $data);
			}
		}

		$dt_item_ready = '';
		$dt_item_pending = '';
		$dt_item_out = '';
		$jum_dtl = count($this->input->post('detail_id'));
		for ($i = 0; $i < $jum_dtl; $i++) {
			if ($keterangan[$i] != '') {
				$t_cek_item[$i] = '1';
				$jml_1[$i] = $jumlah_1[$i];
				$qty[$i] = $qty_item[$i];
				$dt_item_pending .= $nama_item[$i] . " " . $qty_item[$i] . ", ";
				$dt_item_out 	 .= $nama_item[$i] . " " . $jumlah_1[$i] . ", ";
			} else {
				$jml_1[$i] = $jumlah[$i];
				$qty[$i] = '';
				$t_cek_item[$i] = '0';
				$dt_item_ready .= $nama_item[$i] . " " . $jumlah[$i] . ", ";
			}
			$datadtl = array(
				'jumlah' 		=> $jumlah[$i],
				'jumlah_1' 		=> $jml_1[$i],
				'qty_item' 		=> $qty[$i],
				'ceklist' 		=> $t_cek_item[$i],
				'keterangan' 	=> $keterangan[$i],
				'UpdatedBy'		=> $this->session->userdata('user_name'),
				'UpdatedDate'	=> date('Y-m-d H:i:s'),
				'UpdatedComp'	=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
			);

			$id_detail = $detail_id[$i];
			$result = $this->m_penerimaan_laundry->updateDetail($id_detail, $datadtl);
		}

		if ($_POST['btnupdate'] == 'outstanding') {

			$pesan = "[NOTIFIKASI LAUNDRY]" .
				PHP_EOL .
				"No.Nota : {$NoNota}" . PHP_EOL .
				"Tanggal Selesai : {$SelesaiDate}" . PHP_EOL .
				"Nama Pelanggan : {$Nama}" . PHP_EOL .
				"NIK : {$NIK}" . PHP_EOL .
				"Departemen : {$DeptAbbr}" . PHP_EOL .
				"Jenis Pembayaran : {$t_cash}" . PHP_EOL .
				"Jenis Layanan : {$t_layanan}" . PHP_EOL .
				"Berat : {$Berat} Kg" . PHP_EOL .
				"Total Biaya : {$TotalBiaya}" . PHP_EOL .
				"Status Laundry : Outstanding" . PHP_EOL .
				"Item Outstanding : {$dt_item_pending}" . PHP_EOL .
				"Item Diambil : {$dt_item_ready}{$dt_item_out}" . PHP_EOL .
				"Silahkan ke laundry untuk info terbaru";
		} elseif ($_POST['btnupdate'] == 'diambil') {
			$pesan = "[NOTIFIKASI LAUNDRY]" .
				PHP_EOL .
				"No.Nota : {$NoNota}" . PHP_EOL .
				"Tanggal Selesai : {$SelesaiDate}" . PHP_EOL .
				"Nama Pelanggan : {$Nama}" . PHP_EOL .
				"NIK : {$NIK}" . PHP_EOL .
				"Departemen : {$DeptAbbr}" . PHP_EOL .
				"Jenis Pembayaran : {$t_cash}" . PHP_EOL .
				"Jenis Layanan : {$t_layanan}" . PHP_EOL .
				"Berat : {$Berat} Kg" . PHP_EOL .
				"Total Biaya : {$TotalBiaya}" . PHP_EOL .
				"Status Laundry : Sudah Diambil" . PHP_EOL .
				"Diambil Oleh {$DiambilBy} pada tanggal {$tanggal_ambil}";
		}
		$datatlg = array(
			'UserGroupID' 		=> '0',
			'DataFrom'			=> 'Laundry',
			'ToTelegramID'		=> $telegramid,
			'FirstName'			=> $Nama,
			'Messages'			=> $pesan,
			'SendingTime'		=> date("Y-m-d H:i:s"),
			'PendingStatus'		=> 1,
			'SuccessStatus'		=> 0
		);

		if ($telegramid != '') {
			$this->m_penerimaan_laundry->sendToTelegram($datatlg);
		}

		if (!$result) {
			redirect('Pengambilan_laundry/index?msg=success3');
		} else {
			redirect('Pengambilan_laundry/index?msg=failed');
		}
	}

	function RestoreLap() {
		$id                   = $this->uri->segment(3);
		$IDStatusPelayanan    = 1;

		$data['resotoreLap']  = $this->m_penerimaan_laundry->get_dataLaporanBy($id, $IDStatusPelayanan);
		redirect('Pengambilan_laundry', 'refresh');
	}
}
