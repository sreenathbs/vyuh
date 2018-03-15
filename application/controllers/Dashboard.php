<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->library('session');

        $this->load->helper('url');
        
        $this->load->model('user');
        $this->load->model('history');
        $this->load->model('trials');

        //Load dashboard model
        //$this->load->model('dashboard');

        @$email = $this->session->userdata('email');
        @$college = $this->session->userdata('college');
        if (!$email) {
            redirect('user_authentication', 'location');
        }
        if (!$college) {
            redirect('profile', 'location');
        }
        if ($this->session->userdata('status') == "TERMINATED") {
            redirect('user_authentication/blocked', 'location');
        }
    }

    // Load Dashboard view
    public function index(){
            $data['rank'] = $this->user->get_rank();
            $data['accuracy'] = $this->trials->get_accuracy();
            $data['level'] = $this->session->userdata('level');
            $data['remaining_levels'] = 25 - $data['level'];
            $data['percentage'] = ($data['level'] / 25) * 100;
            if ($data['percentage'] < 30)
                $data['experience'] = "Novice :)";
            elseif ($data['percentage'] < 60)
                $data['experience'] = "Intermediate :)";
            else
                $data['experience'] = "Ninja!";
            
            $user_avatar['profile_picture'] = $this->session->userdata('profile_picture');
            $user_avatar['coins'] = $this->session->userdata('coins');
            
            
//            $data['remaining_levels'] = $this->session->userdata('remaining_levels');
            //echo $data['rank'];
            $this->load->view('user/header');
            $this->load->view('user/dashboard', $data);
        //redirect('http://localhost/vyuh/index.php/user_authentication', 'location');
    }
    
}