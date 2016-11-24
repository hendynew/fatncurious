<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fatncurious_model_registerLogin extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function searchEmail($kode){
		$data = $this->db->query("SELECT * FROM user where EMAIL_USER='$kode'");
		return $data->row();
	}

	public function select($var)
	{
		$data = $this->db->query("SELECT * FROM " . $var);
		return $data->result();
	}


	public function generateKode(){
		$count = $this->db->count_all('user') + 1;
		return 'US' . str_pad($count, 3, "0", STR_PAD_LEFT);
	}

	public function insert($kodeJU,$nama,$alamat,$telp,$tgl,$email,$password,$report,$ket){
		$kode = $this->generateKode();
		$user = array(
			'KODE_USER' => $kode,
			'KODE_JENISUSER' => $kodeJU,
			'NAMA_USER' => $nama,
			'ALAMAT_USER' => $alamat,
			'NOR_TELEPON_USER' => $telp,
			'TANGGAL_LAHIR_USER' =>$tgl,
			'EMAIL_USER' => $email,
			'PASSWORD' => $password,
			'JUMLAH_REPORT_USER' => $report,
			'KETERANGAN_USER' => $ket,
			'STATUS' => 1,
		);
		$this->db->insert('user', $user);
		return $this->db->insert_id();
	}


}
