<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->library('session');

    }

    public function index(){
        $this->load->view('admin/pages/userlogin');
    }
    
}