<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->library('session');

        //Load dashboard model
        $this->load->model('user');

    }

    // retrieve available user data from db and load profile view
    public function index(){
        echo "Invalid Address";
    }
}