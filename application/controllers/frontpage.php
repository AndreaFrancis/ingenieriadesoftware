<?php if (!defined('BASEPATH')) die();
class Frontpage extends Main_Controller {

  public function index()
	{
  		//$this->load->view('include/header');
      //$this->load->view('frontpage');
      $this->load->view('inicio_sesion');
      //$this->load->view('include/footer');
	}

	public function admin()
	{
		$this->load->view('include/header');
      		$this->load->view('frontpage');
      		//$this->load->view('inicio_sesion');
      		$this->load->view('include/footer');	
	}
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
