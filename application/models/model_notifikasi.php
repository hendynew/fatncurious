<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_notifikasi extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SELECT($user){
		$this->db->where("KODE_USER",$user);
		return $this->db->get("notifikasi")->result();
	}

	public function generateKode(){
		$count = $this->db->count_all('notifikasi') + 1;
		return 'NO' . str_pad($count, 3, "0", STR_PAD_LEFT);
	}

	public function count(){
		return $this->db->count_all('notifikasi');
	}

	public function INSERT($user,$isi,$url){
		$kode = $this->generateKode();
		$user = array(
			'KODE_NOTIFIKASI'=>$kode,
			'KODE_USER' => $user,
			'ISI' => $isi,
			'URL' => $url,
			'STATUS' => '1'
		);
		$this->db->insert('notifikasi',$user);
	}

	public function DELETE($kode){
		$this->db->where('KODE_NOTIFIKASI',$kode);
		$this->db->update('notifikasi',array('status'=>'0'));
	}

	public function UPDATE($kode, $user, $isi, $url, $status){
		$where = 'KODE_NOTIFIKASI="' . $kode .'"';
		$user = array(
			'KODE_USER' => $user,
			'ISI' => $isi,
			'URL' => $url,
			'STATUS' => $status,
		);
		$data = $this->db->update_string('notifikasi',$user,$where);
		$this->db->query($data);
	}

	public function insertMention($user,$mentionUser,$isi,$url){
		$this->load->model("model_user");
		$temp = $this->model_user->cek($mentionUser);
		$nama = $this->model_user->NAME($user)->NAMA_USER;
		if($temp){
			foreach($temp as $t){
				$kode = $this->generateKode();
				$kodeUser = $t->KODE_USER;
				$array = array(
					'KODE_NOTIFIKASI'=>$kode,
					'KODE_USER' => $kodeUser,
					'ISI' => $nama . " mentioned you in a comment '" . $isi . "'",
					'URL' => $url,
					'STATUS' => '1'
				);
				$this->db->insert('notifikasi',$array);
			}
		}
	}

}
