<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->model('history');

        //Load dashboard model
        $this->load->model('user');
        
        $this->load->helper('url');
        
        @$email = $this->session->userdata('email');
        @$college = $this->session->userdata('college');
        if (!$email) {
            redirect('user_authentication', 'location');
        }
        if ($this->session->userdata('status') == "TERMINATED") {
            redirect('user_authentication/blocked', 'location');
        }
        if ($college) {
            redirect('dashboard', 'location');
        }
        
    }

    // retrieve available user data from db and load profile view
    public function index(){
            $this->load->view('user/header');
            $this->load->view('user/profile_data');
    }

    public function update() {
            $userData = array();
            $userData['college'] = $_POST['college'];
            $this->user->update_profile($userData);
            $this->session->set_userdata($userData);
            
            $user_history['user_id'] = $this->session->userdata('id');
            $user_history['type'] = "PROFILE_UPDATE";
            $user_history['date'] = date("Y-m-d H:i:s");
            $user_history['current_level'] = $this->session->userdata('level');
            $user_history['ip'] = $_SERVER['REMOTE_ADDR'];
            $user_history['details'] = json_encode($userData);

            $this->history->log_user_activity($user_history);
            //print_r($userData);
            redirect('dashboard', 'location');
    }
}
