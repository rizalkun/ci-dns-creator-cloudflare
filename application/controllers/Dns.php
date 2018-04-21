<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dns extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		require_once APPPATH . 'third_party/CloudFlare/Autoloader.php';
	}

	public function index()
	{
		if (!empty($this->input->post('name')) and !empty($this->input->post('content'))) {
				$name=$this->input->post('name');
				$content=$this->input->post('content');
				$zoneid = "Zone ID";
				$dns = new Cloudflare\Zone\Dns('Your Email', 'Your Global API');
				$response=$dns->create($zoneid, 'A', $this->input->post('name') . ".defuza.xyz", $this->input->post('content'), 1);
			if ($response) {
					echo "<div class='alert alert-success alert-dismissable'>Your hostname <b> $name.defuza.xyz</b> is now online!</div>";
				}else{
					echo "<div class='alert alert-danger alert-dismissable'>Your hostname <b>  $name.defuza.xyz</b> could not be created!</div>";
			}
		} 
		$this->load->view('dns');
	}


}
