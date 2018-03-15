<?php

//defined('BASEPATH') OR exit('No direct script access allowed');
//
//class Profile extends CI_Controller
//{
//    function __construct() {
//        parent::__construct();
//
//        $this->load->library('session');
//        $this->load->model('history');
//
//        //Load dashboard model
//        $this->load->model('user');
//        
//        $this->load->helper('url');
//
//    }
//
//    // retrieve available user data from db and load profile view
//    public function index(){
//        @$email = $this->session->userdata('email');
////        echo $email;
//        if ($email) {
//            //$userData = array();
//            $userData = $this->user->retrieve_user_data($email);
////            print_r($userData);
//            $this->load->view('user/header');
//            $this->load->view('user/profile', $userData);
//          
//            $user_history['user_id'] = $this->session->userdata('id');
//            $user_history['type'] = "PROFILE_VIEW";
//            $user_history['date'] = date("Y-m-d H:i:s");
//            $user_history['current_level'] = $this->session->userdata('level');
//            $user_history['ip'] = $_SERVER['REMOTE_ADDR'];
//            $user_history['details'] = json_encode($userData);
//            $this->history->log_user_activity($user_history);
//        } else{
//            redirect('user_authentication', 'location');
//        }
//    }
//
//    // profile.js function for ajax request | update profile on db
//    public function profile_update() {
//        $email = $this->session->userdata('email');
//        if ($email) {
//            $userData = array();
//            $userData['name'] = $_POST['name'];
//            //$userData['gender'] = $_POST['gender'];
//            //$userData['email'] = $_POST['email'];
//            $userData['mobile'] = $_POST['mobile'];
//            $userData['semester'] = $_POST['semester'];
//            $userData['branch'] = $_POST['branch'];
//            $userData['college'] = $_POST['college'];
//            $userData['city'] = $_POST['city'];
//            @$userData['profile_picture'] = $_POST['profilepicture'];
//            $this->user->update_profile($userData);
//            
//            $user_history['user_id'] = $this->session->userdata('id');
//            $user_history['type'] = "PROFILE_UPDATE";
//            $user_history['date'] = date("Y-m-d H:i:s");
//            $user_history['current_level'] = $this->session->userdata('level');
//            $user_history['ip'] = $_SERVER['REMOTE_ADDR'];
//            $user_history['details'] = json_encode($userData);
//
//            $this->history->log_user_activity($user_history);
//            //print_r($userData);
//        }
//    }
//}