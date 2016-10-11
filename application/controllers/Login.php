<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('User');
		$this->load->model('Messages');

	}
	public function index()
	{
		$kirim["error"] = "";
		$this->load->view('login',$kirim);
	}
	public function signin()
	{
		//echo var_dump($_POST);
		$flag = 0;
		$hasil = $this->User->getLogin();
		$username = $_POST['username'];
		//$password = md5($_POST['password']);
		$password = $_POST['password'];
		foreach ($hasil as $key) 
		{
			if($username == $key->username)
			{
				if( $password == $key->password)
				{
					$this->session->set_userdata('username',$key->username);
					$this->session->set_userdata('id_login',$key->id);
					$this->session->set_userdata('role',$key->id_role);
					$role = $key->id_role;
					$flag=1;
					break;
				}
			}
		}
		if($flag==1)
		{
			$data = array('lastvisit_at' => date('Y-m-d H:i:s'));
			$this->User->LastVisit($data,$this->session->userdata('id_login'));
			if($role == 2)
				header("Location: beranda_pegawai");
		}
		else
		{
			$kirim["error"] = "Maaf, Username atau Password yang anda masukkan salah..";
			$this->load->view('login',$kirim);	
		}
	}
	public function beranda_pegawai()
	{
		$id = $this->session->userdata('username');
		if(!$id)
        	redirect(base_url());
		else
		{
			$masuk = $this->Messages->Get_KotakMasuk(date("Y"));
			$keluar = $this->Messages->Get_KotakKeluar(date("Y"));
			
			$kirim['masuk'] = sizeof($masuk);
			$kirim['keluar'] = sizeof($keluar);
			$kirim['tanya'] = 0;
			$kirim['keluh'] = 0;

			foreach ($masuk as $key) 
			{
				if($key->klasifikasi==1)
					$kirim['tanya']++;
				else if($key->klasifikasi==2)
					$kirim['keluh']++;
			}

			$this->load->view("header");
			$this->load->view('index_pegawai',$kirim);
			$this->load->view("footer");
		}
	}
	public function signout()
	{
		$data = array('lastvisit_at' => date('Y-m-d H:i:s'));
		$this->User->LastVisit($data, $this->session->userdata('id_login'));
		$kirim["error"] = "";
		$this->session->sess_destroy();
		$this->load->view("login", $kirim);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */