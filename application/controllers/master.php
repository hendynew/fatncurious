<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('table');
		$this->load->library('session');
	}

	public function login(){
		$this->load->model('Model_user');
		$data = [];
		$data['error'] = '';
		$data['nama'] = $this->session->userdata('active');
		if($this->input->post('btnSubmit') == true){
			$username = $this->input->post('txtUsername');
			$password = $this->input->post('txtPassword');
			$hasil = $this->Model_user->master_login($username,$password);
			if($hasil == true){
				$this->session->set_userdata('active',$username);
				redirect('master');
			}else{
				$data['error'] = "Username atau Password salah!";
			}
		}
		$this->load->view('view_master_login',$data);
		//$this->load->view('view_master_login2',$data);
	}

	public function index(){
		$data = [];
		if($this->session->userdata('active')){
			$this->load->model('Model_user');
			$this->load->model('Model_restaurant');
			$this->load->model('Model_menu');
			$this->load->model('Model_promo');
			$data['count_user'] = $this->Model_user->count();
			$data['count_restaurant'] = $this->Model_restaurant->count();
			$data['count_menu'] = $this->Model_menu->count();
			$data['count_promo'] = $this->Model_promo->count();
			$data['active'] = $this->session->userdata('active');
			$data['last_register'] = $this->Model_user->last_register();
			$data['last_login'] = $this->Model_user->last_login();
			$this->load->view('view_master2',$data);
			//$this->load->view('tables',$data);
			//redirect("master/user");
		}else{
			redirect('master/login');
		}
	}

	public function logout(){
		//$this->session->sess_destroy();
		$this->session->sess_destroy();
		redirect('master/login');
	}

	public function user(){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_user');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['message'] = '';
		$data['nama'] = '';
		$data['alamat'] = '';
		$data['telp'] = '';
		$data['tgl'] = '';
		$data['pos'] = '';
		$data['email'] = '';
		$data['pass'] = '';
		$data['report'] = '';
		$data['keterangan'] = '';
		$data['selectedItem'] = '';
		$data['selectedItem2'] = '';

		$data['arrObj'] = $this->Model_user->SELECT('user');
		$data['arrItem'] = $this->Model_user->buatCombobox();
		$data['arrItem2'] = $this->Model_user->buatComboboxJU();
		$data['filter'] = [];
		if($this->input->post('btnFilter') == true){
			$filter = $this->input->post('dropdownFilter');
			$cari = $this->input->post('txtCari');
			$sort = $this->input->post('dropdownSort');
			$urutan = $this->input->post('dropdownUrutan');
			$data['filter'] = $this->Model_user->FILTER($filter,$cari,$sort,$urutan);
		}

		if($this->input->post('btnInsert') == true){
			$data['nama'] = $this->input->post('txtNama');
			$data['alamat'] = $this->input->post('txtAlamat');
			$data['telp'] = $this->input->post('txtTelp');
			$data['tgl'] = $this->input->post('txtTanggal');
			$data['pos'] = $this->input->post('txtPos');
			$data['email'] = $this->input->post('txtEmail');
			$data['pass'] = $this->input->post('txtPass');
			$data['report'] = $this->input->post('txtReport');
			$data['keterangan'] = $this->input->post('txtKeterangan');
			$data['jenis_user'] = $this->input->post('jenisUser');

			$id = $this->Model_user->INSERT($data['jenis_user'],$data['nama'],$data['alamat'],$data['telp'],$data['tgl'],$data['pos'],$data['email'],$data['pass'],$data['report'],$data['keterangan']);
			if($id){
				$data['message'] = 'Insert Success!';
				$data['arrObj'] = [];
				$data['arrObj'] = $this->user->SELECT('user');
			}
			redirect('master_user');
		}
		if($this->input->post('btnPilih') == true){
			$kode = $this->input->post('kodeUser');
			$temp = $this->Model_user->SEARCH($kode);
			foreach($temp as $t){
				$data['nama'] = $t->NAMA_USER;
				$data['alamat'] = $t->ALAMAT_USER;
				$data['telp'] = $t->NOR_TELEPON_USER;
				$data['tgl'] = $t->TANGGAL_LAHIR_USER;
				$data['pos'] = $t->KODE_POS_USER;
				$data['email'] = $t->EMAIL_USER;
				$data['pass'] = $t->PASSWORD;
				$data['report'] = $t->JUMLAH_REPORT_USER;
				$data['keterangan'] = $t->KETERANGAN_USER;
				$data['selectedItem2'] = $t->KODE_JENISUSER;
				$data['selectedItem'] = $t->KODE_USER;
			}
		}

		if($this->input->post('btnDelete') == true){
			$kode = $this->input->post('kodeUser');
			$this->Model_user->DELETE($kode);
			redirect('master_user');
		}

		if($this->input->post('btnUpdate') == true){
			$kode = $this->input->post('kodeUser');

			$data['nama'] = $this->input->post('txtNama');
			$data['alamat'] = $this->input->post('txtAlamat');
			$data['telp'] = $this->input->post('txtTelp');
			$data['tgl'] = $this->input->post('txtTanggal');
			$data['pos'] = $this->input->post('txtPos');
			$data['email'] = $this->input->post('txtEmail');
			$data['report'] = $this->input->post('txtReport');
			$data['keterangan'] = $this->input->post('txtKeterangan');
			$data['jenis_user'] = $this->input->post('jenisUser');

			$this->Model_user->UPDATE($kode,$data['jenis_user'],$data['nama'],$data['alamat'],$data['telp'],$data['tgl'],$data['pos'],$data['email'],$data['report'],$data['keterangan']);
			redirect('master_user');
		}


		$this->load->view('view_user2',$data);
		//$this->load->view('tables',$data);
	}

	public function user_detail($kode){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_user');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['message'] = '';
		$data['nama'] = '';
		$data['alamat'] = '';
		$data['telp'] = '';
		$data['tgl'] = '';
		$data['pos'] = '';
		$data['email'] = '';
		$data['pass'] = '';
		$data['report'] = '';
		$data['keterangan'] = '';
		$data['selectedItem'] = 'bukudefault';
		$data['selectedItem2'] = 'bukudefault';
		$data['arrItem'] = '';
		$data['arrObj'] = $this->Model_user->SELECT('user');
		$data['arrItem'] = $this->Model_user->buatCombobox();
		$data['arrItem2'] = $this->Model_user->buatComboboxJU();


		$temp = $this->Model_user->SEARCH($kode);
		foreach($temp as $t){
			$data['nama'] = $t->NAMA_USER;
			$data['alamat'] = $t->ALAMAT_USER;
			$data['telp'] = $t->NOR_TELEPON_USER;
			$data['tgl'] = $t->TANGGAL_LAHIR_USER;
			$data['pos'] = $t->KODE_POS_USER;
			$data['email'] = $t->EMAIL_USER;
			$data['pass'] = $t->PASSWORD;
			$data['report'] = $t->JUMLAH_REPORT_USER;
			$data['keterangan'] = $t->KETERANGAN_USER;
			$data['selectedItem2'] = $t->KODE_JENISUSER;
			$data['selectedItem'] = $t->KODE_USER;
		}
		$this->load->view('view_user2',$data);
	}

	public function restaurant(){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_restaurant');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['message'] = '';
		$data['nama'] = '';
		$data['alamat'] = '';
		$data['telp'] = '';
		$data['jam_buka'] = '';
		$data['hari_buka'] = '';
		$data['status'] = '';
		$data['deskripsi'] = '';
		$data['peringatan'] = '';
		$data['keterangan'] = '';
		$data['selectedItem'] = '';
		$data['selectedItem2'] = '';
		$data['selectedItem3'] = '';
		$data['selectedItem4'] = '';
		$data['selectedItem5'] = '';
		$data['arrObj'] = $this->Model_restaurant->SELECT('restoran');
		$data['arrItem'] = $this->Model_restaurant->buatCombobox();
		$data['arrItem2'] = $this->Model_restaurant->buatComboboxU();

		if($this->input->post('btnInsert') == true){
			$data['nama'] = $this->input->post('txtNama');
			$data['alamat'] = $this->input->post('txtAlamat');
			$data['telp'] = $this->input->post('txtTelp');
			$data['jam_buka'] = $this->input->post('txtJamBuka');
			$data['hari_buka'] = $this->input->post('txtHariBuka');
			$data['status'] = $this->input->post('txtStatus');
			$data['deskripsi'] = $this->input->post('txtDeskripsi');
			$data['peringatan'] = $this->input->post('txtPeringatan');
			$data['keterangan'] = $this->input->post('txtKeterangan');
			$data['user'] = $this->input->post('kodePemilik');

			$id = $this->Model_restaurant->INSERT($data['user'],$data['nama'],$data['alamat'],$data['telp'],$data['jam_buka'],$data['hari_buka'],$data['status'],$data['deskripsi'],$data['peringatan'],$data['keterangan']);
			if($id){
				$data['message'] = 'Insert Success!';
				$data['arrObj'] = [];
				$data['arrObj'] = $this->Model_restaurant->SELECT('restoran');
			}
			redirect('master_restaurant');
		}
		if($this->input->post('btnPilih') == true){
			$kode = $this->input->post('kodeRestoran');
			$temp = $this->Model_restaurant->SEARCH($kode);
			foreach($temp as $t){
				$data['nama'] = $t->NAMA_RESTORAN;
				$data['alamat'] = $t->ALAMAT_RESTORAN;
				$data['telp'] = $t->NO_TELEPON_RESTORAN;
				$data['jam_buka'] = $t->JAM_BUKA_RESTORAN;
				$data['hari_buka'] = $t->HARI_BUKA_RESTORAN;
				$data['status'] = $t->STATUS_RESTORAN;
				$data['deskripsi'] = $t->DESKRIPSI_RESTORAN;
				$data['peringatan'] = $t->JUMLAH_PERINGATAN_RESTORAN;
				$data['keterangan'] = $t->KETERANGAN_RESTORAN;
				$data['selectedItem2'] = $t->KODE_USER;
				$data['selectedItem'] = $t->KODE_RESTORAN;
			}
		}

		if($this->input->post('btnDelete') == true){
			$kode = $this->input->post('kodeRestoran');
			$this->Model_restaurant->DELETE($kode);
			redirect('master_restaurant');
		}

		if($this->input->post('btnUpdate') == true){
			$kode = $this->input->post('kodeRestoran');

			$data['nama'] = $this->input->post('txtNama');
			$data['alamat'] = $this->input->post('txtAlamat');
			$data['telp'] = $this->input->post('txtTelp');
			$data['jam_buka'] = $this->input->post('txtJamBuka');
			$data['hari_buka'] = $this->input->post('txtHariBuka');
			$data['status'] = $this->input->post('txtStatus');
			$data['deskripsi'] = $this->input->post('txtDeskripsi');
			$data['peringatan'] = $this->input->post('txtPeringatan');
			$data['keterangan'] = $this->input->post('txtKeterangan');
			$data['user'] = $this->input->post('kodePemilik');

			$this->Model_restaurant->UPDATE($kode,$data['user'],$data['nama'],$data['alamat'],$data['telp'],$data['jam_buka'],$data['hari_buka'],$data['status'],$data['deskripsi'],$data['peringatan'],$data['keterangan']);
			redirect('master_restaurant');
		}

		$this->load->view('view_restaurant2',$data);
	}

	public function kartu_kredit(){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_kartu_kredit');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['message'] = '';
		$data['nama'] = '';
		$data['alamat'] = '';
		$data['telp'] = '';
		$data['web'] = '';
		$data['keterangan'] = '';
		$data['selectedItem'] = 'bukudefault';
		//$data['selectedItem2'] = 'bukudefault';
		$data['arrObj'] = $this->Model_kartu_kredit->SELECT('kartu_kredit');
		$data['arrItem'] = $this->Model_kartu_kredit->buatCombobox();
		//$data['arrItem2'] = $this->Model_kartu_kredit->buatComboboxJU();

		$data['selectedItem3'] = 'bukudefault';
		$data['selectedItem5'] = 'bukudefault';
		$data['selectedItem4'] = 'bukudefault';

		if($this->input->post('btnInsert') == true){
			$data['nama'] = $this->input->post('txtNama');
			$data['alamat'] = $this->input->post('txtAlamat');
			$data['telp'] = $this->input->post('txtTelp');
			$data['web'] = $this->input->post('txtWeb');
			$data['keterangan'] = $this->input->post('txtKeterangan');

			$id = $this->Model_kartu_kredit->INSERT($data['nama'],$data['alamat'],$data['telp'],$data['web'],$data['keterangan']);
			if($id){
				$data['message'] = 'Insert Success!';
				$data['arrObj'] = [];
				$data['arrObj'] = $this->Model_kartu_kredit->SELECT('kartu_kredit');
			}
			redirect('master_kartu_kredit');
		}
		if($this->input->post('btnPilih') == true){
			$kode = $this->input->post('kodeKartu');
			$temp = $this->Model_kartu_kredit->SEARCH($kode);
			foreach($temp as $t){
				$data['nama'] = $t->NAMA_KARTU_KREDIT;
				$data['alamat'] = $t->ALAMAT_KARTU_KREDIT;
				$data['telp'] = $t->NOMOR_TELEPON_KARTU_KREDIT;
				$data['web'] = $t->WEBSITE_KARTU_KREDIT;
				$data['keterangan'] = $t->KETERANGAN_KARTU_KREDIT;
				$data['selectedItem'] = $t->KODE_KARTU_KREDIT;
			}
		}

		if($this->input->post('btnDelete') == true){
			$kode = $this->input->post('kodeKartu');
			$this->Model_kartu_kredit->DELETE($kode);
			redirect('master_kartu_kredit');
		}

		if($this->input->post('btnUpdate') == true){
			$kode = $this->input->post('kodeKartu');

			$data['nama'] = $this->input->post('txtNama');
			$data['alamat'] = $this->input->post('txtAlamat');
			$data['telp'] = $this->input->post('txtTelp');
			$data['web'] = $this->input->post('txtWeb');
			$data['keterangan'] = $this->input->post('txtKeterangan');

			$this->Model_kartu_kredit->UPDATE($kode,$data['nama'],$data['alamat'],$data['telp'],$data['web'],$data['keterangan']);
			redirect('master_kartu_kredit');
		}

		$this->load->view('view_kartu_kredit2',$data);
	}

	public function promo(){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('model_promo');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['message'] = '';
		$data['nama'] = '';
		$data['promo'] = '';
		$data['masaBerlaku'] = '';
		$data['foto'] = '';
		$data['persentase'] = '';
		$data['ket'] = '';
		$data['selectedItem'] = 'bukudefault';
		$data['selectedItem3'] = 'bukudefault';
		$data['selectedItem5'] = 'bukudefault';
		$data['selectedItem4'] = 'bukudefault';
		$data['arrItem'] = '';
		$data['arrObj'] = $this->model_promo->select('promo');
		$data['arrItem'] = $this->model_promo->buatCombobox();

		$data['selectedItem5'] = 'bukudefault';
		$data['selectedItem4'] = 'bukudefault';

		if($this->input->post('btnInsert') == true){
			$data['nama'] = $this->input->post('txtNama');
			$data['promo'] = $this->input->post('txtDeskripsiPromo');
			$data['masaBerlaku'] = $this->input->post('txtMasaBerlaku');
			$data['foto'] = $this->input->post('txtFoto');
			$data['persentase'] = $this->input->post('txtPersentase');
			$data['ket'] = $this->input->post('txtKeterangan');

			$id = $this->model_promo->INSERT($data['nama'],$data['promo'],$data['masaBerlaku'],$data['foto'],$data['persentase'],$data['ket']);
			if($id){
				$data['message'] = 'Insert Success!';
				$data['arrObj'] = [];
				$data['arrObj'] = $this->promo->SELECT('promo');
			}
			redirect('master_promo');
		}
		if($this->input->post('btnPilih') == true){
			$kode = $this->input->post('kodePromo');
			$temp = $this->model_promo->SEARCH($kode);
			foreach($temp as $t){
				$data['nama'] = $t->NAMA_PROMO;
				$data['promo'] = $t->DESKRIPSI_PROMO;
				$data['masaBerlaku'] = $t->MASABERLAKU_PROMO;
				$data['foto'] = $t->FOTO_PROMO;
				$data['persentase'] = $t->PERSENTASE_PROMO;
				$data['ket'] = $t->KETERANGAN_PROMO;
				$data['selectedItem'] = $t->KODE_PROMO;

			}
		}

		if($this->input->post('btnDelete') == true){
			$kode = $this->input->post('kodePromo');
			$this->model_promo->DELETE($kode);
			redirect('master_promo');
		}

		if($this->input->post('btnUpdate') == true){
			$kode = $this->input->post('kodePromo');
			$data['nama'] = $this->input->post('txtNamaPromo');
			$data['promo'] = $this->input->post('txtDeskripsiPromo');
			$data['masaBerlaku'] = $this->input->post('txtNamaPromo');
			$data['foto'] = $this->input->post('txtFoto');
			$data['persentase'] = $this->input->post('txtPersentase');
			$data['ket'] = $this->input->post('txtKeterangan');

			$this->model_promo->UPDATE($kode,$data['nama'],$data['promo'],$data['masaBerlaku'],$data['foto'],$data['persentase'],$data['ket']);
			redirect('master_promo');
		}

		$this->load->view('view_promo2',$data);
	}

	public function menu(){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('model_menu');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['message'] = '';
		$data['nama'] = '';
		$data['menu'] = '';
		$data['harga'] = '';
		$data['keterangan'] = '';
		$data['selectedItem'] = 'bukudefault';
		$data['selectedItem2'] = 'bukudefault';
		$data['selectedItem3'] = 'bukudefault';
		$data['arrItem'] = '';
		$data['arrObj'] = $this->model_menu->select();
		//$data['arrObj'] = $this->model_menu->selectMenuByResto('menu','RS001');
		$data['arrItem'] = $this->model_menu->buatCombobox();
		$data['arrItem2'] = $this->model_menu->buatComboboxJM();
		$data['arrItem3'] = $this->model_menu->buatComboboxJR();

		$data['selectedItem3'] = 'bukudefault';
		$data['selectedItem5'] = 'bukudefault';
		$data['selectedItem4'] = 'bukudefault';
		if($this->input->post('btnInsert') == true){
			$data['nama'] = $this->input->post('txtNamaMenu');
			$data['menu'] = $this->input->post('txtDeskripsiMenu');
			$data['harga'] = $this->input->post('txtHarga');
			$data['keterangan'] = $this->input->post('txtKeterangan');
			$data['jenis_menu'] = $this->input->post('kodeJenis');
			$data['jenis_restoran'] = $this->input->post('kodeRestoran');

			$id = $this->model_menu->INSERT($data['jenis_menu'],$data['jenis_restoran'],$data['nama'],$data['menu'],$data['harga'],$data['keterangan']);
			if($id){
				$data['message'] = 'Insert Success!';
				$data['arrObj'] = [];
				$data['arrObj'] = $this->menu->SELECT('menu');
			}
			redirect('master_menu');
		}
		if($this->input->post('btnPilih') == true){
			$kode = $this->input->post('kodeMenu');
			$temp = $this->model_menu->SEARCH($kode);
			foreach($temp as $t){
				$data['nama'] = $t->NAMA_MENU;
				$data['menu'] = $t->DESKRIPSI_MENU;
				$data['harga'] = $t->HARGA_MENU;
				$data['keterangan'] = $t->KETERANGAN_MENU;
				$data['selectedItem2'] = $t->KODE_JENIS_MENU;
				$data['selectedItem3'] = $t->KODE_RESTORAN;
				$data['selectedItem'] = $t->KODE_MENU;
			}
		}

		if($this->input->post('btnDelete') == true){
			$kode = $this->input->post('kodeMenu');
			$this->model_menu->DELETE($kode);
			redirect('master_menu');
		}

		if($this->input->post('btnUpdate') == true){
			$kode = $this->input->post('kodeMenu');
			$kode2 = $this->input->post('kodeJenis');
			$kode3 = $this->input->post('kodeRestoran');

			$data['nama'] = $this->input->post('txtNamaMenu');
			$data['menu'] = $this->input->post('txtDeskripsiMenu');
			$data['harga'] = $this->input->post('txtHarga');
			$data['keterangan'] = $this->input->post('txtKeterangan');

			$this->model_menu->UPDATE($kode,$kode2,$kode3,$data['nama'],$data['menu'],$data['harga'],$data['keterangan']);
			redirect('master_menu');
		}

		$this->load->view('view_menu2',$data);
	}

	public function master_detail_user($kode){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_user');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['kode_param'] = $kode;
		$data['data1'] = $this->Model_user->SEARCH($kode);
		foreach($data['data1'] as $t){
			$data['nama'] = $t->NAMA_USER;
			$data['alamat'] = $t->ALAMAT_USER;
			$data['telp'] = $t->NOR_TELEPON_USER;
			$data['tgl'] = $t->TANGGAL_LAHIR_USER;
			$data['pos'] = $t->KODE_POS_USER;
			$data['email'] = $t->EMAIL_USER;
			$data['pass'] = $t->PASSWORD;
			$data['report'] = $t->JUMLAH_REPORT_USER;
			$data['keterangan'] = $t->KETERANGAN_USER;
			$data['jenis'] = $t->KODE_JENISUSER;
			$data['kode'] = $t->KODE_USER;
		}
		$data['data2'] = $this->Model_user->SELECT_KARTU($kode);
		$data['data3'] = $this->Model_user->SELECT_USER_REPORTING($kode);
		$data['data4'] = $this->Model_user->SELECT_USER_REPORTED($kode);
		$data['data5'] = $this->Model_user->SELECT_REVIEW_MENU($kode);
		$data['data6'] = $this->Model_user->SELECT_REVIEW_RESTORAN($kode);
		$this->load->view('view_detail_user',$data);
	}

	public function master_detail_restaurant($kode){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_restaurant');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['kode_param'] = $kode;
		$data['data1'] = $this->Model_restaurant->SEARCH($kode);
		foreach($data['data1'] as $t){
			$data['nama'] = $t->NAMA_RESTORAN;
			$data['pemilik'] = $t->KODE_USER;
			$data['alamat'] = $t->ALAMAT_RESTORAN;
			$data['telp'] = $t->NO_TELEPON_RESTORAN;
			$data['jam'] = $t->JAM_BUKA_RESTORAN;
			$data['hari'] = $t->HARI_BUKA_RESTORAN;
			$data['status_restoran'] = $t->STATUS_RESTORAN;
			$data['deskripsi'] = $t->DESKRIPSI_RESTORAN;
			$data['peringatan'] = $t->JUMLAH_PERINGATAN_RESTORAN;
			$data['url_foto'] = $t->URL_FOTO_RESTORAN;
			$data['keterangan'] = $t->KETERANGAN_RESTORAN;
			$data['kode'] = $t->KODE_USER;
		}
		$data['data2'] = $this->Model_restaurant->SELECT_PROMO($kode);
		$data['data3'] = $this->Model_restaurant->SELECT_MENU($kode);
		$data['data4'] = $this->Model_restaurant->SELECT_REPORT($kode);
		$data['data5'] = $this->Model_restaurant->SELECT_REVIEW($kode);
		$data['data6'] = $this->Model_restaurant->SELECT_RATING($kode);
		$this->load->view('view_detail_restaurant',$data);
	}

	public function master_detail_promo($kode){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_promo');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['kode_param'] = $kode;
		$data['data1'] = $this->Model_promo->SEARCH($kode);
		foreach($data['data1'] as $t){
			$data['nama'] = $t->NAMA_PROMO;
			$data['deskripsi'] = $t->DESKRIPSI_PROMO;
			$data['masa'] = $t->MASABERLAKU_PROMO;
			$data['foto'] = $t->FOTO_PROMO;
			$data['persentase'] = $t->PERSENTASE_PROMO;
			$data['keterangan'] = $t->KETERANGAN_PROMO;
		}
		$data['data2'] = $this->Model_promo->SELECT_KARTU($kode);
		$data['data3'] = $this->Model_promo->SELECT_MENU($kode);
		$this->load->view('view_detail_promo',$data);
	}

	public function master_detail_kartu_kredit($kode){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_kartu_kredit');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['kode_param'] = $kode;
		$data['data1'] = $this->Model_kartu_kredit->SEARCH($kode);
		foreach($data['data1'] as $t){
			$data['nama'] = $t->NAMA_KARTU_KREDIT;
			$data['alamat'] = $t->ALAMAT_KARTU_KREDIT;
			$data['telp'] = $t->NOMOR_TELEPON_KARTU_KREDIT;
			$data['website'] = $t->WEBSITE_KARTU_KREDIT;
			$data['keterangan'] = $t->KETERANGAN_KARTU_KREDIT;
		}
		$data['data2'] = $this->Model_kartu_kredit->SELECT_USER($kode);
		$data['data3'] = $this->Model_kartu_kredit->SELECT_PROMO($kode);
		$this->load->view('view_detail_kartu',$data);
	}

	public function master_detail_menu($kode){
		if(!$this->session->userdata('active')){
			redirect('master/login');
		}
		$this->load->model('Model_menu');
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$data['kode_param'] = $kode;
		$data['data1'] = $this->Model_menu->SEARCH($kode);
		foreach($data['data1'] as $t){
			$data['nama'] = $t->NAMA_MENU;
			$data['jenis'] = $t->KODE_JENIS_MENU;
			$data['restoran'] = $t->KODE_RESTORAN;
			$data['deskripsi'] = $t->DESKRIPSI_MENU;
			$data['harga'] = $t->HARGA_MENU;
			$data['keterangan'] = $t->KETERANGAN_MENU;
		}
		$data['data2'] = $this->Model_menu->SELECT_PROMO($kode);
		$data['data3'] = $this->Model_menu->SELECT_RATING($kode);
		$data['data4'] = $this->Model_menu->SELECT_REVIEW($kode);
		$data['data5'] = $this->Model_menu->SELECT_REPORT($kode);
		$this->load->view('view_detail_menu',$data);
	}

	public function master_review_restaurant(){
		$this->load->model('Model_restaurant');
		$data = [];
		if(!$this->session->userdata('active')){
			redirect('master');
		}
		if($this->input->post('btnAuto')){
			$this->Model_restaurant->AUTO_MODERATE_REVIEW();
		}
		$data['arrObj'] = $this->Model_restaurant->SELECT_ALL_REVIEW_RESTORAN();
		$data['active'] = $this->session->userdata('active');
		$this->load->view('view_review_restaurant',$data);
	}

	public function master_review_menu(){
		$this->load->model('Model_menu');
		$data = [];
		if(!$this->session->userdata('active')){
			redirect('master');
		}
		if($this->input->post('btnAuto')){
			$this->Model_menu->AUTO_MODERATE_REVIEW();
		}
		$data['arrObj'] = $this->Model_menu->SELECT_ALL_REVIEW_MENU();
		$data['active'] = $this->session->userdata('active');
		$this->load->view('view_review_menu',$data);
	}

	public function delete_review($kode){
		$this->load->model('model_menu');
		$this->model_menu->delete_review($kode);
		redirect('master_review/menu');
	}

	public function delete_review_restoran($kode){
		$this->load->model('Model_restaurant');
		$this->Model_restaurant->delete_review($kode);
		redirect('master_review/restaurant');
	}

	public function request($section){
		$data = [];
		$data['active'] = $this->session->userdata('active');
		$this->load->view($section,$data);
	}
}
