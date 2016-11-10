<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fatncurious_model_restaurant extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM restoran where KODE_RESTORAN='$kode' AND STATUS='1'");
		return $data->result();
	}

	public function selectRestoByUser($kode){
		return $data = $this->db->query("SELECT KODE_RESTORAN FROM restoran where KODE_USER='$kode'")->result();
		//print_r ($data);
		//return $data->result();
	}

	public function selectRestoByKlik($kode){
		return $data = $this->db->query("SELECT * FROM restoran where KODE_RESTORAN='$kode'")->row();
		//print_r ($data);
		//return $data->result();
	}

	public function selectJumlahRatingRestoUser($kodeResto,$kodeUser){
		$where = [
			'STATUS'=>'1',
			'KODE_RESTORAN'=>$kodeResto,
			'KODE_USER'=>$kodeUser
		];
		$this->db->select('JUMLAH_RATING');
		$this->db->where($where);
		$this->db->from('rating_restoran');
		return $this->db->get()->result();
		//return $this->db->query("select JUMLAH_RATING from rating_restoran")->result();
	}

	public function getFotoMenuResto($kode){
		$this->db->select('upload_foto_menu.* , menu.*');
		$this->db->from('upload_foto_menu');
		$this->db->join('menu', 'menu.kode_menu = upload_foto_menu.kode_menu');
		$this->db->where('menu.kode_restoran',$kode);
		$this->db->where('upload_foto_menu.status',1);

		//select upload_foto_menu.* , menu.* from upload_foto_menu join menu on menu.kode_menu = upload_foto_menu.kode_menu where menu.kode_restoran = 'RS001' and upload_foto_menu.status = '1';
		return $this->db->get()->result();
	}

	public function selectSemuaResto($limit,$start){
		$this->db->limit($limit,$start);
		$this->db->select('*')->from('restoran')->where('status',1)->order_by('nama_restoran', 'asc');
		return $this->db->get()->result();
	}

	public function selectSemuaRestoPagination(){
		$data = $this->db->query("SELECT * FROM restoran where STATUS='1' order by nama_restoran asc");
		return $data->result();
	}

	public function selectBiggestPromo($var)
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

	public function selectBiggestKreditResto($var)
	{
		$this->db->select(array("restoran.nama_restoran as 'RESTORAN'","kartu_kredit.nama_kartu_kredit as 'KARTU'",'promo.*'));
		$this->db->distinct();
		$this->db->from('promo');
		$this->db->join('sponsor_promo','sponsor_promo.kode_promo = promo.kode_promo');
		$this->db->join('kartu_kredit','kartu_kredit.kode_kartu_kredit = sponsor_promo.kode_kartu_kredit');
		$this->db->join('promo_restoran','promo.kode_promo = promo_restoran.kode_promo');
		$this->db->join('restoran','promo_restoran.kode_restoran = restoran.kode_restoran');
		$this->db->where('restoran.kode_restoran',$var);
		$this->db->order_by('promo.PERSENTASE_PROMO','desc');
		$data = $this->db->get();
		return $data->result();
	}
	public function selectBiggestKredit($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->select(array("restoran.nama_restoran as 'RESTORAN'","restoran.kode_restoran as 'KODE_RESTORAN'","restoran.alamat_restoran as 'ALAMAT'","kartu_kredit.nama_kartu_kredit as 'KARTU'",'promo.*'));
		$this->db->distinct();
		$this->db->from('promo');
		$this->db->join('sponsor_promo','sponsor_promo.kode_promo = promo.kode_promo');
		$this->db->join('kartu_kredit','kartu_kredit.kode_kartu_kredit = sponsor_promo.kode_kartu_kredit');
		$this->db->join('promo_restoran','promo.kode_promo = promo_restoran.kode_promo');
		$this->db->join('restoran','promo_restoran.kode_restoran = restoran.kode_restoran');
		$this->db->order_by('promo.PERSENTASE_PROMO','desc');
		$data = $this->db->get();
		return $data->result();
	}

	public function SELECT($var)
	{
		$data = $this->db->query("SELECT * FROM " . $var . " where STATUS='1'");
		return $data->result();
	}

	public function buatCombobox(){
		$data = $this->SELECT('restoran');
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_RESTORAN] = $d->KODE_RESTORAN . ' - ' . $d->NAMA_RESTORAN;
		}
		return $arrItem;
	}

	public function buatComboboxU(){
		$temp = $this->db->query("SELECT * FROM user where KODE_JENISUSER='JU003' AND STATUS='1'");
		$data = $temp->result();
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_USER] = $d->NAMA_USER;
		}
		return $arrItem;
	}

	public function generateKode(){
		$count = $this->db->count_all('restoran') + 1;
		return 'RS' . str_pad($count, 3, "0", STR_PAD_LEFT);
	}

	public function INSERT($kodeuser,$nama,$alamat,$telp,$jam,$hari,$status,$deskripsi,$peringatan,$ket){
		$kode = $this->generateKode();
		$restoran = array(
			'KODE_RESTORAN' => $kode,
			'KODE_USER' => $kodeuser,
			'NAMA_RESTORAN' => $nama,
			'ALAMAT_RESTORAN' => $alamat,
			'NO_TELEPON_RESTORAN' => $telp,
			'JAM_BUKA_RESTORAN' => $jam,
			'HARI_BUKA_RESTORAN' => $hari,
			'STATUS_RESTORAN' => $status,
			'DESKRIPSI_RESTORAN' => $peringatan,
			'KETERANGAN_RESTORAN' => $ket,
			'STATUS' => '1'
		);
		$this->db->insert('restoran', $restoran);
  	return $this->db->insert_id();
	}

	public function DELETE($kode){
		$this->db->where('KODE_RESTORAN',$kode);
		$this->db->update('restoran',array('status'=>'0'));
	}

	public function UPDATE($kode,$kodeuser,$nama,$alamat,$telp,$jam,$hari,$status,$deskripsi,$peringatan,$ket){
		$where = 'KODE_RESTORAN="' . $kode .'"';
		$restoran = array(
			'KODE_USER' => $kodeuser,
			'NAMA_RESTORAN' => $nama,
			'ALAMAT_RESTORAN' => $alamat,
			'NO_TELEPON_RESTORAN' => $telp,
			'JAM_BUKA_RESTORAN' => $jam,
			'HARI_BUKA_RESTORAN' => $hari,
			'STATUS_RESTORAN' => $status,
			'DESKRIPSI_RESTORAN' => $deskripsi,
			'JUMLAH_PERINGATAN_RESTORAN' => $peringatan,
			'KETERANGAN_RESTORAN' => $ket,
		);
		$data = $this->db->update_string('restoran',$restoran,$where);
		$this->db->query($data);
	}

}
