<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_levels extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->library('session');

        //Load dashboard model
        $this->load->model('level');

    }

    // retrieve available questions from db and load question view
    public function index(){
        $email = $this->session->userdata('email');
        // echo $email;
        if ($email) {
            // $levelData_admin = array();
            $data['levelData_admin'] = $this->level->retrieve_level_data_admin();
            $this->load->view('admin/level', $data);
        }
    }

    // profile.js function for ajax request | update profile on db
    public function add() {
        $email = $this->session->userdata('email');
        if ($email) {
            $levelData = array();
            @$levelData['serial_number'] = $_POST['serial_number'];
            @$levelData['question'] = $_POST['question'];
            @$levelData['answer'] = $_POST['answer'];
            @$levelData['active'] = $_POST['active'];
            @$levelData['type'] = $_POST['type'];
            //@$levelData['hint'] = $_POST['hint'];
            //@$levelData['hint_status'] = $_POST['hint_status'];

            $this->level->add_level_data_admin($levelData);
            //print_r($userData);
        }
    }
}