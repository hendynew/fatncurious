<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function SEARCH($kode){
		$data = $this->db->query("SELECT * FROM menu where KODE_MENU='$kode' and STATUS='1'");
		return $data->result();
	}

	public function FILTER($filter,$cari,$sort,$urutan){
		if($sort == '-') $sort = "NAMA_MENU";
		if($filter == '-') $filter = "NAMA_MENU";
		$data = $this->db->query("SELECT * FROM MENU WHERE $filter LIKE('%$cari%') ORDER BY $sort $urutan");
		return $data->result();
	}

	public function SELECT()
	{
		$data = $this->db->query("SELECT m.KODE_MENU as KODE_MENU,m.NAMA_MENU as NAMA_MENU, m.KODE_JENIS_MENU as KODE_JENIS,jm.NAMA_JENISMENU as NAMA_JENIS, r.KODE_RESTORAN as KODE_RESTORAN, r.NAMA_RESTORAN as NAMA_RESTORAN, r.KODE_USER as KODE_USER, m.DESKRIPSI_MENU as DESKRIPSI, m.HARGA_MENU as HARGA, m.KETERANGAN_MENU as KETERANGAN from restoran as r, menu as m, jenis_menu as jm where m.STATUS='1' AND m.KODE_RESTORAN=r.KODE_RESTORAN AND m.KODE_JENIS_MENU=jm.KODE_JENISMENU");
		return $data->result();
	}

	public function selectJenisMenu(){
		$hasil = $this->db->get("jenis_menu")->result();
		$hasil2 = [];
		foreach($hasil as $h){
			$hasil2[$h->KODE_JENISMENU] = $h->NAMA_JENISMENU;
		}
		return $hasil2;
	}

	public function buatCombobox(){
		$data = $this->SELECT();
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_MENU] = $d->KODE_MENU . ' - ' . $d->NAMA_MENU;
		}
		return $arrItem;
	}

	public function buatComboboxJM(){
		$data = $this->SELECT();
		$arrItem = [];
		foreach($data as $d){
			$arrItem[$d->KODE_JENIS] = $d->NAMA_JENIS;
		}
		return $arrItem;
	}

	public function buatComboboxJR(){
		$data = $this->select();
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

	public function count(){
		return $this->db->count_all('menu');
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

	public function SELECT_ALL_REVIEW_MENU(){
		//$temp = $this->db->where('STATUS','1')->get('review_menu')->result();
		$temp = $this->db->query("SELECT rm.KODE_REVIEW as KODE_REVIEW, m.KODE_MENU as KODE_MENU, m.NAMA_MENU as NAMA_MENU, u.KODE_USER as KODE_USER, u.NAMA_USER as NAMA_USER, rm.DESKRIPSI_REVIEW as DESKRIPSI, rm.TANGGAL_REVIEW as TANGGAL, rm.JUMLAH_LIKE_REVIEW as JUMLAH_LIKE, rm.KETERANGAN_REVIEW as KETERANGAN from restoran as r, user as u, review_menu as rm, menu as m where rm.STATUS='1' and rm.KODE_MENU=m.KODE_MENU AND rm.KODE_USER=u.KODE_USER GROUP BY rm.KODE_REVIEW")->result();
		return $temp;
	}

	public function AUTO_MODERATE_REVIEW(){
			$array_string = "fuck,FUCK,bitch,BITCH,ass,ASS,asshole,ASSHOLE";
			$array_like = explode(',', $array_string);

			$like_statements = array();

			foreach($array_like as $value) {
			    $like_statements[] = "DESKRIPSI_REVIEW LIKE '%" . $value . "%'";
			}
			$like_string = "(" . implode(' OR ', $like_statements) . ")";

			$hasil = $this->db->from(array('user','review_menu'))->where($like_string . "AND user.KODE_USER = review_menu.KODE_USER")->get()->result();
			foreach($hasil as $h){
				$temp = $h->KODE_USER;
				$tes = $this->db->query("UPDATE USER SET JUMLAH_REPORT_USER = JUMLAH_REPORT_USER + 1 WHERE KODE_USER='$temp'");
			}
			$this->db->where($like_string);
			$this->db->update('review_menu',array('STATUS'=>'0'));
	}

	public function delete_review($kode){
		$this->db->where('KODE_REVIEW',$kode);
		$this->db->update('review_menu',array('STATUS'=>'0'));
	}

	public function SELECT_PROMO($kode){
		return $this->db->query("SELECT p.NAMA_PROMO as NAMA, p.KODE_PROMO as KODE, p.PERSENTASE_PROMO as persen from promo as p, menu as m, tipe_promo as tp,jenis_menu as jm where m.KODE_MENU='$kode' AND m.KODE_JENIS_MENU=jm.KODE_JENISMENU AND jm.KODE_JENISMENU = tp.KODE_JENISMENU AND tp.KODE_PROMO=p.KODE_PROMO and tp.STATUS='1'")->result();
	}

	public function update_review($kode,$review){
		$this->db->where('KODE_REVIEW',$kode);
		$this->db->update('review_menu',array('DESKRIPSI_REVIEW'=>$review));
	}

	public function SELECT_RATING($kode){
		return $this->db->query("SELECT u.KODE_USER as KODE, u.NAMA_USER as NAMA, rm.JUMLAH_RATING as RATING from rating_menu as rm, user as u WHERE rm.KODE_MENU='$kode' and rm.KODE_USER=u.KODE_USER and rm.STATUS='1'")->result();
	}

	public function SELECT_REPORT($kode){
		return $this->db->query("SELECT u.KODE_USER as KODE, u.NAMA_USER as NAMA, rm.TANGGAL_REPORT as TANGGAL,rm.WAKTU_REPORT as WAKTU, rm.ALASAN as ALASAN, rm.KETERANGAN as KETERANGAN from report_menu as rm, user as u WHERE rm.KODE_MENU='$kode' and rm.KODE_USER=u.KODE_USER and rm.STATUS='1'")->result();
	}

	public function SELECT_REVIEW($kode){
		return $this->db->query("SELECT rm.KODE_REVIEW as KODE_REVIEW,u.URL_FOTO as URL_FOTO, u.KODE_USER as KODE, u.NAMA_USER as NAMA, rm.TANGGAL_REVIEW as TANGGAL, rm.DESKRIPSI_REVIEW as DESKRIPSI_REVIEW, rm.KETERANGAN_REVIEW as KETERANGAN from review_menu as rm, user as u WHERE rm.KODE_MENU='$kode' and rm.KODE_USER=u.KODE_USER and rm.STATUS='1'")->result();
	}

	public function SELECT_ALL_REVIEW(){
		$hasil = $this->db->query('SELECT u.KODE_USER as KODE_USER, u.NAMA_USER as NAMA_USER,u.URL_FOTO as URL_FOTO,rm.KODE_REVIEW as KODE_REVIEW, rm.KODE_MENU as KODE_MENU,u.KODE_USER as KODE_USER, rm.DESKRIPSI_REVIEW as DESKRIPSI, rm.TANGGAL_REVIEW as TANGGAL, rm.JUMLAH_LIKE_REVIEW as "LIKE", rm.KETERANGAN_REVIEW as KETERANGAN from review_menu as rm, user as u where u.KODE_USER=rm.KODE_USER and rm.STATUS="1"')->result();
		$hasil2 = [];
		foreach($hasil as $h){
			$hasil2[$h->KODE_REVIEW]['KODE_MENU'] = $h->KODE_MENU;
			$hasil2[$h->KODE_REVIEW]['KODE_USER'] = $h->KODE_USER;
			$hasil2[$h->KODE_REVIEW]['NAMA_USER'] = $h->NAMA_USER;
			$hasil2[$h->KODE_REVIEW]['DESKRIPSI'] = $h->DESKRIPSI;
			$hasil2[$h->KODE_REVIEW]['TANGGAL'] = $h->TANGGAL;
			$hasil2[$h->KODE_REVIEW]['LIKE'] = $h->LIKE;
			$hasil2[$h->KODE_REVIEW]['URL_FOTO'] = $h->URL_FOTO;
			$hasil2[$h->KODE_REVIEW]['KETERANGAN'] = $h->KETERANGAN;
		}
		return $hasil2;
	}

	public function generateKodeReview(){
		$count = $this->db->count_all('review_menu') + 1;
		return 'RE' . str_pad($count, 3, "0", STR_PAD_LEFT);
	}

	public function REVIEW($user,$menu,$review){
		$tanggal = date("Y/m/d");
		$kode = $this->generateKodeReview();
		$arr = [
			"KODE_REVIEW" => $kode,
			"KODE_USER" => $user,
			"KODE_MENU" => $menu,
			"DESKRIPSI_REVIEW" => $review,
			"TANGGAL_REVIEW" => $tanggal,
			"JUMLAH_LIKE_REVIEW" => 0,
			"KETERANGAN_REVIEW" => '',
			'STATUS' => '1'
		];
		$this->db->insert('review_menu',$arr);
	}

	public function SELECT_LIKE($kode){
		$hasil = $this->db->query("SELECT rating.JUMLAH_RATING as 'RATING' from rating_menu as rating,user where rating.KODE_MENU='$kode' AND rating.STATUS='1' GROUP BY KODE_MENU")->result();
		return $hasil;
	}
	public function COUNT_ALL_LIKE(){
		$hasil = $this->db->query("SELECT rating.KODE_MENU as KODE,rating.JUMLAH_RATING as 'RATING' from rating_menu as rating where rating.STATUS='1' GROUP BY KODE_MENU")->result();
		$data = [];
		foreach($hasil as $h){
			$data[$h->KODE] = $h->RATING;
		}
		return $data;
	}

public function generate_kode_upload(){
	$count = $this->db->count_all('upload_foto_menu') + 1;
	return 'UF' . str_pad($count, 3, "0", STR_PAD_LEFT);
}

public function count_foto_menu($menu){
	$this->db->where('KODE_MENU',$menu);
	return $this->db->count_all_results('upload_foto_menu') + 1;
}

public function upload($kodeMenu,$kodeUser,$url){
	$kodeUpload = $this->generate_kode_upload();
	$arr = ['KODE_UPLOAD'=>$kodeUpload, "KODE_USER"=>$kodeUser, "KODE_MENU"=>$kodeMenu,'URL_UPLOAD'=>$url,'STATUS'=>'1'];
	$this->db->insert('upload_foto_menu',$arr);

}

public function count_like($kodeReview,$state){
	//STATE MENUNJUKKAN 1 => LIKE, -1 => DISLIKE
	$this->db->where(array('KODE_REVIEW'=>$kodeReview,'STATUS'=>$state));
	$like = $this->db->count_all_results('like_review_user');
	return $like;
}

public function count_all_like_review(){
	$this->db->where('STATUS!=',0);
	$hasil = $this->db->get('like_review_user')->result();
	$hasil2 = [];
	foreach($hasil as $h){
		if(!isset($hasil2[$h->KODE_REVIEW]['LIKE'])){
			$hasil2[$h->KODE_REVIEW]['LIKE'] = 0;
		}
		if(!isset($hasil2[$h->KODE_REVIEW]['DISLIKE'])){
			$hasil2[$h->KODE_REVIEW]['DISLIKE'] = 0;
		}
		if($h->STATUS == 1){
			$hasil2[$h->KODE_REVIEW]['LIKE']++;
		}
		else {
			$hasil2[$h->KODE_REVIEW]['DISLIKE']++;
		}
	}
	return $hasil2;
}

public function like_review($kodeReview,$kodeUser,$state){
	$array = [
			'KODE_REVIEW' => $kodeReview,
			'KODE_USER' => $kodeUser,
	];
	$this->db->where($array);
	if($this->db->get('like_review_user')->result()){
		$arr = ['KODE_REVIEW'=>$kodeReview,'KODE_USER'=>$kodeUser];
		$this->db->where($arr);
		$this->db->update('like_review_user',['STATUS'=>$state]);
	}else{
		$arr = ['KODE_REVIEW'=>$kodeReview,'KODE_USER'=>$kodeUser,'STATUS'=>$state];
		$this->db->insert('like_review_user',$arr);
	}
}

public function select_like_review($kodeUser,$kodeRestoran){
	//$this->db->where('KODE_USER',$kodeUser);
	//$hasil = $this->db->get("like_review_user")->result();
	$hasil = $this->db->query("SELECT lru.KODE_REVIEW as KODE_REVIEW, lru.STATUS as STATUS FROM like_review_user AS lru,restoran as r,review_menu as rm, menu as m where lru.KODE_REVIEW = rm.KODE_REVIEW AND rm.KODE_MENU = m.KODE_MENU AND m.KODE_RESTORAN = r.KODE_RESTORAN AND r.KODE_RESTORAN='$kodeRestoran' AND r.STATUS='1' and lru.STATUS!='0' and m.STATUS='1' and lru.KODE_USER='$kodeUser'")->result();
	$hasil2 = [];
	foreach ($hasil as $h) {
		$hasil2[$h->KODE_REVIEW] = $h->STATUS;
	}
	return $hasil2;
}

public function select_report_review($kodeUser,$kodeRestoran){
	$hasil = $this->db->query("SELECT lru.KODE_REVIEW as KODE_REVIEW, lru.STATUS as STATUS FROM report_review_menu AS lru,restoran as r,review_menu as rm, menu as m where lru.KODE_REVIEW = rm.KODE_REVIEW AND rm.KODE_MENU = m.KODE_MENU AND m.KODE_RESTORAN = r.KODE_RESTORAN AND r.KODE_RESTORAN='$kodeRestoran' AND r.STATUS='1' and lru.STATUS!='0' and m.STATUS='1' and lru.KODE_USER='$kodeUser'")->result();
	$hasil2 = [];
	foreach ($hasil as $h) {
		$hasil2[$h->KODE_REVIEW] = $h->STATUS;
	}
	return $hasil2;
}

public function report_review($kodeReview,$kodeUser,$deskripsi){
		$tanggal = date("Y/m/d");
		$arr = [
			"KODE_REVIEW"=>$kodeReview,
			"KODE_USER"=>$kodeUser,
			"DESKRIPSI"=>$deskripsi,
			"TANGGAL"=>$tanggal,
			"STATUS"=>'1'
		];
		$this->db->insert("report_review_menu",$arr);
	}
}
