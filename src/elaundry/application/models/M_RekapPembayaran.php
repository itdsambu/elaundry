<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class M_RekapPembayaran extends CI_Model{

	function get_suplier(){
		$query = $this->db->query("SELECT * FROM master_suplier");
		return $query->result();
	}

	function get_Kategori(){
		$query = $this->db->query("SELECT * FROM master_kategori");
		return $query->result();
	}

	function get_DataRekapPembelian($tglAwal,$tglAkhir,$kategori,$suplier){
		$query = $this->db->query("SELECT * FROM tblTrnPembelianHdr as A left join master_suplier as B ON A.SuplierID = B.suplierID where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' OR A.Kategori ='$kategori' OR A.suplierID='$suplier'");
		return $query->result();
	}

	function get_DataApprovePembelian($tglAwal,$tglAkhir,$kategori,$suplier){
		$query = $this->db->query("SELECT Komplit,KomplitBy,KomplitDate,Approve_kabag,Approve_kabagBy,Approve_kabagDate,Approve_vgm,Approve_vgmBy,Approve_vgmDate FROM tblTrnPembelianHdr where CONVERT(DATE,Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,Tgl_transaksi) <= '$tglAkhir' AND Kategori ='$kategori'");
		return $query->result();
	}

	function get_dataSuplier($suplier){
		$query = $this->db->query("SELECT * FROM master_suplier WHERE suplierID='$suplier'");
		return $query->result();
	}
	
	function get_DataRekapPerSuplier($tanggalawal,$tanggalakhir,$suplier){
		$query = $this->db->query("SELECT * FROM tblTrnPembelianHdr as A left join master_suplier as B ON A.SuplierID = B.suplierID left join tblTrnPembelianDtl as C ON A.HeaderID = C.HeaderID left join master_item as D ON C.ItemID = D.itemID left join master_satuan as E ON C.SatuanID = E.satuanID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalakhir' AND B.suplierID = '$suplier'");
		return $query->result();
	}

	function get_dataTotalPersuplier($tanggalawal,$tanggalakhir,$suplier){
		$query = $this->db->query("SELECT SUM(Total) as GrandTotal FROM tblTrnPembelianDtl where CONVERT(DATE,Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,Tgl_transaksi) <= '$tanggalakhir' AND SuplierID = '$suplier'");
		return $query->result();
	}

	function get_DataApprovePerSuplier($tanggalawal,$tanggalakhir,$suplier){
		$query = $this->db->query("SELECT Komplit,KomplitBy,KomplitDate,Approve_kabag,Approve_kabagBy,Approve_kabagDate,Approve_vgm,Approve_vgmBy,Approve_vgmDate FROM tblTrnPembelianHdr as A left join master_suplier as B ON A.SuplierID = B.suplierID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalakhir' AND B.suplierID = '$suplier'");
		return $query->result();
	}

	function get_dataPerhariHdr($tanggalAwal,$tanggalAkhir){
		$query = $this->db->query("SELECT * FROM tblTrnPembelianHdr as A join master_suplier as B ON A.SuplierID = B.suplierID Where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalAkhir' AND A.Status = '0'");
		return $query->result();
	}

	function get_dataPerhari($tanggalAwal,$tanggalAkhir){
		$query = $this->db->query("SELECT * FROM tblTrnPembelianDtl as A left join master_suplier as B ON A.SuplierID = B.suplierID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID left join master_item as D ON A.ItemID = D.itemID left join master_satuan as E ON A.SatuanID = E.satuanID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalAkhir'");
		return $query->result();
	}

	function get_dataTotalPerhari($tanggalAwal,$tanggalAkhir){
		$query = $this->db->query("SELECT SUM(Total) as GrandTotal FROM tblTrnPembelianDtl where CONVERT(DATE,Tgl_transaksi) >= '$tanggalAwal' AND CONVERT(DATE,Tgl_transaksi) <= '$tanggalAkhir'");
		return $query->result();
	}

	function get_dataApprovePerhari($tanggalAwal,$tanggalAkhir){
		$query = $this->db->query("SELECT TOP(1) Komplit,KomplitBy,KomplitDate,Approve_kabag,Approve_kabagBy,Approve_kabagDate,Approve_vgm,Approve_vgmBy,Approve_vgmDate FROM tblTrnPembelianHdr as A left join master_suplier as B ON A.SuplierID = B.suplierID where CONVERT(DATE,Tgl_transaksi) >= '$tanggalAwal' AND CONVERT(DATE,Tgl_transaksi) <= '$tanggalAkhir' ORDER BY Approve_vgmDate desc");
		return $query->result();
	}

	function get_dataTransaksi($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT * FROM tblTrnPembelianHdr as A left join master_suplier as B ON A.SuplierID = B.suplierID where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir'");
		return $query->result();
	}

	function get_dataApproveAllTransaksi($tanggalawal,$tanggalakhir,$kategori){
		$query = $this->db->query("SELECT Komplit,KomplitBy,KomplitDate,Approve_kabag,Approve_kabagBy,Approve_kabagDate,Approve_vgm,Approve_vgmBy,Approve_vgmDate FROM tblTrnPembelianHdr as A left join master_suplier as B ON A.SuplierID = B.suplierID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalakhir'");
		return $query->result();
	}

	function get_namaKategori($kategori){
		$query = $this->db->query("SELECT * FROM Master_kategori where kategoriID = '$kategori'");
		return $query->result();
	}

	function get_dataKategoriItemAll($tanggalawal,$tanggalakhir){
		$query = $this->db->query("SELECT A.DetailID,A.HeaderID,A.Harga,A.Quantity,A.Total,B.nama_item,C.kategoriID,C.nama_kategori,D.abbr FROM tblTrnPembelianDtl as A left join master_item as B ON A.ItemID = B.itemID left join master_kategori as C ON B.kategoriID = C.kategoriID left join master_satuan as D ON A.SatuanID = D.satuanID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalakhir'");
		return $query->result();
	}

	function get_dataKategoriItem($tanggalawal,$tanggalakhir,$kategori){
		$query = $this->db->query("SELECT * FROM tblTrnPembelianDtl as A left join master_kategori as B ON A.KategoriID = B.kategoriID left join master_item as C ON A.ItemID = C.itemID left join master_satuan as D ON A.SatuanID = D.satuanID left join tblTrnPembelianHdr as E ON A.HeaderID = E.HeaderID left join master_suplier as F ON E.SuplierID = F.suplierID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalakhir' AND C.kategoriID = '$kategori' AND E.Status = '0'");
		return $query->result();
	}

	function get_dataTotalkategori($tanggalawal,$tanggalakhir,$kategori){
		$query = $this->db->query("SELECT SUM(Total) as GrandTotal FROM tblTrnPembelianDtl as A left join master_item as B ON A.ItemID = B.itemID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalakhir' AND B.kategoriID = '$kategori' AND C.Status = '0'");
		return $query->result();
	}

	function get_dataApproveKategoriItem($tanggalawal,$tanggalakhir,$kategori){
		$query = $this->db->query("SELECT * FROM tblTrnPembelianDtl as A left join master_kategori as B ON A.KategoriID = B.kategoriID LEFT JOIN tblTrnPembelianHdr as C ON A.HeaderID=C.HeaderID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalakhir'");
		return $query->result();
	}

	function get_dataPeriode($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT A.No_ref, D.nama_item, A.Quantity, E.abbr, A.Harga, F.kategoriID, A.Total, A.Keterangan FROM tblTrnPembelianDtl as A left join master_suplier as B ON A.SuplierID = B.suplierID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID left join master_item as D ON A.ItemID = D.itemID left join master_satuan as E ON A.SatuanID = E.satuanID left join master_kategori as F ON F.kategoriID=D.kategoriID where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' AND C.Status = '0'");
		return $query->result();
	}

	function get_dataApprovePeriode($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT TOP(1) Komplit,KomplitBy,KomplitDate,Approve_kabag,Approve_kabagBy,Approve_kabagDate,Approve_vgm,Approve_vgmBy,Approve_vgmDate FROM tblTrnPembelianHdr as A left join master_suplier as B ON A.SuplierID = B.suplierID where CONVERT(DATE,Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,Tgl_transaksi) <= '$tglAkhir' Order by Approve_vgmDate desc");
		return $query->result();
	}

	function get_dataTotalPerPeriode($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT B.Kategori, SUM(Total) as GrandTotal FROM tblTrnPembelianDtl as A left join tblTrnPembelianHdr as B ON A.HeaderID = B.HeaderID where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' AND B.Status = '0' Group by B.Kategori");
		return $query->result();
	}

	function get_DataHdr($id){
		$query = $this->db->query("SELECT A.*,B.nama_suplier FROM tblTrnPembelianHdr as A left join master_suplier as B ON A.suplierID = B.suplierID where A.HeaderID = '$id'");
		return $query->result();
	}

	function get_DataDtl($id){
		$query =$this->db->query("SELECT A.*,B.nama_item,C.abbr FROM tblTrnPembelianDtl as A left join master_item as B ON A.ItemID = B.itemID left join master_satuan as C ON A.SatuanID = C.satuanID where A.HeaderID = '$id'");
		return $query->result();
	}

	function get_TotalDtl($id){
		$query = $this->db->query("SELECT SUM(Total) as GrandTotal FROM tblTrnPembelianDtl as A where A.HeaderID = '$id'");
		return $query->result();
	}

	function get_dataTransaksiPerhari($tanggalAwal,$tanggalAkhir){
		$query = $this->db->query("SELECT * FROM tblTrnPembelianDtl as A left join master_suplier as B ON A.SuplierID = B.suplierID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID left join master_item as D ON A.ItemID = D.itemID left join master_satuan as E ON A.SatuanID = E.satuanID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalAkhir' AND Approve_kabag = '1'");
		return $query->result();
	}

	function get_dataTotalTransaksiPerhari($tanggalAwal,$tanggalAkhir){
		$query = $this->db->query("SELECT SUM(A.Total) as GrandTotal FROM tblTrnPembelianDtl as A left join tblTrnPembelianHdr as B ON A.HeaderID = B.HeaderID left join master_item as C ON A.ItemID = C.itemID left join master_kategori as D ON C.kategoriID = D.kategoriID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalAkhir' AND B.Approve_kabag = '1' AND D.KategoriID != '18'");
		return $query->result();
	}

	function get_dataTotalTransaksiPerhariPeralatan($tanggalAwal,$tanggalAkhir){
		$query = $this->db->query("SELECT SUM(A.Total) as GrandTotalPeralatan FROM tblTrnPembelianDtl as A left join tblTrnPembelianHdr as B ON A.HeaderID = B.HeaderID left join master_item as C ON A.ItemID = C.itemID left join master_kategori as D ON C.kategoriID = D.kategoriID where CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalAkhir' AND B.Approve_kabag = '1' AND D.KategoriID = '18'");
		return $query->result();
	}

	function get_dataTransaksiPeriode($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT A.No_ref, A.Tgl_transaksi, D.nama_item, A.Quantity, E.abbr, A.Harga, F.kategoriID, A.Total, A.Keterangan, F.nama_kategori FROM tblTrnPembelianDtl as A left join master_suplier as B ON A.SuplierID = B.suplierID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID left join master_item as D ON A.ItemID = D.itemID left join master_satuan as E ON A.SatuanID = E.satuanID left join master_kategori as F ON D.kategoriID = F.kategoriID where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' AND Approve_kabag = '1' ORDER BY A.Tgl_transaksi ASC");
		return $query->result();
	}

	function get_dataTotalTransaksiPerPeriode($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT SUM(A.Total) as GrandTotal FROM tblTrnPembelianDtl as A left join tblTrnPembelianHdr as B ON A.HeaderID = B.HeaderID left join master_item as C ON A.ItemID = C.itemID left join master_kategori as D ON C.kategoriID = D.kategoriID where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' AND B.Approve_kabag = '1' AND D.KategoriID != '18'");
		return $query->result();
	}

	function get_dataTotalTransaksiPerPeriodePeralatan($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT SUM(A.Total) as GrandTotalPeralatan FROM tblTrnPembelianDtl as A left join tblTrnPembelianHdr as B ON A.HeaderID = B.HeaderID left join master_item as C ON A.ItemID = C.itemID left join master_kategori as D ON C.kategoriID = D.kategoriID where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' AND B.Approve_kabag = '1' AND D.KategoriID = '18'");
		return $query->result();
	}

	function get_dataAllitem($tanggalawal,$tanggalakhir){
		$query = $this->db->query("SELECT A.ItemID,B.nama_item,SUM(A.Quantity) as Quantity, C.abbr,E.Grand FROM tblTrnPembelianDtl as A left join master_item as B ON A.itemID = B.itemID left join master_satuan as C ON B.satuanID = C.satuanID left join tblTrnPembelianHdr as D ON A.HeaderID = D.HeaderID left join (SELECT ItemID, SUM(Quantity) as Qty, Sum(Total) as Grand FROM tblTrnPembelianDtl as a join tblTrnPembelianHdr as b ON a.HeaderID = b.HeaderID where CONVERT(DATE,a.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,a.Tgl_transaksi) <= '$tanggalakhir' and b.Status = '0' Group by ItemID) as E ON A.ItemID = E.ItemID WHERE CONVERT(DATE,A.Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tanggalakhir' AND D.Approve_vgm = '1' and D.Status= '0' GROUP BY A.ItemID,B.nama_item,C.abbr,E.Grand ORDER BY Quantity DESC");
		return $query->result();
	}

	function get_GrandTotalAllitem($tanggalawal,$tanggalakhir){
		$query = $this->db->query("SELECT SUM(Grand) as Total FROM (SELECT HeaderID, ItemID, SUM(Quantity) as Qty, Sum(Total) as Grand FROM tblTrnPembelianDtl where CONVERT(DATE,Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,Tgl_transaksi) <= '$tanggalakhir'  Group by HeaderID, ItemID) as A join tblTrnPembelianHdr as B ON A.HeaderID = B.HeaderID where B.Approve_vgm='1'");
		return $query->result();
	}

	function get_ApproveAllitem($tanggalawal,$tanggalakhir){
		$query = $this->db->query("SELECT TOP(1) Tgl_transaksi, Komplit, KomplitBy, KomplitDate, Approve_kabag, Approve_kabagBy, Approve_kabagDate, Approve_vgm, Approve_vgmBy, Approve_vgmDate FROM tblTrnPembelianHdr WHERE CONVERT(DATE,Tgl_transaksi) >= '$tanggalawal' AND CONVERT(DATE,Tgl_transaksi) <= '$tanggalakhir' and Status = '0' and Approve_vgm = '1' order by Approve_vgmDate desc");
		return $query->result();
	}

	function get_dataRekapPeriodePersuplierRek($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT distinct A.SuplierID,B.nama_suplier,B.nama_rek,B.nomor_rek,SUM(Total) as Total 
								FROM tblTrnPembelianDtl as A 
								left join master_suplier as B ON A.SuplierID = B.suplierID 
								left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID 
								where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' 
								AND C.Approve_vgm = '1' AND B.nomor_rek != 'Kas Bon' 
								GROUP BY A.SuplierID,B.nama_suplier,B.nama_rek,B.nomor_rek ORDER BY B.nomor_rek ASC");
		return $query->result();
	}

	function get_dataRekapPeriodePersuplierKas($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT distinct A.SuplierID,B.nama_suplier,B.nama_rek,B.nomor_rek,SUM(Total) as Total 
								FROM tblTrnPembelianDtl as A 
								left join master_suplier as B ON A.SuplierID = B.suplierID 
								left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID 
								where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' 
								AND C.Approve_vgm = '1' AND B.nomor_rek = 'Kas Bon' 
								GROUP BY A.SuplierID,B.nama_suplier,B.nama_rek,B.nomor_rek ORDER BY B.nomor_rek ASC");
		return $query->result();
	}

	function get_TotalSuplierRek($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT SUM(Total) as GrandTotal 
								FROM tblTrnPembelianDtl as A 
								left join master_suplier as B ON A.SuplierID = B.suplierID 
								left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID 
								where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' 
								AND C.Approve_vgm = '1' AND B.nomor_rek != 'Kas Bon'");
		return $query->result();
	}

	function get_TotalSuplierKas($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT SUM(Total) as GrandTotal 
								FROM tblTrnPembelianDtl as A 
								left join master_suplier as B ON A.SuplierID = B.suplierID 
								left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID 
								where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' 
								AND C.Approve_vgm = '1' AND B.nomor_rek = 'Kas Bon'");
		return $query->result();
	}

	function get_TotalSuplier($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT SUM(Total) as GrandTotal 
								FROM tblTrnPembelianDtl as A 
								left join master_suplier as B ON A.SuplierID = B.suplierID 
								left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID 
								where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' 
								AND C.Approve_vgm = '1'");
		return $query->result();
	}

	function get_KasBon($periode,$bulan,$tahun){
		$query = $this->db->query("SELECT * From tblTrnKasBon where Periode = '$periode' and Bulan = '$bulan' and Tahun = '$tahun'");
		return $query->result();
	}

	function get_Sisa($tglAwal,$tglAkhir,$periode,$bulan,$tahun){
		$query = $this->db->query("SELECT (D.Jumlah - SUM(A.Total)) as Sisa
								FROM tblTrnPembelianDtl as A 
								left join master_suplier as B ON A.SuplierID = B.suplierID 
								left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID
								cross join tblTrnKasBon as D
								where CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' 
								AND C.Approve_vgm = '1' AND B.nomor_rek = 'Kas Bon' and D.Periode = '$periode' and D.Bulan = '$bulan' and D.Tahun = '$tahun'
								Group by D.Jumlah");
		return $query->result();
	}

	function get_ApproveRekapPeriodePersuplier($tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT TOP(1) C.nama_suplier, A.Komplit, A.KomplitBy, A.KomplitDate, A.Approve_kabag, A.Approve_kabagBy, A.Approve_kabagDate, A.Approve_vgm, A.Approve_vgmBy, A.Approve_vgmDate FROM tblTrnPembelianHdr as A left join tblTrnPembelianDtl as B ON A.HeaderID = B.HeaderID left join master_suplier as C ON B.SuplierID = C.suplierID where CONVERT(DATE,B.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,B.Tgl_transaksi) <= '$tglAkhir' AND A.Approve_vgm = '1' ORDER BY Approve_vgmDate DESC");
		return $query->result();
	}

	function get_ModalSuplier($suplierid){
		$query = $this->db->query("SELECT distinct nama_suplier FROM master_suplier where suplierID = '$suplierid'");
		return $query->result();
	}

	function get_dataDetailPersuplier($suplier,$tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT distinct B.nama_item, D.abbr,SUM(A.Quantity) as Quantity,SUM(Total) as Total, A.Keterangan 
			FROM tblTrnPembelianDtl as A 
			left join master_item as B ON A.ItemID = B.itemID 
			left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID 
			left join master_satuan as D ON A.SatuanID=D.satuanID 
			where A.SuplierID = '$suplier' and CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' 
			and C.Approve_vgm = '1' 
			GROUP BY B.nama_item, D.abbr, A.Keterangan 
			ORDER BY nama_item ASC");
		return $query->result();
	}

	function get_dataTotalDetailPersuplier($suplier,$tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT distinct A.SuplierID,SUM(A.Total) as GrandTotal FROM tblTrnPembelianDtl as A left join master_item as B ON A.ItemID = B.itemID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID where A.SuplierID = '$suplier' and CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' and C.Approve_kabag = 1 GROUP BY A.SuplierID ORDER BY A.SuplierID ASC");
		return $query->result();
	}

	function get_ApprovePersuplier($suplier,$tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT distinct C.Approve_vgm, C.Approve_vgmDate,C.Approve_vgmBy,C.Komplit,C.KomplitBy,C.KomplitDate,C.Approve_kabag,C.Approve_kabagBy,C.Approve_kabagDate
							FROM tblTrnPembelianDtl as A 
							left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID
							where A.SuplierID = '$suplier' and CONVERT(DATE,A.Tgl_transaksi) >= '$tglAwal' 
							AND CONVERT(DATE,A.Tgl_transaksi) <= '$tglAkhir' and C.Approve_vgm = '1'");
		return $query->result();
	}

	function get_dataDetailPersuplierPerBulan($suplier,$bulan,$tahun){
		$query = $this->db->query("SELECT distinct B.nama_item,SUM(A.Quantity) as Quantity,SUM(Total) as Total FROM tblTrnPembelianDtl as A left join master_item as B ON A.ItemID = B.itemID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID where A.SuplierID = '$suplier' and MONTH(A.Tgl_transaksi) = '$bulan' and YEAR(A.Tgl_transaksi) = '$tahun' and C.Approve_kabag = 1 GROUP BY B.nama_item ORDER BY nama_item ASC");
		return $query->result();
	}

	function get_dataTotalDetailPersuplierPerBulan($suplier,$bulan,$tahun){
		$query = $this->db->query("SELECT distinct A.SuplierID,SUM(A.Total) as Total FROM tblTrnPembelianDtl as A left join master_item as B ON A.ItemID = B.itemID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID where A.SuplierID = '$suplier' and MONTH(A.Tgl_transaksi) = '$bulan' and YEAR(A.Tgl_transaksi) = '$tahun' and C.Approve_kabag = 1 GROUP BY A.SuplierID ORDER BY A.SuplierID ASC");
		return $query->result();
	}

	function get_dataRekapPerbulanPersuplier($bln,$thn){
		$query = $this->db->query("SELECT  distinct A.SuplierID,B.nama_suplier,SUM(Total) as Total FROM tblTrnPembelianDtl as A left join master_suplier as B ON A.SuplierID = B.suplierID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID where MONTH(A.Tgl_transaksi) = '$bln' and YEAR(A.Tgl_transaksi) = '$thn'  AND C.Approve_kabag = '1' GROUP BY A.SuplierID,B.nama_suplier ORDER BY Total DESC");
		return $query->result();
	}

	function get_dataRekapTotalPersuplier($bln,$thn){
		$query = $this->db->query("SELECT SUM(Total) as GrandTotal FROM tblTrnPembelianDtl as A left join master_suplier as B ON A.SuplierID = B.suplierID left join tblTrnPembelianHdr as C ON A.HeaderID = C.HeaderID where MONTH(A.Tgl_transaksi) = '$bln' and YEAR(A.Tgl_transaksi) = '$thn'  AND C.Approve_kabag = '1'");
		return $query->result();
	}

	function get_ApproveRekapPerbulanPersuplier($bln,$thn){
		$query = $this->db->query("SELECT TOP(1) C.nama_suplier, A.Komplit, A.KomplitBy, A.KomplitDate, A.Approve_kabag, A.Approve_kabagBy, A.Approve_kabagDate, A.Approve_vgm, A.Approve_vgmBy, A.Approve_vgmDate FROM tblTrnPembelianHdr as A left join tblTrnPembelianDtl as B ON A.HeaderID = B.HeaderID left join master_suplier as C ON B.SuplierID = C.suplierID where MONTH(A.Tgl_transaksi) = '12' and YEAR(A.Tgl_transaksi) = '2019'  AND A.Approve_kabag = '1' ORDER BY Approve_vgmDate DESC");
		return $query->result();
	}

	function get_dataDetailItemPersuplier($itemid,$tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT C.nama_suplier,SUM(Quantity) as Quantity,SUM(A.Total) as Total FROM tblTrnPembelianDtl as A left join tblTrnPembelianHdr as B ON A.HeaderID = B.HeaderID left join master_suplier as C ON A.SuplierID = C.suplierID where CONVERT(date,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(date,A.Tgl_transaksi) <= '$tglAkhir' and ItemID = '$itemid' and Approve_kabag = '1' GROUP BY C.nama_suplier");
		return $query->result();
	}

	function get_dataDetailItemPersuplierTotal($itemid,$tglAwal,$tglAkhir){
		$query = $this->db->query("SELECT SUM(Quantity) as TotalQuantity,SUM(A.Total) as GrandTotal FROM tblTrnPembelianDtl as A left join tblTrnPembelianHdr as B ON A.HeaderID = B.HeaderID left join master_suplier as C ON A.SuplierID = C.suplierID where CONVERT(date,A.Tgl_transaksi) >= '$tglAwal' AND CONVERT(date,A.Tgl_transaksi) <= '$tglAkhir' and ItemID = '$itemid' and Approve_kabag = '1'");
		return $query->result();
	}
}