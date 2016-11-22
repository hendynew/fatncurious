<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_restaurant extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM restoran where KODE_RESTORAN='$kode' AND STATUS='1'");
		return $data->result();
	}

	public function FILTER($filter,$cari,$sort,$urutan){
		if($sort == '-') $sort = "NAMA_RESTORAN";
		if($filter == '-') $filter = "NAMA_RESTORAN";
		$data = $this->db->query("SELECT * FROM RESTORAN WHERE $filter LIKE('%$cari%') ORDER BY $sort $urutan");
		return $data->result();
	}

	public function SELECT()
	{
		//$data = $this->db->query("SELECT * FROM " . $var . " where STATUS='1'");
		$data = $this->db->query("SELECT u.KODE_USER as KODE_USER, u.NAMA_USER as NAMA_USER, r.KODE_RESTORAN as KODE_RESTORAN, r.NAMA_RESTORAN as NAMA_RESTORAN, r.ALAMAT_RESTORAN as ALAMAT, r.NO_TELEPON_RESTORAN as TELEPON, r.JAM_BUKA_RESTORAN as JAM_BUKA, r.HARI_BUKA_RESTORAN as HARI_BUKA, r.DESKRIPSI_RESTORAN as DESKRIPSI, r.JUMLAH_PERINGATAN_RESTORAN as JUMLAH_PERINGATAN_RESTORAN,r.URL_FOTO_RESTORAN as URL_FOTO, r.KETERANGAN_RESTORAN as KETERANGAN from user u, restoran r where r.STATUS='1' GROUP BY r.KODE_RESTORAN");
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

	public function count(){
		return $this->db->count_all('restoran');
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

	public function SELECT_ALL_REVIEW_RESTORAN(){
		$temp = $this->db->query("SELECT rr.KODE_REVIEW_RESTORAN as KODE_REVIEW_RESTORAN,r.NAMA_RESTORAN as NAMA_RESTORAN, r.KODE_RESTORAN as KODE_RESTORAN, u.KODE_USER as KODE_USER,u.NAMA_USER as NAMA_USER, rr.DESKRIPSI_REVIEW_RESTORAN AS DESKRIPSI, rr.TANGGAL_REVIEW_RESTORAN as TANGGAL, rr.JUMLAH_LIKE_REVIEW_RESTORAN as JUMLAH_LIKE, rr.KETERANGAN_REVIEW_RESTORAN as KETERANGAN from user as u, restoran as r, review_restoran as rr where rr.KODE_RESTORAN=r.KODE_RESTORAN AND rr.KODE_USER=u.KODE_USER AND rr.STATUS='1' ")->result();
		return $temp;
	}

	public function updateStatusRestoran($kodeResto, $status){
		$statusAngka = 999;
		if($status=='Tutup'){
			$statusAngka=0;
		}
		else if($status=='Buka'){
			$statusAngka=1;
		}
		$this->db->where('KODE_RESTORAN',$kodeResto);
		$this->db->update('restoran',array('STATUS_RESTORAN'=>$statusAngka));
	}

	public function updateRestoran($kode,$nama,$alamat,$telp,$jam,$hari,$deskripsi){
		$where = 'KODE_RESTORAN="' . $kode .'"';
		$restoran = array(
			'NAMA_RESTORAN' => $nama,
			'ALAMAT_RESTORAN' => $alamat,
			'NO_TELEPON_RESTORAN' => $telp,
			'JAM_BUKA_RESTORAN' => $jam,
			'HARI_BUKA_RESTORAN' => $hari,
			'DESKRIPSI_RESTORAN' => $deskripsi,
		);
		$data = $this->db->update_string('restoran',$restoran,$where);
		$this->db->query($data);
	}


	public function AUTO_MODERATE_REVIEW(){
			$array_string = "fuck,FUCK,bitch,BITCH,ass,ASS,asshole,ASSHOLE";
			$array_like = explode(',', $array_string);

			$like_statements = array();

			foreach($array_like as $value) {
			    $like_statements[] = "DESKRIPSI_REVIEW_RESTORAN LIKE '%" . $value . "%'";
			}
			$like_string = "(" . implode(' OR ', $like_statements) . ")";

			$where = ["user.KODE_USER" => 'review_restoran.KODE_USER'];
			$hasil = $this->db->from(array('user','review_restoran'))->where($like_string . "AND user.KODE_USER = review_restoran.KODE_USER")->get()->result();
			foreach($hasil as $h){
				$temp = $h->KODE_USER;
				$tes = $this->db->query("UPDATE USER SET JUMLAH_REPORT_USER = JUMLAH_REPORT_USER + 1 WHERE KODE_USER='$temp'");
			}
			$this->db->where($like_string);
			$this->db->update('review_restoran',array('STATUS'=>'0'));
	}

	public function delete_review($kode){
		$this->db->where('KODE_REVIEW_RESTORAN',$kode);
		$this->db->update('review_restoran',array('STATUS'=>'0'));
	}

	public function SELECT_PROMO($kode){
		$hasil = $this->db->query("SELECT promo.KODE_PROMO as 'KODE_PROMO',kartu_kredit.NAMA_KARTU_KREDIT as 'NAMA_KARTU',kartu_kredit.KODE_KARTU_KREDIT as 'KODE_KARTU', promo.NAMA_PROMO as 'NAMA_PROMO', promo.DESKRIPSI_PROMO as 'DESKRIPSI_PROMO', promo.MASABERLAKU_PROMO as 'MASABERLAKU_PROMO', promo.FOTO_PROMO as 'FOTO_PROMO', promo.PERSENTASE_PROMO as 'PERSENTASE_PROMO', promo.KETERANGAN_PROMO as 'KETERANGAN_PROMO' from promo, promo_restoran, restoran, kartu_kredit,sponsor_promo where promo_restoran.status='1' AND promo_restoran.KODE_RESTORAN='$kode' AND promo_restoran.KODE_PROMO=promo.KODE_PROMO AND promo.KODE_PROMO=sponsor_promo.KODE_PROMO AND sponsor_promo.KODE_KARTU_KREDIT=kartu_kredit.KODE_KARTU_KREDIT GROUP BY promo_restoran.KODE_PROMO")->result();
		return $hasil;
	}

	public function SELECT_MENU($kode){
		$hasil = $this->db->query("SELECT menu.KODE_MENU as 'KODE_MENU', jenis_menu.NAMA_JENISMENU as 'JENIS_MENU', menu.NAMA_MENU as 'NAMA_MENU', menu.DESKRIPSI_MENU as 'DESKRIPSI_MENU', menu.HARGA_MENU as 'HARGA_MENU', menu.KETERANGAN_MENU as 'KETERANGAN_MENU' from menu,review_menu, jenis_menu where menu.KODE_RESTORAN='$kode'  AND menu.STATUS='1' AND jenis_menu.KODE_JENISMENU=menu.KODE_JENIS_MENU")->result();
		return $hasil;
	}

	public function SELECT_REPORT($kode){
		$hasil = $this->db->query("SELECT report_restoran.KODE_REPORT_RESTORAN as 'KODE',report_restoran.TANGGAL_REPORT as 'TANGGAL', report_restoran.WAKTU_REPORT as 'WAKTU', user.NAMA_USER as 'NAMA', user.URL_FOTO as 'URL_FOTO', report_restoran.KODE_USER as 'KODE_USER', report_restoran.ALASAN as 'ALASAN', report_restoran.KETERANGAN as 'KETERANGAN' from report_restoran,user where report_restoran.KODE_RESTORAN='$kode' AND report_restoran.STATUS='1' and user.KODE_USER=report_restoran.KODE_USER")->result();
		return $hasil;
	}

	public function COUNT_REPORT($kode){
		$arr = ["KODE_RESTORAN"=>$kode,"STATUS"=>'1'];
		$this->db->where($arr);
		return $count = $this->db->count_all_results('report_restoran');
	}

	public function SELECT_REVIEW($kode){
		$hasil = $this->db->query("SELECT user.KODE_USER as 'KODE_USER',user.URL_FOTO as 'URL_FOTO', user.NAMA_USER as 'NAMA',rr.KODE_RESTORAN as KODE_RESTORAN,rr.JUDUL as 'JUDUL', rr.DESKRIPSI as 'DESKRIPSI', rr.JUMLAH_RATING as 'RATING', rr.TANGGAL as 'TANGGAL', rr.JUMLAH_LIKE as 'LIKE' from rating_restoran as rr,user where rr.KODE_RESTORAN='$kode' AND rr.STATUS='1' and user.KODE_USER=rr.KODE_USER")->result();
		return $hasil;
	}

	public function SELECT_RATING($kode){
		$hasil = $this->db->query("SELECT user.KODE_USER as 'KODE_USER', user.NAMA_USER as 'NAMA', rating.JUMLAH_RATING as 'RATING' from rating_restoran as rating,user where rating.KODE_RESTORAN='$kode' AND rating.STATUS='1' and user.KODE_USER=rating.KODE_USER")->result();
		return $hasil;
	}

	public function COUNT_RATING($kode){
		$hasil = $this->db->query("SELECT rating.JUMLAH_RATING as 'RATING' from rating_restoran as rating,user where rating.KODE_RESTORAN='$kode' AND rating.STATUS='1'")->result();
		$total = 0;
		$jumlah = 0;
		foreach($hasil as $h){
			$total += $h->RATING;
			$jumlah++;
		}
		if($jumlah > 0){
			$total_rating = $total/$jumlah;
		}else{
			$total_rating = $total;
		}


		return floor($total_rating);
	}

	public function COUNT_ALL_RATING(){
		$hasil = $this->db->query("SELECT rating.KODE_RESTORAN as KODE,rating.JUMLAH_RATING as 'RATING' from rating_restoran as rating where rating.STATUS='1'")->result();
		$data = [];
		foreach($hasil as $h){
			if(!isset($data[$h->KODE])){
				$data[$h->KODE] = 0;
			}
			$jumlahnya = $data[$h->KODE] + $h->RATING;
			$data[$h->KODE] = $jumlahnya;
		}
		foreach($data as $key=>$val){
			$this->db->where('KODE_RESTORAN',$key);
			$jumlah = $this->db->count_all_results("rating_restoran");
			$data[$key] = floor($val/$jumlah);
		}
		return $data;
	}


	public function RATE($rate,$user,$resto,$comment,$judul){
		$tanggal = date("Y-m-d");
		$where = [
			"KODE_USER"=>$user,
			"KODE_RESTORAN"=>$resto,
			"STATUS"=>'1'
		];
		$this->db->where($where);
		if($this->db->get('rating_restoran')->result()){
			$arr = [
				"KODE_USER"=>$user,
				"KODE_RESTORAN"=>$resto,
				"STATUS"=>'1'
			];
			$this->db->where($arr);
			$this->db->update('rating_restoran',["JUMLAH_RATING"=>$rate,"JUDUL"=>$judul,"DESKRIPSI"=>$comment,"TANGGAL"=>$tanggal]);
		}else{
			$arr = [
				"KODE_USER"=>$user,
				"KODE_RESTORAN"=>$resto,
				"JUMLAH_RATING"=>$rate,
				"TANGGAL"=>$tanggal,
				"JUDUL"=>$judul,
				"DESKRIPSI"=>$comment,
				"JUMLAH_LIKE"=>0,
				"STATUS"=>'1'
			];
			$this->db->insert('rating_restoran',$arr);
		}
	}
}
