<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fatncurious_model_menu extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM menu where KODE_MENU='$kode' and STATUS='1'");
		return $data->result();
	}

	public function SELECT($var)
	{
		$data = $this->db->query("SELECT * FROM " . $var);
		return $data->result();
	}
	public function selectMenu($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('restoran','menu.kode_restoran = restoran.kode_restoran');
		$this->db->where('menu.status',1);
		$this->db->order_by('1','asc');
		return $this->db->get()->result();
	}

	public function searchMenu($limit,$start,$kataSearch,$makanan,$minuman,$snack,$dessert)
	{
		$mak=false;
		$min=false;
		$sna=false;
		$des=false;

		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('restoran','menu.kode_restoran = restoran.kode_restoran');
		$this->db->like('menu.NAMA_MENU',$kataSearch);
		if($makanan != ''){
			$this->db->where('menu.KODE_JENIS_MENU','JM001');
			$mak=true;
		}
		else if($minuman != ''){
			$this->db->where('menu.KODE_JENIS_MENU','JM002');
			$min=true;
		}
		else if($snack != ''){
			$this->db->where('menu.KODE_JENIS_MENU','JM003');
			$sna=true;
		}
		else if($dessert != ''){
			$this->db->where('menu.KODE_JENIS_MENU','JM004');
			$des=true;
		}
		if($makanan != '' and $mak==false){	$this->db->or_where('menu.KODE_JENIS_MENU','JM001');}
		if($minuman != '' and $min==false){	$this->db->or_where('menu.KODE_JENIS_MENU','JM002');}
		if($snack != '' and $sna==false){	$this->db->or_where('menu.KODE_JENIS_MENU','JM003');}
		if($dessert != '' and $des==false){	$this->db->or_where('menu.KODE_JENIS_MENU','JM004');}

		$this->db->where('menu.status',1);
		$this->db->order_by('menu.nama_menu','asc');
		return $this->db->get()->result();
	}

	public function selectMenuByResto($resto)
	{
		$data = $this->db->query("SELECT menu.*, restoran.* FROM menu , restoran WHERE restoran.KODE_RESTORAN = menu.KODE_RESTORAN AND menu.KODE_RESTORAN = '$resto' and menu.STATUS='1'");
		return $data->result();
	}

	public function buatCombobox(){
		$data = $this->selectMenuByResto('menu','RS001');
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_MENU] = $d->KODE_MENU . ' - ' . $d->NAMA_MENU;
		}
		return $arrItem;
	}

	public function buatComboboxJM(){
		$data = $this->SELECT('jenis_menu');
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_JENISMENU] = $d->NAMA_JENISMENU;
		}
		return $arrItem;
	}

	public function buatComboboxJR(){
		$data = $this->selectMenuByResto('menu','RS001');
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_RESTORAN] = $d->NAMA_RESTORAN;
		}
		return $arrItem;
	}

	public function generateKode(){
		$count = $this->db->count_all('menu') + 1;
		return 'ME' . str_pad($count, 3, "0", STR_PAD_LEFT);
	}

	public function INSERT($kode2,$kode3,$nama,$menu,$harga,$ket){
		$kode = $this->generateKode();
		$menu = array(
			'KODE_MENU' => $kode,
			'KODE_JENIS_MENU' => $kode2,
			'KODE_RESTORAN' => $kode3,
			'NAMA_MENU' => $nama,
			'DESKRIPSI_MENU' => $menu,
			'HARGA_MENU' => $harga,
			'KETERANGAN_MENU' => $ket,
			'STATUS' => '1'
		);
		$this->db->insert('menu', $menu);
  	return $this->db->insert_id();
	}

	public function DELETE($kode){
		//$data = $this->db->query("DELETE FROM rating_menu WHERE KODE_MENU='$kode'");
		//$data = $this->db->query("DELETE FROM menu WHERE KODE_MENU='$kode'");
		$this->db->where('KODE_MENU',$kode);
		$this->db->update('menu',array('status'=>'0'));
	}

	public function UPDATE($kode,$kode2,$kode3,$nama,$menu,$harga,$ket){
		$where = 'KODE_MENU="' . $kode .'"';
		$user = array(
			'KODE_JENIS_MENU' => $kode2,
			'KODE_RESTORAN' => $kode3,
			'NAMA_MENU' => $nama,
			'DESKRIPSI_MENU' => $menu,
			'HARGA_MENU' => $harga,
			'KETERANGAN_MENU' => $ket,
		);
		$data = $this->db->update_string('menu',$user,$where);
		$this->db->query($data);
	}


}
