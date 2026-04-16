<?php
defined('BASEPATH') or exit('No direct script acess allowed');

class Penerimaan_laundry extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(['m_penerimaan_laundry', 'M_Laundry_Rekap']));
		$this->load->helper('path');
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['status_laundry'] 			= '1';
		$pos_ldy                   			= $this->input->post('pos_ldy');
		$data['getDataHeader'] 				= $this->m_penerimaan_laundry->getTrnLayananHdr($pos_ldy);
		$data['get_MstStatusLaundry'] 		= $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry'] 	= $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry'] 		= $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['dt_allpos_laundry']			= $this->m_penerimaan_laundry->get_allpos_laundry();

		$this->template->display('tbl_trnLaundry/list_penerimaan_laundry', $data);
		
	}

	function tambahData()
	{

		$last_no = $this->m_penerimaan_laundry->get_last_hdr_id();

		$data['get_MstStatusLaundry']       = $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry']   = $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry']        = $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['get_vwItemKategory']         = $this->m_penerimaan_laundry->get_vwItemKategory();
		$data['get_MstLokasiLaundry']       = $this->m_penerimaan_laundry->get_MstLokasiLaundry();
		$data['get_MstPosLaundry']          = $this->m_penerimaan_laundry->get_MstPosLaundry();


		$this->template->display('tbl_trnLaundry/tambah_transaksiLaundry', $data);

	}

	function ajaxGetDataTK()
	{
		$StatusTK          = $this->uri->segment(3);
		$NIK               = $this->uri->segment(4);
		$data['status_tk'] = $StatusTK;
		$dataTK            = $this->m_penerimaan_laundry->get_DataTK($StatusTK, $NIK);

		$data2             = array('get_dataTK' => $dataTK);
		$this->load->view('tbl_trnLaundry/ajaxDetailTK', array_merge($data, $data2));
	}

	function dt_nota()
	{
		$tahun           = $this->input->post('tahun');
		$bulan           = $this->input->post('bulan');
		$pos_ldy         = $this->input->post('pos_ldy');

		$result = $this->m_penerimaan_laundry->dt_nota($tahun, $bulan, $pos_ldy);
		$data = '';
		foreach ($result as $rs) {
			$data = $rs->no_nota;
		}
		echo $data;
	}

	function simpanData()
	{
		$this->form_validation->set_rules(
			'NoNota',
			'Nomor Nota',
			'required|is_unique[tblLaundry_TrnLayanan.NoNota]',
			array(
				'required'      => '%s tidak boleh kosong. Silahkan pilih kembali alamat laundry.',
				'is_unique'     => '%s sudah ada. Silahkan pilih kembali alamat laundry.'
			)
		);
		if ($this->form_validation->run() == FALSE) {
			$data['get_MstStatusLaundry'] 		= $this->m_penerimaan_laundry->get_MstStatusLaundry();
			$data['get_MstPembayaranLaundry'] 	= $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
			$data['get_MstHargaLaundry'] 		= $this->m_penerimaan_laundry->get_MstHargaLaundry();
			$data['get_vwItemKategory'] 		= $this->m_penerimaan_laundry->get_vwItemKategory();
			$data['get_MstLokasiLaundry'] 		= $this->m_penerimaan_laundry->get_MstLokasiLaundry();
			$data['get_MstPosLaundry'] 		= $this->m_penerimaan_laundry->get_MstPosLaundry();
			$this->template->display('tbl_trnLaundry/tambah_transaksiLaundry', $data);
		} else {
			$pos_ldy   		= $this->input->post('pos_ldy');
			$NoNota   		= $this->input->post('NoNota');
			$IDLokasi		= $this->input->post('IDLokasi');
			$TanggalTerima 	= $this->input->post('TanggalTerima');
			$StatusTK   	= $this->input->post('StatusTK');
			$NIK   			= $this->input->post('NIK');
			$RegFixNo   	= $this->input->post('RegFixNo');
			$telegramid   	= $this->input->post('telegramid');
			$Nama     		= $this->input->post('Nama');
			$DeptAbbr   	= $this->input->post('DeptAbbr');
			$Perusahaan 	= $this->input->post('Perusahaan');
			$NoHP  			= $this->input->post('NoHP');
			$Cash  			= $this->input->post('Cash');
			$Layanan  		= explode('#', $this->input->post('IDLayanan'));
			$Berat  		= str_replace(',', '.', $this->input->post('Berat'));
			$TotalBiaya  	= str_replace('.', '', $this->input->post('TotalBiaya'));
			$diantar_oleh  	= $this->input->post('diantar_oleh');
			$Catatan  		= $this->input->post('Catatan');
			$id_item 		= $this->input->post('id_item');
			$jumlah 		= $this->input->post('jumlah');

			if (!empty($_FILES['txtUploadLabel']['name'])) {
				$link_label = '/fileUpload/laundry/label/label';
			} else {
				$link_label = '';
			}
			// if (!empty($_FILES['txtUploadItem']['name'])) {
			// 	$link_item 		= '/fileUpload/laundry/item/item';
			// } else {
			// 	$link_item 		= '';
			// }



			// if ($NoNota === $this->m_penerimaan_laundry->get_last_hdr_id()) {
			// 	$last_no = $this->m_penerimaan_laundry->get_last_hdr_id();
			// 	// var_dump($last_no);
			// 	// exit();
			// 	$last_new = explode('/', $last_no);
			// 	// var_dump($last_new);
			// 	// die;
			// 	$no_nota = $last_new[0];
			// 	// var_dump($no_nota);
			// 	$new_no = (int)$no_nota + 1;
			// 	// var_dump($new_no);
			// 	if ($last_no == NULL) {
			// 		$new_no = '0';
			// 	} else {
			// 		$new_no = (int)$no_nota + 1;
			// 	}
			// 	$NoNota = '00' . $new_no . '/LDY/' . date('m') . '/' . date('Y');
			// }

			$datahdr = array(
				'pos_ldy'				=> $pos_ldy,
				'NoNota'				=> $NoNota,
				'TglTransaksi' 			=> date('Y-m-d H:i:s'),
				'ProsesDate' 			=> date('Y-m-d H:i:s', strtotime(addslashes($TanggalTerima))),
				'StatusTK'				=> $StatusTK,
				'NIK' 					=> $NIK,
				'RegFixNo' 				=> $RegFixNo,
				'telegramid' 			=> $telegramid,
				'Nama'					=> $Nama,
				'DeptAbbr' 				=> $DeptAbbr,
				'Perusahaan'			=> $Perusahaan,
				'NoHP'					=> $NoHP,
				'Cash'					=> $Cash,
				'IDLayanan' 			=> $Layanan[0],
				'Biaya'					=> $Layanan[1],
				'IDStatusPelayanan'		=> 1,
				'link_upload_label'		=> $link_label,
				// 'link_upload_item' 		=> $link_item,
				'JumlahBerat'			=> (float)$Berat,
				'TotalTagihan'			=> $TotalBiaya,
				'diantar_oleh'			=> $diantar_oleh,
				'Catatan'				=> $Catatan,
				'IDLokasi'				=> $IDLokasi,
				'CreatedBy'				=> $this->session->userdata('user_name'),
				'CreatedDate'			=> date('Y-m-d H:i:s'),
				'CreatedComp'			=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform(),
				'Hapus'					=> 0
			);
			// print_r($datahdr);
			// exit;


			$hdrid = $this->m_penerimaan_laundry->simpanHeader($datahdr);
			$files = $_FILES;


			if ($link_label != '') {
				$config['upload_path'] 		= './fileUpload/laundry/label/';
				$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
				$config['max_size'] 		= '8000';
				$config['file_name'] 		= 'label' . $hdrid . '.jpg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				if (!$this->upload->do_upload('txtUploadLabel')) {
					$errors = $this->upload->display_errors();
					$data 	= array('UploadFile' => 0,);
					$this->m_penerimaan_laundry->updateForm($hdrid, $data);
				} else {
					$upload_berkas = $this->upload->data();
					$data 	= array('UploadFile' => 1,);
					$this->m_penerimaan_laundry->updateForm($hdrid, $data);
					// echo 'sukses1';
				}
			}

			// if ($link_item != '') {
			// 	$config2['upload_path'] 	= './fileUpload/laundry/item/';
			// 	$config2['allowed_types'] 	= 'jpg|jpeg|png|pdf';
			// 	$config2['max_size'] 		= '8000';
			// 	$config2['file_name'] 		= 'item' . $hdrid . '.jpg';
			// 	$this->load->library('upload', $config2);
			// 	$this->upload->initialize($config2);
			// 	$this->load->library('image_lib', $config);
			// 	$this->image_lib->resize();
			// 	if (!$this->upload->do_upload('txtUploadItem')) {
			// 		$errors = $this->upload->display_errors();
			// 	} else {
			// 		$upload_berkas = $this->upload->data();
			// 		$data 	= array('UploadFile' => 1,);
			// 		$this->m_penerimaan_laundry->updateForm($hdrid, $data);
			// 	}
			// }

			$hitung = count($this->input->post('id_item'));
			for ($i = 0; $i < $hitung; $i++) {
				$_FILES['txtItemDetail']['name']     = $files['txtItemDetail']['name'][$i];
				$_FILES['txtItemDetail']['type']     = $files['txtItemDetail']['type'][$i];
				$_FILES['txtItemDetail']['tmp_name'] = $files['txtItemDetail']['tmp_name'][$i];
				$_FILES['txtItemDetail']['error']    = $files['txtItemDetail']['error'][$i];
				$_FILES['txtItemDetail']['size']     = $files['txtItemDetail']['size'][$i];

				if (!empty($_FILES['txtItemDetail']['name'])) {
					$link_itemdetail[$i] 		= '/fileUpload/laundry/itemdetail/itemdetail';
				} else {
					$link_itemdetail[$i] 		= '';
				}

				$datadtl = array(
					'header_id' 		=> $hdrid,
					'id_item' 			=> $id_item[$i],
					'jumlah' 			=> $jumlah[$i],
					'link_upload_itemdetail'  => $link_itemdetail[$i],
					'status' 			=> 0,
					'CreatedBy' 		=> $this->session->userdata('user_name'),
					'CreatedDate' 		=> date('Y-m-d H:i:s'),
					'CreatedComp'		=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform()
				);

				// print_r($datadtl);
				// exit;
				$result = $this->m_penerimaan_laundry->simpanDetail($datadtl);
				$dtl_id = $this->db->insert_id();


				if ($link_itemdetail != '') {
					$config2['upload_path'] 	= './fileUpload/laundry/itemdetail/';
					$config2['allowed_types'] 	= 'jpg|jpeg|png|pdf';
					$config2['max_size'] 		= '8000';
					$config2['file_name'] 		= 'itemdetail' . $hdrid . '_' . $dtl_id . '.jpg';
					$this->load->library('upload', $config2);
					$this->upload->initialize($config2);
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					if (!$this->upload->do_upload('txtItemDetail')) {
						$errors = $this->upload->display_errors();
					} else {
						$upload_berkas = $this->upload->data();
						$data 	= array('UploadFile' => 1,);
						$this->m_penerimaan_laundry->updateForm($dtl_id, $data);
					}
				}
			}
			// exit;
			$baju = 0;
			$celana = 0;
			$bed_cover = 0;
			$sprei_selimut = 0;
			$lain = 0;
			$detail = $this->M_Laundry_Rekap->get_detail_harian($hdrid);
			foreach ($detail as $hasil) {
				if ($hasil->id_item == '4' || $hasil->id_item == '3' || $hasil->id_item == '13' || $hasil->id_item == '16' || $hasil->id_item == '19' || $hasil->id_item == '5') {
					$baju = $baju + $hasil->jumlah;
				} else if ($hasil->id_item == '10' || $hasil->id_item == '11' || $hasil->id_item == '17') {
					$celana = $celana + $hasil->jumlah;
				} else if ($hasil->id_item == '21') {
					$bed_cover = $bed_cover + $hasil->jumlah;
				} else if ($hasil->id_item == '24' || $hasil->id_item == '8') {
					$sprei_selimut = $sprei_selimut + $hasil->jumlah;
				} else {
					$lain = $lain + $hasil->jumlah;
				}
			}


			if ($Cash == 1) {
				$t_cash = 'Tunai';
			} elseif ($Cash == 0) {
				$t_cash = 'Potong Gaji';
			}

			if ($pos_ldy == 1) {
				$t_pos = 'Laundry 1 - Mess Apple';
			} elseif ($pos_ldy == 2) {
				$t_pos = 'Laundry 2 - Mess Kokio';
			}

			if ($Layanan[0] == '1') {
				$t_layanan = 'CUCI KERING';
			} elseif ($Layanan[0] == '2') {
				$t_layanan = 'SETRIKA';
			} elseif ($Layanan[0] == '3') {
				$t_layanan = 'CUCI KERING + SETRIKA';
			}

			$biaya = number_format($TotalBiaya, 2, ',', '.');

			$pesan = "[NOTIFIKASI LAUNDRY]" . PHP_EOL .
				"No.Nota : {$NoNota}" . PHP_EOL .
				"Lokasi Laundry : {$t_pos}" . PHP_EOL .
				"Tanggal Nota : {$TanggalTerima}" . PHP_EOL .
				"Nama Pelanggan : {$Nama}" . PHP_EOL .
				"NIK : {$NIK}" . PHP_EOL .
				"Departemen	: {$DeptAbbr}" . PHP_EOL .
				"Jenis Pembayaran : {$t_cash}" . PHP_EOL .
				"Jenis Layanan : {$t_layanan}" . PHP_EOL .
				"Berat : {$Berat} Kg" . PHP_EOL .
				"Total Biaya : Rp {$biaya}" . PHP_EOL .
				"Diantar Oleh : {$diantar_oleh}" . PHP_EOL .
				"Status Laundry : Sedang diproses" . PHP_EOL .
				"__________DETAIL LAUNDRY__________" . PHP_EOL .
				"Baju/Jaket : {$baju}" . PHP_EOL .
				"Celana/Rok : {$celana}" . PHP_EOL .
				"Selimut/Sprei : {$sprei_selimut}" . PHP_EOL .
				"Bed Cover : {$bed_cover}" . PHP_EOL .
				"Lainnya : {$lain}";

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
				redirect('Penerimaan_laundry/index?msg=success');
			} else {
				redirect('Penerimaan_laundry/index?msg=failed');
			}
		}
	}

	function ModalDetailItem()
	{
		$id = $this->input->get('id');

		$data['getDataHdr'] 	= $this->m_penerimaan_laundry->get_dataHeaderid($id);
		$data['getDataLaundry'] 	= $this->m_penerimaan_laundry->get_detailLaundry($id);

		$data['get_MstStatusLaundry'] 		= $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry'] 	= $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry'] 		= $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['get_MstKategory'] 			= $this->m_penerimaan_laundry->get_MstKategory();
		$data['get_vwItemKategory'] 		= $this->m_penerimaan_laundry->get_vwItemKategory();
		$data['get_MstPosLaundry'] 		= $this->m_penerimaan_laundry->get_MstPosLaundry();
		$this->load->view('tbl_trnLaundry/ajaxDetailLaundry', $data);
	}

	function ModalDetailItemGet()
	//untuk pengganti modal update selesai laundry
	//belum selesai
	{
		$id = $this->uri->segment(3);

		$data['getDataHdr'] 	= $this->m_penerimaan_laundry->get_dataHeaderid($id);
		$data['getDataLaundry'] 	= $this->m_penerimaan_laundry->get_detailLaundry($id);

		$data['get_MstStatusLaundry'] 		= $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry'] 	= $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry'] 		= $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['get_MstKategory'] 			= $this->m_penerimaan_laundry->get_MstKategory();
		$data['get_vwItemKategory'] 		= $this->m_penerimaan_laundry->get_vwItemKategory();
		$data['get_MstPosLaundry'] 		= $this->m_penerimaan_laundry->get_MstPosLaundry();
		$this->load->view('tbl_trnLaundry/ajaxDetailLaundry', $data);
	}

	function ModalDetailNIK()
	{
		$id = $this->input->get('id');

		$data['getDataHdr'] 		= $this->m_penerimaan_laundry->get_dataHeaderid($id);
		$data['getDataLaundry'] 	= $this->m_penerimaan_laundry->get_detailLaundry($id);

		$data['get_MstStatusLaundry'] 		= $this->m_penerimaan_laundry->get_MstStatusLaundry();
		$data['get_MstPembayaranLaundry'] 	= $this->m_penerimaan_laundry->get_MstPembayaranLaundry();
		$data['get_MstHargaLaundry'] 		= $this->m_penerimaan_laundry->get_MstHargaLaundry();
		$data['get_MstKategory'] 			= $this->m_penerimaan_laundry->get_MstKategory();
		$data['get_vwItemKategory'] 		= $this->m_penerimaan_laundry->get_vwItemKategory();
		$this->load->view('tbl_trnLaundry/ajaxDetailLaundry', $data);
	}

	function updateSelesai()
	{
		$id = $this->input->get('id');
		$hdrdata 	= $this->m_penerimaan_laundry->get_dataHeaderid($id);
		foreach ($hdrdata as $hdr) {
			$NoNota = $hdr->NoNota;
			$TglTransaksi = date('d-m-Y', strtotime($hdr->TglTransaksi));
			$Nama = $hdr->Nama;
			$NIK = $hdr->NIK;
			$DeptAbbr = $hdr->DeptAbbr;
			$Cash = $hdr->Cash;
			$IDLayanan = $hdr->IDLayanan;
			$Berat = $hdr->JumlahBerat;
			$TotalBiaya = number_format($hdr->TotalTagihan, 2, ',', '.');
			$telegramid = $hdr->telegramid;
		}

		if ($Cash == 1) {
			$t_cash = 'Tunai';
		} elseif ($Cash == 0) {
			$t_cash = 'Potong Gaji';
		}

		if ($IDLayanan == '1') {
			$t_layanan = 'CUCI KERING';
		} elseif ($IDLayanan == '2') {
			$t_layanan = 'SETRIKA';
		} elseif ($IDLayanan == '3') {
			$t_layanan = 'CUCI KERING + SETRIKA';
		}

		$datahdr = array(
			'SelesaiDate'				=> date('Y-m-d H:i:s'),
			'IDStatusPelayanan'			=> 2,
			'LastUpdatedBy'				=> $this->session->userdata('user_name'),
			'LastUpdatedDate'			=> date('Y-m-d H:i:s'),
			'LastUpdatedComp'			=> $this->agent->browser() . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ' ' . $this->agent->platform(),
			'Hapus'						=> 0
		);

		$this->m_penerimaan_laundry->updateHeaderSelesai($id, $datahdr);

		$pesan = "[NOTIFIKASI LAUNDRY]" .
			PHP_EOL .
			"No.Nota : {$NoNota}" . PHP_EOL .
			"Tanggal Nota : {$TglTransaksi}" . PHP_EOL .
			"Nama Pelanggan : {$Nama}" . PHP_EOL .
			"NIK : {$NIK}" . PHP_EOL .
			"Departemen : {$DeptAbbr}" . PHP_EOL .
			"Jenis Pembayaran : {$t_cash}" . PHP_EOL .
			"Jenis Layanan : {$t_layanan}" . PHP_EOL .
			"Berat : {$Berat} Kg" . PHP_EOL .
			"Total Biaya : Rp {$TotalBiaya}" . PHP_EOL .
			"Status Laundry : Selesai Dikerjakan" . PHP_EOL .
			"Silahkan ambil laundry anda di lokasi.";

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

		echo 'Data berhasil diupdate';
	}

	function viewFile()
	{
		$id = $this->input->get('id');
		$data['link_upload'] = $this->m_penerimaan_laundry->get_link_upload($id);
		$data['id'] = $id;
		$this->load->view('tbl_trnLaundry/openfile', $data);
	}
	function viewFiledetail()
	{
		$id = $this->input->get('id');
		$data['headerid'] = $this->m_penerimaan_laundry->getheaderid_detail($id);
		$data['link_upload'] = $this->m_penerimaan_laundry->get_link_uploaddetail($id);
		$data['id'] = $id;
		$this->load->view('tbl_trnLaundry/openfiledetail', $data);
	}

	function hapus()
	{
		$hdrid 	= $this->uri->segment(3);

		$datahdr = array(
			'InActive' 	=> '0',
		);
		$this->m_penerimaan_laundry->updateHeader($hdrid, $datahdr);
		redirect('Penerimaan_laundry');
	}

	function delete()
	{
		$id = $this->uri->segment(3);

		$result = $this->m_penerimaan_laundry->delete($id);

		if (!$result) {
			redirect('Penerimaan_laundry/?msg=success');
		} else {
			redirect('Penerimaan_laundry/?msg=failed');
		}
	}
}
