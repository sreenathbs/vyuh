<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranklist extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->library('session');

        //Load dashboard model
        $this->load->model('user');
        $this->load->helper('url');

    }

    // Load Ranklist view
    public function index(){
            // $ranklistData = array();
             $data['ranklist'] = $this->user->get_ranklist();

            // print_r($data['ranklist']);
            $this->load->view('user/header');
            $this->load->view('user/ranklist', $data);
            //echo "session: ",$this->session->userdata('email');
    }
}