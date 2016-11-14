<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fatncurious_model_promo extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM promo where KODE_PROMO='$kode' and STATUS='1'");
		return $data->result();
	}

	public function SELECT($var)
	{
		$data = $this->db->query("SELECT * FROM " . $var . " where STATUS='1'");
		return $data->result();
	}

	public function searchPromo($limit,$start,$kataSearch,$namaResto,$alamatResto,$namaPromo,$deskripsiPromo,$persentasePromo)
	{
		if($persentasePromo==''){$persentasePromo='0';}
		$this->db->limit($limit,$start);
		$this->db->select(array("restoran.nama_restoran as 'RESTORAN'","restoran.kode_restoran as 'KODE_RESTORAN'","restoran.alamat_restoran as 'ALAMAT'","kartu_kredit.nama_kartu_kredit as 'KARTU'",'promo.*'));
		$this->db->distinct();
		$this->db->from('promo');
		$this->db->join('sponsor_promo','sponsor_promo.kode_promo = promo.kode_promo');
		$this->db->join('kartu_kredit','kartu_kredit.kode_kartu_kredit = sponsor_promo.kode_kartu_kredit');
		$this->db->join('promo_restoran','promo.kode_promo = promo_restoran.kode_promo');
		$this->db->join('restoran','promo_restoran.kode_restoran = restoran.kode_restoran');
		if($namaResto=='' && $alamatResto=='' && $deskripsiPromo=='' && $namaPromo=='' && $persentasePromo=='0'){
			$this->db->like('restoran.nama_restoran',$kataSearch);
			$this->db->or_like('restoran.alamat_restoran',$kataSearch);
			$this->db->or_like('promo.nama_promo',$kataSearch);
			$this->db->or_like('promo.deskripsi_promo',$kataSearch);
		}
		else{
			if($namaResto!=''){
					$this->db->like('restoran.nama_restoran',$kataSearch);
			}
			if($alamatResto!=''){
				$this->db->like('restoran.alamat_restoran',$kataSearch);
			}
			if($deskripsiPromo!=''){
				$this->db->like('promo.deskripsi_promo',$kataSearch);
			}
			if($namaPromo!=''){
				$this->db->like('promo.nama_promo',$kataSearch);
			}
		}
		$this->db->where("promo.PERSENTASE_PROMO >=",$persentasePromo);
		$this->db->order_by('promo.PERSENTASE_PROMO','asc');
		$data = $this->db->get();
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
	public function selectPromoResto($var)
	{
		$this->db->select(array("restoran.nama_restoran as 'RESTORAN'",'promo.*'));
		$this->db->from('promo');
		$this->db->join('promo_restoran','promo.kode_promo = promo_restoran.kode_promo');
		$this->db->join('restoran','promo_restoran.kode_restoran = restoran.kode_restoran');
		$this->db->where('restoran.kode_restoran',$var);
		$this->db->order_by('promo.PERSENTASE_PROMO','desc');
		$data = $this->db->get();
		return $data->result();

	}

	public function selectSemuaPromo($limit,$start){
		$this->db->limit($limit,$start);
		$this->db->select(array("restoran.nama_restoran as 'RESTORAN'","restoran.alamat_restoran as 'ALAMAT'","restoran.kode_restoran as 'KODE_RESTORAN'",'promo.*'));
		$this->db->from('promo');
		$this->db->join('promo_restoran','promo.kode_promo = promo_restoran.kode_promo');
		$this->db->join('restoran','promo_restoran.kode_restoran = restoran.kode_restoran');
		$this->db->where('promo.status',1);
		$this->db->order_by('promo.PERSENTASE_PROMO','desc');
		return $this->db->get()->result();
	}

	public function selectBiggestPromo()
	{

		$this->db->select(array("restoran.nama_restoran as 'RESTORAN'","restoran.alamat_restoran as 'ALAMAT'","restoran.kode_restoran as 'KODE_RESTORAN'",'promo.*'));
		$this->db->from('promo');
		$this->db->join('promo_restoran','promo.kode_promo = promo_restoran.kode_promo');
		$this->db->join('restoran','promo_restoran.kode_restoran = restoran.kode_restoran');
		$this->db->order_by('promo.PERSENTASE_PROMO','desc');
		$data = $this->db->get();
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
		//$data = $this->db->query("DELETE FROM tipe_promo WHERE KODE_PROMO='$kode'");
		//$data = $this->db->query("DELETE FROM sponsor_promo WHERE KODE_PROMO='$kode'");
		//$data = $this->db->query("DELETE FROM promo_restoran WHERE KODE_PROMO='$kode'");
		//$data = $this->db->query("DELETE FROM promo WHERE KODE_PROMO='$kode'");
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


}
