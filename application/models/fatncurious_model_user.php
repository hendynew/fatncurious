<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fatncurious_model_user extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function master_login($username,$password){
		$data = $this->db->query("SELECT * FROM user where EMAIL_USER='$username' and PASSWORD='$password' AND STATUS='1' AND KODE_JENISUSER='JU001'");
		return $data->result();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM user where KODE_USER='$kode'");
		return $data->row();
	}

	public function selectUserByEmail($kode){
		$data = $this->db->query("SELECT KODE_USER,NAMA_USER,URL_FOTO,KODE_JENISUSER FROM user where EMAIL_USER='$kode' AND KODE_JENISUSER!='JU001'");
		return $data->row();
	}
	public function selectJenisUserByKode($kode){
		$data = $this->db->query("SELECT KODE_JENISUSER FROM user where KODE_USER='$kode'");
		return $data->row();
	}

	public function sudahPernahReport($userReporting,$userReported){
		$data = $this->db->query("SELECT count(*) as 'jumlah', STATUS FROM report_user where KODE_USER_REPORTING='$userReporting' and KODE_USER_REPORTED='$userReported'");
		if($data->row()->jumlah!=0){
			return $data->row()->STATUS;
		}
		else{
			return -1;
		}
	}

	public function generateKodeReport(){
		$count = $this->db->count_all('report_user') + 1;
		return 'TU' . str_pad($count, 3, "0", STR_PAD_LEFT);
	}

	public function jumlahReport($userReported){
		$data = $this->db->query("SELECT JUMLAH_REPORT_USER as 'jumlah' FROM user where KODE_USER='$userReported'");
		return $data->row();
	}

	public function reportUser($userReporting,$userReported){
		$kode = $this->generateKodeReport();
		$report = array(
			'KODE_REPORT_USER' => $kode,
			'KODE_USER_REPORTING' => $userReporting,
			'KODE_USER_REPORTED' => $userReported,
			'ALASAN' => '',
			'KETERANGAN' => '',
			'STATUS' => '1'
		);
		$this->db->insert('report_user', $report);

		$jumlahSekarang = $this->jumlahReport($userReported);
		$this->db->where('KODE_USER',$userReported);
		$this->db->update('user',array('JUMLAH_REPORT_USER'=>($jumlahSekarang->jumlah+1)));
	}


	public function updateReport($userReporting,$userReported,$status){
		$statusAngka = 999;
		if($status==1){
			$statusAngka=0;
			$jumlahSekarang = $this->jumlahReport($userReported);
			$this->db->where('KODE_USER',$userReported);
			$this->db->update('user',array('JUMLAH_REPORT_USER'=>($jumlahSekarang->jumlah-1)));
		}
		else if($status==0){
			$statusAngka=1;
			$jumlahSekarang = $this->jumlahReport($userReported);
			$this->db->where('KODE_USER',$userReported);
			$this->db->update('user',array('JUMLAH_REPORT_USER'=>($jumlahSekarang->jumlah+1)));
		}
		$this->db->where('KODE_USER_REPORTING',$userReporting);
		$this->db->where('KODE_USER_REPORTED',$userReported);
		$this->db->update('report_user',array('STATUS'=>$statusAngka));

	}


	public function SELECT($var)
	{
		$data = $this->db->query("SELECT * FROM " . $var . " WHERE STATUS='1'");
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
		$data = $this->SELECT('jenis_user');
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

	public function INSERT($kodeJU,$nama,$alamat,$telp,$tgl,$pos,$email,$pass,$report,$ket){
		$kode = $this->generateKode();
		$user = array(
			'KODE_USER' => $kode,
			'KODE_JENISUSER' => $kodeJU,
			'NAMA_USER' => $nama,
			'ALAMAT_USER' => $alamat,
			'NOR_TELEPON_USER' => $telp,
			'TANGGAL_LAHIR_USER' => $tgl,
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
		return $this->db->affected_rows();
	}

	public function UPDATE_FOTO($kode,$url){
		$this->db->where('KODE_USER',$kode);
		$this->db->update('user',array('URL_FOTO'=>$url));
	}


}
