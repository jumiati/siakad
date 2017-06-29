<?php

class Main extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('AuthModel');
	}

	public function index()
	{
		if ($this->session->logged_in === TRUE)
		{
			switch ($this->session->job)
			{
				case 'super_admin': 
                    $this->_show('baak');
                    break;
                case 'baak': 
                    $this->_show('baak');
                    break;
                case 'keuangan': 
                    $this->_show('keuangan');
                    break;
                case 'dosen': 
                    $this->_show('dosen');
                    break;
                case 'mahasiswa': 
                    $this->_show('mahasiswa');
                    break;
                default:
                    redirect(base_url('/auth'));
                    break;
			}
		}
		else
		{
			redirect(base_url('auth'));
		}
	}

	private function _show($page='')
	{
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('sidebar/'.$page);
		$this->load->view('main');
		$this->load->view('foot');
	}
}