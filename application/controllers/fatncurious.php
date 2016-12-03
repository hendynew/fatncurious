<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fatncurious extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('fatncurious_model_user');
		$this->load->model('fatncurious_model_kartu_kredit');
		$this->load->model('fatncurious_model_restaurant');
		$this->load->model('fatncurious_model_promo');
		$this->load->model('fatncurious_model_registerLogin');
		$this->load->model('fatncurious_model_menu');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('table');
		$this->load->library('form_validation');
		$this->load->helper('cookie');
		$this->load->library('session');
		$this->load->library('pagination');
	}
	//==========REGISTER============
	public function register(){
		if(isset($_SESSION['nama'])){
			$data['nama'] = $_SESSION['nama'];
		}
		if($this->input->post('btnRegister')){
			$this->form_validation->set_rules('txtEmailRegister','Email','callback_cekRegisterKosong');
			if($this->form_validation->run())
			{
				$this->form_validation->set_rules('txtEmailRegister','Email','callback_cekEmailAdaRegister');
				if($this->form_validation->run())
				{

					$data['kodeJU'] = 'JU002';
					$data['nama'] = $this->input->post('txtNamaRegister');
					$data['alamat'] =' '; //$this->input->post('txtAlamatRegister');
					$data['noTelp'] = $this->input->post('txtNoTelpRegister');
					//$data['tgl'] = $this->input->post('txtTglRegister');

					$simpanTgl = explode("/",$this->input->post('txtTglRegister'));
					//echo $simpanTgl[0].' '.$simpanTgl[1].' '.$simpanTgl[2];
					$data['tgl'] = $simpanTgl[2].'-'.$simpanTgl[0].'-'.$simpanTgl[1];
					$data['email'] = $this->input->post('txtEmailRegister');
					$data['password'] = $this->input->post('txtPasswordRegister');
					$data['report'] = 0;
					$data['ket'] = '';
					$this->fatncurious_model_registerLogin->insert($data['kodeJU'],$data['nama'],$data['alamat'],$data['noTelp'],$data['tgl'],$data['email'],$data['password'],$data['report'],$data['ket']);

					$data['user']='';
					$data['user'] = $this->fatncurious_model_registerLogin->select('user');
					//$this->load->view('fatncurious');
					redirect('fatncurious/index/Register_berhasil');
				}
				else
				{
					$data['user']='';
					$data['user'] = $this->fatncurious_model_registerLogin->select('user');
					redirect('fatncurious/index/Email_sudah_terpakai');
				}

			}
			else
			{
				$data['user']='';
				$data['user'] = $this->fatncurious_model_registerLogin->select('user');
				redirect('fatncurious/index/ada_data_yang_kosong');
			}
		}

	}
	//==========REGISTER============

	//===========VALIDASI REGISTER============
	public function cekRegisterKosong(){
		if($this->input->post('txtEmailRegister') == '' || $this->input->post('txtPasswordRegister') == '' || $this->input->post('txtNamaRegister') == '' || $this->input->post('txtTglRegister') == '' || $this->input->post('txtNoTelpRegister') == '')
		{
			$this->form_validation->set_message('cekRegisterKosong','Semua Field Wajib Diisi');
			return false;
		}
		else
		{
			return true;
		}
	}
	public function cekEmailAdaRegister($email){
		$user = $this->fatncurious_model_registerLogin->searchEmail($email);
		$nemu=false;

		if($user)
		{
			$nemu=true;
		}
		if($nemu==true)
		{
			$this->form_validation->set_message('cekUsernameAdaRegister','Username sudah terpakai');
			return false;
		}
		else
		{
			return true;
		}
	}
	//===========VALIDASI REGISTER============

	//==========LOGIN============
	public function login(){
		if(isset($_SESSION['nama'])){
			$data['nama'] = $_SESSION['nama'];
		}
		if($this->input->post('btnLogin')){
			$this->form_validation->set_rules('txtEmailLogin','Email','callback_cekLoginKosong');
			if($this->form_validation->run())
			{
				$this->form_validation->set_rules('txtEmailLogin','Email','callback_cekEmailAdaLogin');
				if($this->form_validation->run())
				{
					$user = $this->fatncurious_model_user->selectUserByEmail($this->input->post('txtEmailLogin'));
					$this->session->set_userdata('userYangLogin',$user);
					redirect("fatncurious/profilUser");
				}
				else
				{
					redirect('fatncurious/index/login_error');
				}

			}
			else
			{
				redirect('fatncurious/index/login_error');
			}
		}

	}
	//==========LOGIN============

	//==========================VALIDASI  Login=========================
	public function cekLoginKosong()	{
		if($this->input->post('txtEmailLogin') == '' || $this->input->post('txtPasswordLogin') == '' )
		{
			$this->form_validation->set_message('cekLoginKosong','Semua Field Wajib Diisi');
			return false;
		}
		else
		{
			return true;
		}
	}

	public function cekEmailAdaLogin($email){
		$passwordd = $this->input->post('txtPasswordLogin');
		$emaill = $this->fatncurious_model_registerLogin->searchEmail($email);
		$nemu=false;

		if($emaill)
		{
			$nemu=true;
		}
		if($nemu==true)
		{
			if($passwordd == $emaill->PASSWORD)
			{
				return true;
			}
			else
			{
				$this->form_validation->set_message('cekEmailAdaLogin','Password Salah');
				return false;
			}
		}
		else
		{
			$this->form_validation->set_message('cekEmailAdaLogin','Email tidak ditemukan');
			return false;
		}

	}
	//==========================VALIDASI Login=========================

	//==========================INDEX=========================
	public function index($adaError = null){
		$data = [];
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		if($adaError == null){
			if(isset($_SESSION['nama'])){
				$data['nama'] = $_SESSION['nama'];
			}
			$this->load->view('fastncurious',$data);
		}
		else{
			$data['adaError']=$adaError;
			$this->load->view('fastncurious',$data);
			//echo $adaError;
		}
	}
	//==========================INDEX=========================

	//================Profil================
	public function profilRestoran($kode)	{
		//echo $this->session->userdata('userYangLogin')->KODE_USER;
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		if($this->session->userdata('userYangLogin')){
			$pemilik = false;
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$data['kodeResto'] = $this->fatncurious_model_restaurant->selectRestoByUser($kodeUser);
			foreach($data['kodeResto'] as $resto){
				if($resto->KODE_RESTORAN == $kode){
					$pemilik=true;
				}
			}
			$jenisUser = $this->fatncurious_model_user->selectJenisUserByKode($kodeUser);
			if($jenisUser->KODE_JENISUSER == 'JU003' && $pemilik==true){
				redirect('fatncurious/sortByMenuProfilRestoran/'.$kode);
			}
			else{
				$data['promo'] = $this->fatncurious_model_restaurant->selectBiggestPromo($kode);
				//$data['menu'] = $this->fatncurious_model_menu->selectMenuByResto($kode);
				$data['resto'] = $this->fatncurious_model_restaurant->selectRestoByKlik($kode);
				$data['active1'] = 'active';
				$data['active2'] = '';
				$data['active3'] = '';
				$data['active4'] = '';

				$rating = $this->fatncurious_model_restaurant->selectJumlahRatingRestoUser($kode,$kodeUser);
				$data['userRating'] = 0;
				if($rating==null){
					for($i=1;$i<=5;$i++){
						$data['glyphicon'.$i] = 'glyphicon-star-empty';
					}
				}
				else{
					$data['userRatingDeskripsi'] = $rating->DESKRIPSI;
					$data['userRatingJudul'] = $rating->JUDUL;
					$data['userRating'] = $rating->JUMLAH_RATING;
					for($i=1;$i<=5;$i++){
						if(($rating->JUMLAH_RATING) - $i >= 0){
							$data['glyphicon'.$i] = 'glyphicon-star';
						}
						else{
							$data['glyphicon'.$i] = 'glyphicon-star-empty';
						}
					}
				}

				if($data['resto']->STATUS_RESTORAN == 0){
					$data['resto']->STATUS = 'Tutup';
				}
				else if($data['resto']->STATUS_RESTORAN == 1){
					$data['resto']->STATUS = 'Buka';
				}
				$this->load->model('Model_restaurant');
				$data['review_restoran'] = $this->Model_restaurant->SELECT_REVIEW($kode);
				$data['kodeuser'] = $kodeUser;
				$data['rating'] = $this->Model_restaurant->COUNT_RATING($kode);
				$data['report'] = $this->Model_restaurant->COUNT_REPORT($kode);
				//echo 'masuk 2';
				$this->load->view('restoran',$data);
			}
		}
		else{
			$this->load->model('Model_restaurant');
			$data['kodeuser'] = '';
			$data['userRating'] = 0;
			$data['rating'] = $this->Model_restaurant->COUNT_RATING($kode);
			$data['report'] = $this->Model_restaurant->COUNT_REPORT($kode);
			$data['promo'] = $this->fatncurious_model_restaurant->selectBiggestPromo($kode);
			//$data['menu'] = $this->fatncurious_model_menu->selectMenuByResto($kode);
			$data['resto'] = $this->fatncurious_model_restaurant->selectRestoByKlik($kode);
			$data['active1'] = 'active';
			$data['active2'] = '';
			$data['active3'] = '';
			$data['active4'] = '';

			for($i=1;$i<=5;$i++){
				$data['glyphicon'.$i] = 'glyphicon-star-empty';
			}
			if($data['resto']->STATUS_RESTORAN == 0){
				$data['resto']->STATUS = 'Tutup';
			}
			else if($data['resto']->STATUS_RESTORAN == 1){
				$data['resto']->STATUS = 'Buka';
			}
			//echo 'masuk 3';
			$this->load->view('restoran',$data);
		}
	}

	public function profilPemilikRestoran()	{
		if($this->session->userdata('userYangLogin')){

			$this->load->model('model_user');
			$this->load->model('fatncurious_model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
			//$data['restoran'] = $this->fatncurious_model_restaurant->selectRestoByUser($kodeUser);
			$data['user'] = $this->fatncurious_model_user->SEARCH($kodeUser);
			//echo $kodeUser;
			$this->load->library('upload');
			$config = array(
				'upload_path' => './vendors/images/profilepicture/',
				'allowed_types' => 'jpg|png|jpeg|JPG|PNG|JPEG',
				'overwrite' => TRUE,
				'max_size' => "1000KB",
				'file_name' => $this->session->userdata('userYangLogin')
			);
			$this->upload->initialize($config);

			$this->load->model('fatncurious_model_restaurant');
			//$data['review'] = $this->fatncurious_model_restaurant->selectReviewRestoran($kodeUser,5,0);

			$config = array();
			$config['base_url'] = site_url('fatncurious/profilPemilikRestoran');
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link']=false;
			$config['last_link']=false;
			$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/profilPemilikRestoran" data-ci-pagination-page="2"><strong>';
			$config['cur_tag_close'] = '</strong></a></li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$config['total_rows'] = sizeof($this->fatncurious_model_restaurant->selectRestoByUserLimit($kodeUser,null,null));
			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();
			$data['review'] = $this->fatncurious_model_restaurant->selectReviewRestoran($kodeUser,null,null);
			$data['restoran'] = $this->fatncurious_model_restaurant->selectRestoByUserLimit($kodeUser,5,$page);
			$this->load->view('profilePemilikRestoran',$data);
		}

	}

	public function profilUser()	{
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
		}
		if($this->session->userdata('userYangLogin')){
			if($this->session->userdata('userYangLogin')->KODE_JENISUSER == 'JU003'){
				//echo "1";
				redirect('fatncurious/profilPemilikRestoran');
			}
			else{
				$this->load->model('model_user');
				$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
				$fotoUser= $this->model_user->SEARCH($kodeUser);
				$data['fotoUser'] = $fotoUser;
				$data['user'] = $this->fatncurious_model_user->SEARCH($kodeUser);
				$this->load->library('upload');
				$config = array(
					'upload_path' => './vendors/images/profilepicture/',
					'allowed_types' => 'jpg|png|jpeg|JPG|PNG|JPEG',
					'overwrite' => TRUE,
					'max_size' => "1000KB",
					'file_name' => $this->session->userdata('userYangLogin')->KODE_USER
				);
				$this->upload->initialize($config);
				$this->load->view('profileUser',$data);
			}
		}

	}

	public function profilUserKlik($kode)	{
		$this->load->model('model_user');
		$data['pemilik'] = 'y';
			if($this->session->userdata('userYangLogin')){
				$data['kodeUser'] = $this->session->userdata('userYangLogin');
				$kodeuser = $this->session->userdata('userYangLogin')->KODE_USER;
				$fotoUserYangLogin= $this->model_user->SEARCH($kodeuser);
				$data['fotoUserYangLogin'] = $fotoUserYangLogin;
				$jenisUser = $this->fatncurious_model_user->selectJenisUserByKode($kodeuser);
			}
			if($jenisUser->KODE_JENISUSER == 'JU003'){
				$data['pemilik'] = 'y';
			}
			else{
				$data['pemilik'] = 'n';
			}
			$kodeUser = $kode;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
			$data['user'] = $this->fatncurious_model_user->SEARCH($kodeUser);
			$this->load->library('upload');
			$config = array(
				'upload_path' => './vendors/images/profilepicture/',
				'allowed_types' => 'jpg|png|jpeg|JPG|PNG|JPEG',
				'overwrite' => TRUE,
				'max_size' => "1000KB",
				'file_name' => $this->session->userdata('userYangLogin')->KODE_USER
			);
			$this->upload->initialize($config);
			$this->load->view('lihatProfilUserLain',$data);
	}

	public function likeComment(){
		$kodeRestoran = $_POST['restoran'];
		$kodeUser = $_POST['user'];
		$kodeReview = $_POST['review'];
		$this->load->model('model_menu');
		$this->model_menu->like_review($kodeReview,$kodeUser,1);
		$arr[0] = $this->model_menu->count_like($kodeReview,1);
		$arr[1] = $this->model_menu->count_like($kodeReview,-1);
		echo json_encode($arr);
	}

	public function dislikeComment(){
		$kodeRestoran = $_POST['restoran'];
		$kodeUser = $_POST['user'];
		$kodeReview = $_POST['review'];
		$this->load->model('model_menu');
		$this->model_menu->like_review($kodeReview,$kodeUser,-1);
		$arr[0] = $this->model_menu->count_like($kodeReview,1);
		$arr[1] = $this->model_menu->count_like($kodeReview,-1);
		echo json_encode($arr);
	}

	public function deleteComment($kodeResto,$kodeReview){
		$this->load->model('model_menu');
		$this->model_menu->delete_review($kodeReview);
		//echo $this->model_menu->count_report($kodeReview);
		redirect("fatncurious/sortByMenuRestoran/$kodeResto");
	}

	public function updateComment($kodeResto,$kodeReview){
			$this->load->model('model_menu');
			//echo "<script>alert($.session.get('deskripsiReview'));</script>";
			echo $_POST['deskripsi'];
			$this->model_menu->update_review($kodeReview,$_POST['deskripsi']);
			//redirect("fatncurious/sortByMenuRestoran/$kodeResto");
	}

	public function reportComment(){
		$this->load->model('model_menu');
		$review = $_POST['kodeReview'];
		$restoran = $_POST['kodeRestoran'];
		$user = $this->session->userdata('userYangLogin')->KODE_USER;
		$deskripsi = $_POST['deskripsiReport'];
		$this->model_menu->report_review($review,$user,$deskripsi);
		//redirect('fatncurious/sortByMenuRestoran/' . $restoran);
	}

	public function deleteMenu($kodeMenu){
		$this->load->model('model_menu');
		$this->model_menu->DELETE($kodeMenu);
		echo "berhasil Delete";
		//echo $this->model_menu->count_report($kodeReview);
		//redirect("fatncurious/sortByMenuProfilRestoran/$kodeResto");
	}

	public function updateMenu(){
		if($this->input->post('btnSubmit')){
			$this->load->model('model_menu');
			$this->load->library('upload');
			//echo "<script>alert($.session.get('deskripsiReview'));</script>";
			$kodeMenu = $this->input->post('hidKodeMenu');
			$kodeResto = $this->input->post('hidKodeRestoran');
			$namaMenu = $this->input->post('txtMenu');
			$deskripsiMenu = $this->input->post('txtDeskripsiMenu');

			$config = array(
				'upload_path' => './vendors/images/menu/'.$kodeResto.'/'.$kodeMenu.'/',
				'allowed_types' => 'jpg|png|jpeg|JPG|PNG|JPEG',
				'overwrite' => TRUE,
				'max_size' => "1000KB",
				'file_name' => '1.jpg'
			);
			$this->upload->initialize($config);
			if($this->upload->do_upload('foto')){
				$url = $this->upload->data('file_name');
			}

			$this->model_menu->updateMenu($kodeMenu,$namaMenu,$deskripsiMenu);
			redirect("fatncurious/sortByMenuProfilRestoran/$kodeResto");
		}
	}

	public function updateStatusRestoran(){

		$kodeResto = $_REQUEST['kode'];
		$status = $_REQUEST['status'];
		$statusSekarang='';

		if($status=='Buka'){
			$statusSekarang='Tutup';
		}
		else if($status=='Tutup'){
			$statusSekarang='Buka';
		}

		$this->load->model('model_restaurant');
		$this->model_restaurant->updateStatusRestoran($kodeResto,$statusSekarang);
		echo $statusSekarang;
	}

	public function LogOut(){
		if($this->session->userdata('userYangLogin')){
			//$this->session->set_userdata('userYangLogin','');
			$this->session->unset_userdata('userYangLogin');
			redirect('fatncurious');
		}

	}

	public function updateProfilRestoran($kode){
				$kodeResto = $kode;
				$nama = $this->input->post('txtRestoran');
				$alamat = $this->input->post('txtAlamat');
				$telepon = $this->input->post('txtTelepon');
				$temp = $telepon;
				$jam = $this->input->post('txtJam');
				$hari = $this->input->post('txtHari');
				$deskripsi = $this->input->post('txtDeskripsi');

				$this->load->model('model_restaurant');
				$this->model_restaurant->updateRestoran($kodeResto,$nama,$alamat,$telepon,$jam,$hari,$deskripsi);
				redirect('fatncurious/profilRestoran/'.$kode.'');

	}

	public function deletePromo($kodePromo){
		$this->load->model('fatncurious_model_promo');
		$this->fatncurious_model_promo->DELETE($kodePromo);
		echo "berhasil Delete";
		//echo $this->model_menu->count_report($kodeReview);
		//redirect("fatncurious/sortByMenuProfilRestoran/$kodeResto");
	}

	public function updatePromo(){
		if($this->input->post('btnSubmitPromo')){
			$this->load->model('model_promo');
			$this->load->library('upload');
			//echo "<script>alert($.session.get('deskripsiReview'));</script>";
			$kodeResto = $this->input->post('hidKodeRestoran');
			$kodePromo = $this->input->post('hidKodePromo');
			$fotoPromo = $this->input->post('hidFotoPromo');

			$namaPromo = $this->input->post('txtPromo');
			$deskripsiPromo = $this->input->post('txtDeskripsiPromo');
			$masaBerlakuPromo = $this->input->post('txtMasaBerlaku');
			$persentasePromo = $this->input->post('txtPersentasePromo');
			$keteranganPromo = $this->input->post('txtKeteranganPromo');

			$config = array(
				'upload_path' => './vendors/images/promo/',
				'allowed_types' => 'jpg|png|jpeg|JPG|PNG|JPEG',
				'overwrite' => TRUE,
				'max_size' => "1000KB",
				'file_name' => $kodePromo.'.jpg'
			);
			$this->upload->initialize($config);
			if($this->upload->do_upload('foto')){
				if($fotoPromo=='' || $fotoPromo==null || $fotoPromo==' ' ){
					echo '1';
					$this->model_promo->updateFotoPromo($kodePromo,$this->upload->data('file_name'));
				}
				else{
					echo '2';
						$this->upload->data('file_name');
				}
			}
			$this->model_promo->updatePromo($kodePromo,$namaPromo,$deskripsiPromo,$masaBerlakuPromo,$persentasePromo,$keteranganPromo);
			redirect("fatncurious/sortByPromoProfilRestoran/$kodeResto");
		}
	}

	public function gantiPassProfilUser(){
		if($this->session->userdata('userYangLogin')){
			if($this->input->post('txtNewPassword') == $this->input->post('txtConfirmNewPassword')){
				$user = $this->fatncurious_model_user->SEARCH($this->session->userdata('userYangLogin')->KODE_USER);
				if($this->input->post('txtOldPassword') == $user->PASSWORD){
					$kode = $user->KODE_USER;
					$kodeJU = $user->KODE_JENISUSER;
					$nama = $user->NAMA_USER;
					$alamat = $user->ALAMAT_USER;
					$telp = $user->NOR_TELEPON_USER;
					$tgl = $user->TANGGAL_LAHIR_USER;
					$pos = $user->KODE_POS_USER;
					$email = $user->EMAIL_USER;
					$pass = $this->input->post('txtNewPassword');
					$report = $user->JUMLAH_REPORT_USER;
					$ket = $user->KETERANGAN_USER;
					$this->fatncurious_model_user->UPDATE($kode,$kodeJU,$nama,$alamat,$telp,$tgl,$pos,$email,$pass,$report,$ket);
					redirect('fatncurious/index/update_berhasil');
				}
				else{
					redirect('fatncurious/index/update_gagal');
				}

			}
			else{
				redirect('fatncurious/index/update_error');
			}
		}

	}
	public function updateProfilUser(){
		if($this->session->userdata('userYangLogin')){
			$this->load->library('upload');
			if($this->input->post('btnSubmit')){
				$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
				$user = $this->fatncurious_model_user->SEARCH($kodeUser);
				$kode = $user->KODE_USER;
				$kodeJU = $user->KODE_JENISUSER;
				$nama = $this->input->post('txtRestoran');
				$alamat = $this->input->post('txtJalan');
				$telp = $this->input->post('txtNoTelp');
				$tgl = $user->TANGGAL_LAHIR_USER;
				$pos = $user->KODE_POS_USER;
				$email = $user->EMAIL_USER;
				$pass = $user->PASSWORD;
				$report = $user->JUMLAH_REPORT_USER;
				$ket = $user->KETERANGAN_USER;
				$aff=$this->fatncurious_model_user->UPDATE($kode,$kodeJU,$nama,$alamat,$telp,$tgl,$pos,$email,$pass,$report,$ket);
				$config = array(
					'upload_path' => './vendors/images/profilepicture/',
					'allowed_types' => 'jpg|png|jpeg|JPG|PNG|JPEG',
					'overwrite' => TRUE,
					'max_size' => "1000KB",
					'file_name' => $this->session->userdata('userYangLogin')->KODE_USER
				);
				$this->upload->initialize($config);
				if($this->upload->do_upload('foto')){
					$url = $this->upload->data('file_name');
					$this->fatncurious_model_user->UPDATE_FOTO($kodeUser,$url);
					redirect('fatncurious/index/update_foto_berhasil');
				}else{
					redirect('fatncurious/index/update_foto_gagal');
				}
			}
		}
		else{
			redirect('fatncurious/index/belum_login');
		}
	}
	//================Profil================

	//================Filter BY================
	public function filterByPromo()	{
		$this->load->model('fatncurious_model_promo');
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		$config = array();
		$config['base_url'] = site_url('fatncurious/filterByPromo');
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link']=false;
		$config['last_link']=false;
		$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/filterByPromo" data-ci-pagination-page="2"><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->fatncurious_model_promo->selectSemuaPromo(null,null));
		$data['promo'] = $this->fatncurious_model_promo->selectSemuaPromo(5,$page);
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		$this->load->view('filterByPromo',$data);
	}
	public function filterByRestoran(){
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		$this->load->model('Model_restaurant');
		$data['rating'] = $this->Model_restaurant->COUNT_ALL_RATING();
		$config = array();
		$config['base_url'] = site_url('fatncurious/filterByRestoran');
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link']=false;
		$config['last_link']=false;
		$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/filterByRestoran" data-ci-pagination-page="2"><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->fatncurious_model_restaurant->selectSemuaResto(null,null));
		$data['resto'] = $this->fatncurious_model_restaurant->selectSemuaResto(5,$page);
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		$this->load->view('filterByRestoran',$data);
	}
	public function filterByKartu(){
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}

		$config = array();
		$config['base_url'] = site_url('fatncurious/filterByKartu');
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link']=false;
		$config['last_link']=false;
		$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/filterByKartu" data-ci-pagination-page="2"><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->fatncurious_model_restaurant->selectBiggestKredit(null,null));
		$data['kartu'] = $this->fatncurious_model_restaurant->selectBiggestKredit(5,$page);
		$data['semuaKartu'] = $this->fatncurious_model_kartu_kredit->selectSemuaKredit();
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('filterByKredit',$data);
	}
	public function filterByMenu(){
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}

		$this->load->model('model_menu');
		$data['review'] = $this->model_menu->SELECT_ALL_REVIEW();
		$data['rating'] = $this->model_menu->COUNT_ALL_LIKE();
		$config = array();
		$config['base_url'] = site_url('fatncurious/filterByMenu');
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link']=false;
		$config['last_link']=false;
		$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/filterByMenu" data-ci-pagination-page="2"><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->fatncurious_model_menu->selectMenu(null,null));
		$data['menu'] = $this->fatncurious_model_menu->selectMenu(5,$page);
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('filterByMenu',$data);
	}
	//================Filter BY================

	//================Sorted BY================
	public function sortByPromoProfilRestoran($kode){
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		$this->load->model('Model_restaurant');
		$data['rating'] = $this->Model_restaurant->COUNT_RATING($kode);
		$data['report'] = $this->Model_restaurant->COUNT_REPORT($kode);
		$data['promo'] = $this->fatncurious_model_restaurant->selectBiggestPromo($kode);
		$data['resto'] = $this->fatncurious_model_restaurant->selectRestoByKlik($kode);
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';
		$data['active4'] = '';
		$data['active5'] = '';
		if($data['resto']->STATUS == 0){
			$data['resto']->STATUS = 'Tutup';
		}
		else if($data['resto']->STATUS == 1){
			$data['resto']->STATUS = 'Buka';
		}
		$this->load->view('profileRestoran',$data);
	}
	public function sortByMenuProfilRestoran($kode)	{
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		$data['menu'] = $this->fatncurious_model_menu->selectMenuByResto($kode);
		$data['resto'] = $this->fatncurious_model_restaurant->selectRestoByKlik($kode);
		$data['fotoMenu'] = $this->fatncurious_model_restaurant->getFotoMenuResto($kode);
		$data['active1'] = '';
		$data['active2'] = '';
		$data['active3'] = 'active';
		$data['active4'] = '';
		$data['active5'] = '';
		if($data['resto']->STATUS == 0){
			$data['resto']->STATUS = 'Tutup';
		}
		else if($data['resto']->STATUS == 1){
			$data['resto']->STATUS = 'Buka';
		}
		$this->load->model('Model_restaurant');
		$data['rating'] = $this->Model_restaurant->COUNT_RATING($kode);
		$data['report'] = $this->Model_restaurant->COUNT_REPORT($kode);
		$data['menu'] = $this->fatncurious_model_menu->selectMenuByResto($kode);
		$data['kodeuser'] = $kodeUser;
		$this->load->model('Model_menu');
		foreach($data['menu'] as $d){
			$temp = $this->Model_menu->SELECT_REVIEW($d->KODE_MENU);
			foreach($temp as $t){
				$data["review"][$d->KODE_MENU][$t->KODE_REVIEW] = $t;
			}
		}
		$this->load->view('profileRestoran',$data);
	}
	public function sortByMenuRestoran($kode)	{
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		$kodeUser = '';
		if($this->session->userdata('userYangLogin')){
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$rating = $this->fatncurious_model_restaurant->selectJumlahRatingRestoUser($kode,$kodeUser);
			$data['userRating'] = 0;
			if($rating==null){
				for($i=1;$i<=5;$i++){
					$data['glyphicon'.$i] = 'glyphicon-star-empty';
				}
			}
			else{
				$data['userRatingDeskripsi'] = $rating->DESKRIPSI;
				$data['userRatingJudul'] = $rating->JUDUL;
				$data['userRating'] = $rating->JUMLAH_RATING;
				for($i=1;$i<=5;$i++){
					if(($rating->JUMLAH_RATING) - $i >= 0){
						$data['glyphicon'.$i] = 'glyphicon-star';
					}
					else{
						$data['glyphicon'.$i] = 'glyphicon-star-empty';
					}
				}
			}
		}
		else{
			for($i=1;$i<=5;$i++){
				$data['glyphicon'.$i] = 'glyphicon-star-empty';
			}
		}
		if($this->input->post('btnGo')){
			$review = $this->input->post('txtReview');
			$this->load->model('model_menu');
			$user = $kodeUser;
			$menu = $this->input->post('menu');
			$resto = $this->input->post('resto');
			$this->model_menu->REVIEW($user,$menu,$review);
			redirect('fatncurious/sortByMenuRestoran/' . $resto);
		}
		$data['menu'] = $this->fatncurious_model_menu->selectMenuByResto($kode);
		$this->load->model('Model_menu');
		$this->load->model('model_user');
		$data['jenis_menu'] = $this->Model_menu->selectJenisMenu();
		$data['like_review'] = $this->Model_menu->count_all_like_review();
		$data['like_review_user'] = $this->Model_menu->select_like_review($kodeUser,$kode);
		$data['report_review_user'] = $this->Model_menu->select_report_review($kodeUser,$kode);
		foreach($data['menu'] as $d){
			$temp = $this->Model_menu->SELECT_REVIEW($d->KODE_MENU);
			foreach($temp as $t){
				$data["review"][$d->KODE_MENU][$t->KODE_REVIEW] = $t;
			}
		}
		$data['kodeuser'] = $kodeUser;
		$fotoUser = $this->model_user->SEARCH($kodeUser);
		$data['fotoUser'] = $fotoUser;
		$data['resto'] = $this->fatncurious_model_restaurant->selectRestoByKlik($kode);
		$data['menu'] = $this->fatncurious_model_menu->selectMenuByResto($kode);
		$data['fotoMenu'] = $this->fatncurious_model_restaurant->getFotoMenuResto($kode);
		$this->load->model('Model_restaurant');
		$data['review_restoran'] = $this->Model_restaurant->SELECT_REVIEW($kode);
		$data['rating'] = $this->Model_restaurant->COUNT_RATING($kode);
		$data['report'] = $this->Model_restaurant->COUNT_REPORT($kode);
		$data['active1'] = '';
		$data['active2'] = '';
		$data['active3'] = 'active';
		$data['active4'] = '';
		$this->load->view('restoran',$data);
	}
	public function sortByPromoRestoran($kode)	{
		$kodeUser = '';
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		$data['promo'] = $this->fatncurious_model_restaurant->selectBiggestPromo($kode);
		$data['resto'] = $this->fatncurious_model_restaurant->selectRestoByKlik($kode);
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';
		$data['active4'] = '';
		$this->load->model('Model_restaurant');
		$data['review_restoran'] = $this->Model_restaurant->SELECT_REVIEW($kode);
		$data['kodeuser'] = $kodeUser;
		$data['rating'] = $this->Model_restaurant->COUNT_RATING($kode);
		$data['report'] = $this->Model_restaurant->COUNT_REPORT($kode);

		$rating = $this->fatncurious_model_restaurant->selectJumlahRatingRestoUser($kode,$kodeUser);
		$data['userRating'] = 0;
		if($rating==null){
			for($i=1;$i<=5;$i++){
				$data['glyphicon'.$i] = 'glyphicon-star-empty';
			}
		}
		else{
			$data['userRatingDeskripsi'] = $rating->DESKRIPSI;
			$data['userRatingJudul'] = $rating->JUDUL;
			$data['userRating'] = $rating->JUMLAH_RATING;
			for($i=1;$i<=5;$i++){
				if(($rating->JUMLAH_RATING) - $i >= 0){
					$data['glyphicon'.$i] = 'glyphicon-star';
				}
				else{
					$data['glyphicon'.$i] = 'glyphicon-star-empty';
				}
			}
		}
		$this->load->view('restoran',$data);
	}
	public function sortByKreditRestoran($kode)	{
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}
		$data['kartu'] = $this->fatncurious_model_restaurant->selectBiggestKreditResto($kode);
		$data['resto'] = $this->fatncurious_model_restaurant->selectRestoByKlik($kode);
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';
		$data['active4'] = '';

		$kodeUser = '';
		if($this->session->userdata('userYangLogin')){
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$rating = $this->fatncurious_model_restaurant->selectJumlahRatingRestoUser($kode,$kodeUser);
			$data['userRating'] = 0;
			if($rating==null){
				for($i=1;$i<=5;$i++){
					$data['glyphicon'.$i] = 'glyphicon-star-empty';
				}
			}
			else{
				$data['userRatingDeskripsi'] = $rating->DESKRIPSI;
				$data['userRatingJudul'] = $rating->JUDUL;
				$data['userRating'] = $rating->JUMLAH_RATING;
				for($i=1;$i<=5;$i++){
					if(($rating->JUMLAH_RATING) - $i >= 0){
						$data['glyphicon'.$i] = 'glyphicon-star';
					}
					else{
						$data['glyphicon'.$i] = 'glyphicon-star-empty';
					}
				}
			}
		}
		else{
			for($i=1;$i<=5;$i++){
				$data['glyphicon'.$i] = 'glyphicon-star-empty';
			}
		}
		$this->load->model('Model_restaurant');
		$data['review_restoran'] = $this->Model_restaurant->SELECT_REVIEW($kode);
		$data['kodeuser'] = $kodeUser;
		$data['kodeRestoran'] = $kode;
		$data['rating'] = $this->Model_restaurant->COUNT_RATING($kode);
		$data['report'] = $this->Model_restaurant->COUNT_REPORT($kode);

		$this->load->view('restoran',$data);
	}
	public function rate_restoran(){
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin')->KODE_USER;
		}
		$this->load->model('Model_restaurant');
		$rate = $this->input->post("valueBintang");
		$user = $data['kodeUser'];
		$resto = $this->input->post('kodeRestoran');
		$comment = $this->input->post('txtComment');
		$judul = $this->input->post('txtTitle');
		$this->Model_restaurant->rate($rate,$user,$resto,$comment,$judul);

		redirect("fatncurious/sortByMenuRestoran/".$resto);
	}

	public function uploadFoto(){
		$this->load->model('Model_menu');
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin')->KODE_USER;
		}
		$kodeRestoran = $this->input->post('hidKodeRestoran');
		$kodeMenu = $this->input->post('hidKodeMenu');
		$this->load->library('upload');
		$config = array(
			'upload_path' => './vendors/images/menu/' . $kodeRestoran .'/' . $kodeMenu . '/',
			'allowed_types' => 'jpg|png|jpeg|JPG|PNG|JPEG',
			'overwrite' => FALSE,
			'max_size' => "1000KB",
			'file_name' => $this->Model_menu->count_foto_menu($kodeMenu)
		);
		if(!is_dir('./vendors/images/menu/' . $kodeRestoran .'/' . $kodeMenu)){
			mkdir('./vendors/images/menu/' . $kodeRestoran .'/' . $kodeMenu . '/',0777,true);
		}
		$this->upload->initialize($config);
		if($this->upload->do_upload('foto')){
			$this->Model_menu->upload($kodeMenu,$data['kodeUser'],$this->upload->data('file_name'));
		}
		redirect("fatncurious/sortByMenuRestoran/".$kodeRestoran);

	}
	//================Sorted BY================


	//================Search===================
	public function searchFilterByMenu(){
		if($this->input->post('btnSearch')){
			$this->session->unset_userdata('simpantxtSearchMenu');
			$this->session->unset_userdata('simpanJenisMakanan');
			$this->session->unset_userdata('simpanJenisMinuman');
			$this->session->unset_userdata('simpanJenisSnack');
			$this->session->unset_userdata('simpanJenisDessert');
		}

		$this->load->model('fatncurious_model_menu');
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}

		$makanan=null;
		$minuman=null;
		$snack=null;
		$dessert=null;
		$kataSearch=null;

		//untuk simpan apa yang di search sebelumnya==========================================
		if($this->session->userdata('simpantxtSearchMenu')){$kataSearch = $this->session->userdata('simpantxtSearchMenu');}
		else{$kataSearch = $this->input->post('txtSearchMenu');	$this->session->set_userdata('simpantxtSearchMenu',$kataSearch);}

		if($this->session->userdata('simpanJenisMakanan')){$makanan = $this->session->userdata('simpanJenisMakanan');}
		else{
			if($this->input->post('ckJenisMakanan')){
				$makanan = $this->input->post('ckJenisMakanan');
				$this->session->set_userdata('simpanJenisMakanan',$makanan);
			}
		}

		if($this->session->userdata('simpanJenisMinuman')){$minuman = $this->session->userdata('simpanJenisMinuman');}
		else{
			if($this->input->post('ckJenisMinuman')){
				$minuman = $this->input->post('ckJenisMinuman');
				$this->session->set_userdata('simpanJenisMinuman',$minuman);;
			}
		}

		if($this->session->userdata('simpanJenisSnack')){$snack = $this->session->userdata('simpanJenisSnack');}
		else{
			if($this->input->post('ckJenisSnack')){
				$snack = $this->input->post('ckJenisSnack');
				$this->session->set_userdata('simpanJenisSnack',$snack);;
			}
		}

		if($this->session->userdata('simpanJenisDessert')){$dessert = $this->session->userdata('simpanJenisDessert');}
		else{
			if($this->input->post('ckJenisDessert')){
				$dessert = $this->input->post('ckJenisDessert');
				$this->session->set_userdata('simpanJenisDessert',$dessert);;
			}
		}
		//untuk simpan apa yang di search sebelumnya==========================================

		$data['kataSearch'] = $kataSearch;
		$data['makanan'] = $makanan;
		$data['minuman'] = $minuman;
		$data['snack'] = $snack;
		$data['dessert']=$dessert;

		$this->load->model('Model_menu');
		$data['review'] = $this->Model_menu->SELECT_ALL_REVIEW();
		$data['rating'] = $this->Model_menu->COUNT_ALL_LIKE();

		$config = array();
		$config['base_url'] = site_url('fatncurious/searchFilterByMenu');
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link']=false;
		$config['last_link']=false;
		$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/searchFilterByMenu" data-ci-pagination-page="2"><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->fatncurious_model_menu->searchMenu(null,null,$kataSearch,$makanan,$minuman,$snack,$dessert));
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['menu'] = $this->fatncurious_model_menu->searchMenu(5,$page,$kataSearch,$makanan,$minuman,$snack,$dessert);
		$this->load->model('Model_menu');
		$data['rating'] = $this->Model_menu->COUNT_ALL_LIKE();
		$this->load->view('filterByMenu',$data);
	}

	public function searchFilterByRestoran(){
		if($this->input->post('btnSearch')){
			$this->session->unset_userdata('simpantxtSearchRestoran');
			$this->session->unset_userdata('simpanNamaRestoran');
			$this->session->unset_userdata('simpanAlamatRestoran');
		}

		$this->load->model('fatncurious_model_restaurant');
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}

		$namaResto=null;
		$alamatResto=null;
		$kataSearch=null;

		//untuk simpan apa yang di search sebelumnya==========================================
		if($this->session->userdata('simpantxtSearchRestoran')){$kataSearch = $this->session->userdata('simpantxtSearchRestoran');}
		else{$kataSearch = $this->input->post('txtSearchRestoran');	$this->session->set_userdata('simpantxtSearchRestoran',$kataSearch);}

		if($this->session->userdata('simpanNamaRestoran')){$namaResto = $this->session->userdata('simpanNamaRestoran');}
		else{
			if($this->input->post('ckNamaRestoran')){
				$namaResto = $this->input->post('ckNamaRestoran');
				$this->session->set_userdata('simpanNamaRestoran',$namaResto);
			}
		}

		if($this->session->userdata('simpanAlamatRestoran')){$alamatResto = $this->session->userdata('simpanAlamatRestoran');}
		else{
			if($this->input->post('ckAlamatRestoran')){
				$alamatResto = $this->input->post('ckAlamatRestoran');
				$this->session->set_userdata('simpanAlamatRestoran',$alamatResto);;
			}
		}

		//untuk simpan apa yang di search sebelumnya==========================================

		$data['kataSearch'] = $kataSearch;
		$data['namaResto'] = $namaResto;
		$data['alamatResto'] = $alamatResto;
		//echo $kataSearch;

		$config = array();
		$config['base_url'] = site_url('fatncurious/searchFilterByRestoran');
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link']=false;
		$config['last_link']=false;
		$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/searchFilterByRestoran" data-ci-pagination-page="2"><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->fatncurious_model_restaurant->searchRestoran(null,null,$kataSearch,$namaResto,$alamatResto));
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['resto'] = $this->fatncurious_model_restaurant->searchRestoran(5,$page,$kataSearch,$namaResto,$alamatResto);
		$this->load->model('Model_restaurant');
		$data['rating'] = $this->Model_restaurant->COUNT_ALL_RATING();
		$this->load->view('filterByRestoran',$data);
	}

	public function searchFilterByKredit(){
		if($this->input->post('btnSearch')){
			$this->session->unset_userdata('simpantxtSearchKredit');
			$this->session->unset_userdata('simpanNamaKartu');
		}

		$this->load->model('fatncurious_model_kartu_kredit');
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}

		$namaKartu=null;

		//untuk simpan apa yang di search sebelumnya==========================================
		if($this->session->userdata('simpanNamaKartu')){$namaKartu = $this->session->userdata('simpanNamaKartu');}
		else{
			if($this->input->post('namaKartu')){
				$namaKartu = $this->input->post('namaKartu');
				$this->session->set_userdata('simpanNamaKartu',$namaKartu);;
			}
		}

		//untuk simpan apa yang di search sebelumnya==========================================

		$data['namaKartu'] =  $namaKartu;
		//echo $namaKartu.'-';

		$config = array();
		$config['base_url'] = site_url('fatncurious/searchFilterByKredit');
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link']=false;
		$config['last_link']=false;
		$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/searchFilterByKredit" data-ci-pagination-page="2"><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->fatncurious_model_kartu_kredit->searchKredit(null,null,$namaKartu));
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['kartu'] = $this->fatncurious_model_kartu_kredit->searchKredit(5,$page,$namaKartu);
		$data['semuaKartu'] = $this->fatncurious_model_kartu_kredit->selectSemuaKredit();
		$this->load->view('filterByKredit',$data);
	}

	public function searchFilterByPromo(){
		if($this->input->post('btnSearch')){
			$this->session->unset_userdata('simpantxtSearchKredit');
			$this->session->unset_userdata('simpanNamaRestoran');
			$this->session->unset_userdata('simpanAlamatRestoran');
			$this->session->unset_userdata('simpanNamaPromo');
			$this->session->unset_userdata('simpanDeskripsiPromo');
			$this->session->unset_userdata('simpanPersentasePromo');
		}

		$this->load->model('fatncurious_model_promo');
		if($this->session->userdata('userYangLogin')){
			$data['kodeUser'] = $this->session->userdata('userYangLogin');
			$this->load->model('model_user');
			$kodeUser = $this->session->userdata('userYangLogin')->KODE_USER;
			$fotoUser= $this->model_user->SEARCH($kodeUser);
			$data['fotoUser'] = $fotoUser;
		}

		$namaResto=null;
		$alamatResto=null;
		$kataSearch=null;
		$namaPromo=null;
		$deskripsiPromo=null;
		$persentasePromo=null;

		//untuk simpan apa yang di search sebelumnya==========================================
		if($this->session->userdata('simpantxtSearchKredit')){$kataSearch = $this->session->userdata('simpantxtSearchKredit');}
		else{$kataSearch = $this->input->post('txtSearchKredit');	$this->session->set_userdata('simpantxtSearchKredit',$kataSearch);}

		if($this->session->userdata('simpanNamaRestoran')){$namaResto = $this->session->userdata('simpanNamaRestoran');}
		else{
			if($this->input->post('ckNamaRestoran')){
				$namaResto = $this->input->post('ckNamaRestoran');
				$this->session->set_userdata('simpanNamaRestoran',$namaResto);
			}
		}

		if($this->session->userdata('simpanAlamatRestoran')){$alamatResto = $this->session->userdata('simpanAlamatRestoran');}
		else{
			if($this->input->post('ckAlamatRestoran')){
				$alamatResto = $this->input->post('ckAlamatRestoran');
				$this->session->set_userdata('simpanAlamatRestoran',$alamatResto);;
			}
		}

		if($this->session->userdata('simpanNamaPromo')){$namaPromo = $this->session->userdata('simpanNamaPromo');}
		else{
			if($this->input->post('ckNamaPromo')){
				$namaPromo = $this->input->post('ckNamaPromo');
				$this->session->set_userdata('simpanNamaPromo',$namaPromo);;
			}
		}

		if($this->session->userdata('simpanDeskripsiPromo')){$deskripsiPromo = $this->session->userdata('simpanDeskripsiPromo');}
		else{
			if($this->input->post('ckDeskripsiPromo')){
				$deskripsiPromo = $this->input->post('ckDeskripsiPromo');
				$this->session->set_userdata('simpanDeskripsiPromo',$deskripsiPromo);;
			}
		}

		if($this->session->userdata('simpanPersentasePromo')){$persentasePromo = $this->session->userdata('simpanPersentasePromo');}
		else{
			if($this->input->post('txtPersentase')){
				$persentasePromo = $this->input->post('txtPersentase');
				$this->session->set_userdata('simpanPersentasePromo',$persentasePromo);;
			}
		}

		//untuk simpan apa yang di search sebelumnya==========================================

		$data['kataSearch'] = $kataSearch;
		$data['namaResto'] = $namaResto;
		$data['alamatResto'] = $alamatResto;
		$data['namaPromo'] = $namaPromo;
		$data['deskripsiPromo'] = $deskripsiPromo;
		$data['persentasePromo'] = $persentasePromo;
		//echo $persentasePromo.'-';

		$config = array();
		$config['base_url'] = site_url('fatncurious/searchFilterByPromo');
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link']=false;
		$config['last_link']=false;
		$config['cur_tag_open'] = '<li> <a href="http://localhost/fatncurious/index.php/fatncurious/searchFilterByPromo" data-ci-pagination-page="2"><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['total_rows'] = sizeof($this->fatncurious_model_promo->searchPromo(null,null,$kataSearch,$namaResto,$alamatResto,$namaPromo,$deskripsiPromo,$persentasePromo));
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['promo'] = $this->fatncurious_model_promo->searchPromo(5,$page,$kataSearch,$namaResto,$alamatResto,$namaPromo,$deskripsiPromo,$persentasePromo);
		$this->load->view('filterByPromo',$data);
	}

	//================Search===================

	public function tampilkanFormInsertPromo(){
		$this->table->add_row('Nama Promo',form_input('txtPromo',"",['id'=>'txtPromo','style'=>'margin-left:20px;']));
		$this->table->add_row('Deskripsi Promo',form_input('txtDeskripsiPromo',"",['id'=>'deskripsiPromo','style'=>'margin-left:20px;']));
		$this->table->add_row('Masa Berlaku',form_input('txtMasaBerlaku',"",['id'=>'masaBerlaku','style'=>'margin-left:20px;']));
		$this->table->add_row('Presentase Promo',form_input('txtPresentasePromo',"",['id'=>'persentasePromo','style'=>'margin-left:20px;']));
		$this->table->add_row('Keterangan Promo',form_input('txtKeteranganPromo',"",['id'=>'keteranganPromo','style'=>'margin-left:20px;']));
		echo $this->table->generate();

	}

	public function tampilkanFormInsertMenu(){
		$this->table->add_row('Nama Menu',form_input('txtMenu',"",['id'=>'txtMenu','style'=>'margin-left:20px;']));
		$this->table->add_row('Deskripsi Menu',form_input('txtDeskripsiMenu',"",['id'=>'deskripsiMenu','style'=>'margin-left:20px;']));
		$this->table->add_row('Harga Menu',form_input('txtHargaMenu',"",['id'=>'hargaMenu','style'=>'margin-left:20px;']));
		$this->table->add_row('Keterangan',form_input('txtKeterangan',"",['id'=>'keteranganPromo','style'=>'margin-left:20px;']));
		echo $this->table->generate();
	}

}
