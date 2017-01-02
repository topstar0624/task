<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Test_Model');
	}

	function create_table()
	{
		$this->Test_Model->create_table_model();
	}
}
