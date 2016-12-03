<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_promo extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM promo where KODE_PROMO='$kode' and STATUS='1'");
		return $data->result();
	}

	public function FILTER($filter,$cari,$sort,$urutan){
		if($sort == '-') $sort = "NAMA_PROMO";
		if($filter == '-') $filter = "NAMA_PROMO";
		$data = $this->db->query("SELECT * FROM PROMO WHERE $filter LIKE('%$cari%') ORDER BY $sort $urutan");
		return $data->result();
	}

	public function SELECT($var)
	{
		$data = $this->db->query("SELECT * FROM " . $var . " where STATUS='1'");
		return $data->result();
	}
	public function selectPromoByResto($var,$resto)
	{
		$data = $this->db->query(
		"SELECT * FROM $var , restoran, promo_restoran
		WHERE restoran.KODE_RESTORAN = promo_restoran.KODE_RESTORAN
		AND promo_restoran.KODE_PROMO = $var.KODE_PROMO
		AND promo_restoran.KODE_RESTORAN = '$resto' and PROMO.STATUS='1'"
		);
		return $data->result();
	}

	public function buatCombobox(){
		$data = $this->selectPromoByResto('promo','RS001');
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_PROMO] = $d->KODE_PROMO . ' - ' . $d->NAMA_PROMO;
		}
		return $arrItem;
	}


	public function generateKode(){
		$count = $this->db->count_all('promo') + 1;
		return 'PR' . str_pad($count, 3, "0", STR_PAD_LEFT);
	}

	public function count(){
		return $this->db->count_all('promo');
	}

	public function INSERT($nama,$promo,$masaBerlaku,$foto,$persentase,$ket){
		$kode = $this->generateKode();
		$promo = array(
			'KODE_PROMO' => $kode,
			'NAMA_PROMO' => $nama,
			'DESKRIPSI_PROMO' => $promo,
			'MASABERLAKU_PROMO' => $masaBerlaku,
			'FOTO_PROMO' => $foto,
			'PERSENTASE_PROMO' => $persentase,
			'KETERANGAN_PROMO' => $ket,
			'STATUS' => '1'
		);
		$promoResto = array(
			'KODE_PROMO' => $kode,
			'KODE_RESTORAN' =>'RS001',

		);

		$this->db->insert('promo', $promo);
		$this->db->insert('promo_restoran', $promoResto);
  	return $this->db->insert_id();
	}

	public function DELETE($kode){
		$this->db->where('KODE_PROMO',$kode);
		$this->db->update('promo',array('status'=>'0'));
	}

	public function UPDATE($kode,$nama,$promo,$masaBerlaku,$foto,$persentase,$ket){
		$where = 'KODE_PROMO="' . $kode .'"';
		$promo = array(
			'KODE_PROMO' => $kode,
			'NAMA_PROMO' => $nama,
			'DESKRIPSI_PROMO' => $promo,
			'MASABERLAKU_PROMO' => $masaBerlaku,
			'FOTO_PROMO' => $foto,
			'PERSENTASE_PROMO' => $persentase,
			'KETERANGAN_PROMO' => $ket,
		);
		$data = $this->db->update_string('promo',$promo,$where);
		$this->db->query($data);
	}

	public function updatePromo($kode,$nama,$promo,$masaBerlaku,$persentase,$ket){
		$where = 'KODE_PROMO="' . $kode .'"';
		$promo = array(
			'KODE_PROMO' => $kode,
			'NAMA_PROMO' => $nama,
			'DESKRIPSI_PROMO' => $promo,
			'MASABERLAKU_PROMO' => $masaBerlaku,
			'PERSENTASE_PROMO' => $persentase,
			'KETERANGAN_PROMO' => $ket,
		);
		$data = $this->db->update_string('promo',$promo,$where);
		$this->db->query($data);
	}
	public function updateFotoPromo($kode,$foto){
		$where = 'KODE_PROMO="' . $kode .'"';
		$promo = array(
				'FOTO_PROMO' => $foto
		);
		$data = $this->db->update_string('promo',$promo,$where);
		$this->db->query($data);
	}

	public function SELECT_KARTU($kode){
		$hasil = $this->db->query("SELECT kk.KODE_KARTU_KREDIT as 'KODE',kk.NAMA_KARTU_KREDIT as 'NAMA',r.KODE_RESTORAN as 'KODE_RESTORAN',r.NAMA_RESTORAN as 'NAMA_RESTORAN' from kartu_kredit as kk, promo_restoran as pr, sponsor_promo as sp,restoran as r where sp.KODE_PROMO='$kode' AND sp.KODE_KARTU_KREDIT=kk.KODE_KARTU_KREDIT AND pr.KODE_PROMO = '$kode' AND pr.KODE_RESTORAN=r.KODE_RESTORAN group by kk.KODE_KARTU_KREDIT")->result();
		return $hasil;
	}

	public function SELECT_MENU($kode){
		$hasil = $this->db->query("SELECT m.KODE_MENU as KODE, m.NAMA_MENU as NAMA, m.KODE_RESTORAN as KODE_RESTORAN, r.NAMA_RESTORAN as NAMA_RESTORAN, jm.NAMA_JENISMENU as NAMA_JENIS from menu as m, restoran as r, jenis_menu as jm, tipe_promo as tp where tp.KODE_PROMO='$kode' AND tp.KODE_JENISMENU=m.KODE_JENIS_MENU AND m.KODE_RESTORAN=r.KODE_RESTORAN AND tp.KODE_JENISMENU=jm.KODE_JENISMENU AND tp.status='1' GROUP BY m.KODE_MENU")->result();
		return $hasil;
	}


}
