<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Messages');
	}
	
	public function notif()
	{
		$masuk = $this->Messages->Get_KotakMasuk(date("Y"));
		$unread = 0;
		foreach ($masuk as $key) 
		{
			if(!$key->status_baca)
				$unread++;
		}
		echo $unread;
	}

	public function Graph()
	{
		$masuk = $this->Messages->Get_KotakMasuk(date("Y"));

		for ($i=1; $i<=12 ; $i++) 
		{
			$count = 0;		
			foreach ($masuk as $key) 
			{
				$a = $key->time[5].$key->time[6];
				$number = intval($a);
				if($i==$number)
					$count++;
			}
			if($i==1)
				echo $count;
			else
				echo ", ".$count;
		}
	}

	public function tulis()
	{
		$masuk = $this->Messages->Get_KotakMasuk(date("Y"));
		$keluar = $this->Messages->Get_KotakKeluar(date("Y"));

		$output = array();
		foreach ($masuk as $key) 
		{
			array_push($output, $key->no_hp);
		}
		foreach ($keluar as $key) 
		{
			array_push($output, $key->no_hp);
		}

		$kirim['output'] = array_unique($output);
		
		$this->load->view("header");
		$this->load->view('tulis_pesan',$kirim);
		$this->load->view("footer");
	}

	public function send()
	{
		$data = array(
			'no_hp' => $_POST['no_hp'], 
			'isi_pesan' => $_POST['isi_pesan'], 
			'created_by' => $this->session->userdata('id_login')
			);
		if($this->Messages->insertPesan($data) == 1)
			$kirim['sukses'] = 1;
		else
			$kirim['error'] = 1;
		
		$masuk = $this->Messages->Get_KotakMasuk(date("Y"));
		$keluar = $this->Messages->Get_KotakKeluar(date("Y"));

		$output = array();
		foreach ($masuk as $key) 
		{
			array_push($output, $key->no_hp);
		}
		foreach ($keluar as $key) 
		{
			array_push($output, $key->no_hp);
		}

		$kirim['output'] = array_unique($output);
		
		$this->load->view("header");
		$this->load->view('tulis_pesan',$kirim);
		$this->load->view("footer");
	}

	public function inbox()
	{
		$kirim['masuk'] = $this->Messages->Get_KotakMasuk(date("Y"));
		$this->load->view("header");
		$this->load->view('pesan_masuk',$kirim);
		$this->load->view("footer");
		
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