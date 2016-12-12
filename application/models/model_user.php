<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function master_login($username,$password){
		$data = $this->db->query("SELECT * FROM user where EMAIL_USER='$username' and PASSWORD='$password' AND STATUS='1'");
		if($data->num_rows() > 0){
			$this->db->where('EMAIL_USER',$username);
			$this->db->update('user',array('TANGGAL_LOGIN_USER'=>date("y-m-d")));
		}
		return $data->result();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM user where KODE_USER='$kode' AND STATUS='1'");
		return $data->result();
	}

	public function FILTER($filter,$cari,$sort,$urutan){
		if($sort == '-') $sort = "NAMA_USER";
		if($filter == '-') $filter = "NAMA_USER";
		$data = $this->db->query("SELECT * FROM USER WHERE $filter LIKE('%$cari%') ORDER BY $sort $urutan");
		return $data->result();
	}

	public function SELECT($var){
		$this->load->library('session');
		$active = $this->session->userdata('active');
		$data = $this->db->query("SELECT * FROM " . $var . " WHERE NAMA_USER != '$active' AND STATUS='1'");
		return $data->result();
	}

	public function buatCombobox(){
		$data = $this->SELECT('user');
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_USER] = $d->KODE_USER . ' - ' . $d->NAMA_USER;
		}
		return $arrItem;
	}

	public function buatComboboxJU(){
		$data = $this->db->get("jenis_user")->result();
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_JENISUSER] = $d->NAMA_JENISUSER;
		}
		return $arrItem;
	}

	public function generateKode(){
		$count = $this->db->count_all('user') + 1;
		return 'US' . str_pad($count, 3, "0", STR_PAD_LEFT);
	}

	public function count(){
		return $this->db->count_all('user');
	}

	public function INSERT($kodeJU,$nama,$alamat,$telp,$tgl,$pos,$email,$pass,$report,$ket){
		$kode = $this->generateKode();
		$user = array(
			'KODE_USER' => $kode,
			'KODE_JENISUSER' => $kodeJU,
			'NAMA_USER' => $nama,
			'ALAMAT_USER' => $alamat,
			'NOR_TELEPON_USER' => $telp,
			'TANGGAL_LAHIR_USER' => $tgl,
			'TANGGAL_REGISTER_USER' => date("y-m-d"),
			'KODE_POS_USER' => $pos,
			'EMAIL_USER' => $email,
			'PASSWORD' => md5($pass),
			'JUMLAH_REPORT_USER' => $report,
			'KETERANGAN_USER' => $ket,
			'STATUS' => '1'
		);
		$this->db->insert('user', $user);
  	return $this->db->insert_id();
	}

	public function DELETE($kode){
		$this->db->where('KODE_USER',$kode);
		$this->db->update('user',array('status'=>'0'));
	}

	public function UPDATE($kode,$kodeJU,$nama,$alamat,$telp,$tgl,$pos,$email,$pass,$report,$ket){
		$where = 'KODE_USER="' . $kode .'"';
		$user = array(
			'KODE_JENISUSER' => $kodeJU,
			'NAMA_USER' => $nama,
			'ALAMAT_USER' => $alamat,
			'NOR_TELEPON_USER' => $telp,
			'TANGGAL_LAHIR_USER' => $tgl,
			'KODE_POS_USER' => $pos,
			'EMAIL_USER' => $email,
			'PASSWORD' => $pass,
			'JUMLAH_REPORT_USER' => $report,
			'KETERANGAN_USER' => $ket,
		);
		$data = $this->db->update_string('user',$user,$where);
		$this->db->query($data);
	}

	public function SELECT_KARTU($kode){
		$query = $this->db->query("SELECT KODE_USER,NAMA_KARTU_KREDIT FROM kartu_kredit_user,kartu_kredit where kartu_kredit_user.KODE_USER = '$kode' AND kartu_kredit.STATUS='1' AND kartu_kredit_user.STATUS='1'")->result();
		$arrItem = [];
		foreach($query as $d){
			$arrItem[$d->KODE_USER] = $d->NAMA_KARTU_KREDIT;
		}
		return $arrItem;
	}

	public function SELECT_USER_REPORTING($kode){
		$this->db->where(['KODE_USER_REPORTING'=>$kode,'STATUS'=>'1']);
		$query = $this->db->get('report_user')->result();
		$arrItem = [];
		foreach($query as $d){
			$arrItem[$d->KODE_REPORT_USER]['KODE_USER_REPORTING'] = $d->KODE_USER_REPORTING;
			$arrItem[$d->KODE_REPORT_USER]['KODE_USER_REPORTED'] = $d->KODE_USER_REPORTED;
			$arrItem[$d->KODE_REPORT_USER]['ALASAN'] = $d->ALASAN;
			$arrItem[$d->KODE_REPORT_USER]['KETERANGAN'] = $d->KETERANGAN;
		}
		return $arrItem;
	}

	public function SELECT_USER_REPORTED($kode){
		$this->db->where(['KODE_USER_REPORTED'=>$kode,'STATUS'=>'1']);
		$query = $this->db->get('report_user')->result();
		$arrItem = [];
		foreach($query as $d){
			$arrItem[$d->KODE_REPORT_USER]['KODE_USER_REPORTING'] = $d->KODE_USER_REPORTING;
			$arrItem[$d->KODE_REPORT_USER]['KODE_USER_REPORTED'] = $d->KODE_USER_REPORTED;
			$arrItem[$d->KODE_REPORT_USER]['ALASAN'] = $d->ALASAN;
			$arrItem[$d->KODE_REPORT_USER]['KETERANGAN'] = $d->KETERANGAN;
		}
		return $arrItem;
	}

	public function SELECT_REVIEW_RESTORAN($kode){
		$this->db->where(['KODE_USER'=>$kode,'STATUS'=>'1']);
		$query = $this->db->get('review_restoran')->result();
		$arrItem = [];
		foreach($query as $d){
			$arrItem[$d->KODE_REVIEW_RESTORAN]['KODE_RESTORAN'] = $d->KODE_RESTORAN;
			$arrItem[$d->KODE_REVIEW_RESTORAN]['KODE_USER'] = $d->KODE_USER;
			$arrItem[$d->KODE_REVIEW_RESTORAN]['DESKRIPSI_REVIEW_RESTORAN'] = $d->DESKRIPSI_REVIEW_RESTORAN;
			$arrItem[$d->KODE_REVIEW_RESTORAN]['TANGGAL_REVIEW_RESTORAN'] = $d->TANGGAL_REVIEW_RESTORAN;
			$arrItem[$d->KODE_REVIEW_RESTORAN]['JUMLAH_LIKE_REVIEW_RESTORAN'] = $d->JUMLAH_LIKE_REVIEW_RESTORAN;
			$arrItem[$d->KODE_REVIEW_RESTORAN]['KETERANGAN_REVIEW_RESTORAN'] = $d->KETERANGAN_REVIEW_RESTORAN;
		}
		return $arrItem;
	}

	public function SELECT_REVIEW_MENU($kode){
		$this->db->where(['KODE_USER'=>$kode,'STATUS'=>'1']);
		$query = $this->db->get('review_menu')->result();
		$arrItem = [];
		foreach($query as $d){
			$arrItem[$d->KODE_REVIEW]['KODE_USER'] = $d->KODE_USER;
			$arrItem[$d->KODE_REVIEW]['KODE_MENU'] = $d->KODE_MENU;
			$arrItem[$d->KODE_REVIEW]['DESKRIPSI_REVIEW'] = $d->DESKRIPSI_REVIEW;
			$arrItem[$d->KODE_REVIEW]['TANGGAL_REVIEW'] = $d->TANGGAL_REVIEW;
			$arrItem[$d->KODE_REVIEW]['JUMLAH_LIKE_REVIEW'] = $d->JUMLAH_LIKE_REVIEW;
			$arrItem[$d->KODE_REVIEW]['KETERANGAN_REVIEW'] = $d->KETERANGAN_REVIEW;
		}
		return $arrItem;
	}

	public function delete_review($kode){
		$this->db->where("KODE_REVIEW",$kode);
		$this->db->update('review_menu',array("STATUS"=>'0'));
	}

	public function delete_review_restoran($kode){
		$this->db->where("KODE_REVIEW_RESTORAN",$kode);
		$this->db->update('review_restoran',array("STATUS"=>'0'));
	}
	public function last_register(){
		$hariIni = date("Y-m-d",strtotime(date("Y-m-d")));
		$date = date("Y-m-d",strtotime(date("Y-m-d")  . ' -4 day'));
		$data = $this->db->query("SELECT TANGGAL_REGISTER_USER, IFNULL(count( * ),0) as 'jumlah' FROM `user` WHERE TANGGAL_REGISTER_USER BETWEEN '$date' AND '$hariIni' GROUP BY TANGGAL_REGISTER_USER");
		$data2 = $data->result();
		$hasil  = [];

		$start_day = (int)date("d",strtotime($date));
		$stop_day = (int)date("d",strtotime($hariIni));
		for($i = $start_day; $i < $stop_day; $i++){
			$tempDate = date("Y-m-d",strtotime($date  . ' +' . $i .' day'));
			$hasil[$tempDate] = 0;
		}
		foreach($data2 as $d){
			$hasil[$d->TANGGAL_REGISTER_USER] = $d->jumlah;
		}
		return $hasil;
	}

	public function last_login(){
		$hariIni = date("Y-m-d");
		$date = date("Y-m-d",strtotime(date("Y-m-d")  . ' -4 day'));
		//$dates = date("Y-m-d",$date);
		$data = $this->db->query("SELECT TANGGAL_LOGIN_USER, IFNULL(count( * ),0) as 'jumlah' FROM `user` WHERE TANGGAL_LOGIN_USER >= '$date' AND TANGGAL_LOGIN_USER <= '$hariIni' GROUP BY TANGGAL_LOGIN_USER");
		$data2 = $data->result();
		$hasil  = [];


		return $hasil;
	}
}
