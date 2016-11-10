<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kartu_kredit extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM kartu_kredit where KODE_KARTU_KREDIT='$kode' AND STATUS='1'");
		return $data->result();
	}

	public function FILTER($filter,$cari,$sort,$urutan){
		if($sort == '-') $sort = "NAMA_KARTU_KREDIT";
		if($filter == '-') $filter = "NAMA_KARTU_KREDIT";
		$data = $this->db->query("SELECT * FROM kartu_kredit WHERE $filter LIKE('%$cari%') ORDER BY $sort $urutan");
		return $data->result();
	}

	public function SELECT($var)
	{
		$data = $this->db->query("SELECT * FROM " . $var . " WHERE STATUS='1'");
		return $data->result();
	}

	public function buatCombobox(){
		$data = $this->SELECT('kartu_kredit');
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_KARTU_KREDIT] = $d->KODE_KARTU_KREDIT . ' - ' . $d->NAMA_KARTU_KREDIT;
		}
		return $arrItem;
	}

	public function buatComboboxJU(){
		$data = $this->SELECT('jenis_user');
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_JENISUSER] = $d->NAMA_JENISUSER;
		}
		return $arrItem;
	}

	public function generateKode(){
		$count = $this->db->count_all('kartu_kredit') + 1;
		return 'KKK' . str_pad($count, 2, "0", STR_PAD_LEFT);
	}

	public function INSERT($nama,$alamat,$telp,$web,$ket){
		$kode = $this->generateKode();
		$kartu = array(
			'KODE_KARTU_KREDIT' => $kode,
			'NAMA_KARTU_KREDIT' => $nama,
			'ALAMAT_KARTU_KREDIT' => $alamat,
			'NOMOR_TELEPON_KARTU_KREDIT' => $telp,
			'WEBSITE_KARTU_KREDIT' => $web,
			'KETERANGAN_KARTU_KREDIT' => $ket,
			'STATUS' =>'1'
		);
		$this->db->insert('kartu_kredit', $kartu);
  	return $this->db->insert_id();
	}

	public function DELETE($kode){
		//$data = $this->db->query("DELETE FROM kartu_kredit WHERE KODE_KARTU_KREDIT='$kode'");
		$this->db->where('KODE_KARTU_KREDIT',$kode);
		$this->db->update('kartu_kredit',array('status'=>'0'));
	}

	public function UPDATE($kode,$nama,$alamat,$telp,$web,$ket){
		$where = 'KODE_KARTU_KREDIT="' . $kode .'"';
		$kartu = array(
			'KODE_KARTU_KREDIT' => $kode,
			'NAMA_KARTU_KREDIT' => $nama,
			'ALAMAT_KARTU_KREDIT' => $alamat,
			'NOMOR_TELEPON_KARTU_KREDIT' => $telp,
			'WEBSITE_KARTU_KREDIT' => $web,
			'KETERANGAN_KARTU_KREDIT' => $ket,
		);
		$data = $this->db->update_string('kartu_kredit',$kartu,$where);
		$this->db->query($data);
	}

	public function SELECT_PROMO($kode){
		$hasil = $this->db->query("SELECT p.KODE_PROMO as KODE, p.NAMA_PROMO as NAMA, r.NAMA_RESTORAN as NAMA_RESTORAN, r.KODE_RESTORAN as KODE_RESTORAN from restoran as r,promo_restoran as pr,promo as p, sponsor_promo as sp where sp.KODE_KARTU_KREDIT='$kode' AND p.KODE_PROMO=sp.KODE_PROMO AND sp.KODE_PROMO=pr.KODE_PROMO AND pr.KODE_RESTORAN = r.KODE_RESTORAN")->result();
		return $hasil;
	}

	public function SELECT_USER($kode){
		$hasil = $this->db->query("SELECT u.KODE_USER as KODE, u.NAMA_USER as NAMA,ju.NAMA_JENISUSER as NAMA_JENIS from user as u,jenis_user as ju, kartu_kredit_user as kku where kku.KODE_KARTU_KREDIT='$kode' AND kku.KODE_USER=u.KODE_USER AND u.KODE_JENISUSER=ju.KODE_JENISUSER")->result();
		return $hasil;
	}

}
