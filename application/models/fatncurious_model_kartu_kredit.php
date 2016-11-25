<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fatncurious_model_kartu_kredit extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM kartu_kredit where KODE_KARTU_KREDIT='$kode' AND STATUS='1'");
		return $data->result();
	}

	public function SELECT($var)
	{
		$data = $this->db->query("SELECT * FROM " . $var . " WHERE STATUS='1'");
		return $data->result();
	}
	public function selectSemuaKredit(){
		$data = $this->db->query("SELECT * FROM KARTU_KREDIT WHERE STATUS='1'");
		return $data->result();
	}

	public function searchKredit($limit,$start,$namaKartu)
	{
		$this->db->limit($limit,$start);
		$this->db->select(array("restoran.nama_restoran as 'RESTORAN'","restoran.kode_restoran as 'KODE_RESTORAN'","restoran.URL_FOTO_RESTORAN as 'URL_FOTO_RESTORAN'","restoran.alamat_restoran as 'ALAMAT'","kartu_kredit.nama_kartu_kredit as 'KARTU'","kartu_kredit.URL_FOTO_KARTU_KREDIT as 'URL_FOTO_KARTU_KREDIT'",'promo.*'));
		$this->db->distinct();
		$this->db->from('promo');
		$this->db->join('sponsor_promo','sponsor_promo.kode_promo = promo.kode_promo');
		$this->db->join('kartu_kredit','kartu_kredit.kode_kartu_kredit = sponsor_promo.kode_kartu_kredit');
		$this->db->join('promo_restoran','promo.kode_promo = promo_restoran.kode_promo');
		$this->db->join('restoran','promo_restoran.kode_restoran = restoran.kode_restoran');
		$this->db->like('kartu_kredit.nama_kartu_kredit',$namaKartu);
		$this->db->order_by('promo.PERSENTASE_PROMO','desc');
		$data = $this->db->get();
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


}
