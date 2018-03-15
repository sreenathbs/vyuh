<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->library('session');

        $this->load->helper('url');
        
        $this->load->model('user');
        $this->load->model('history');
        $this->load->model('trials');
        $this->load->model('level');

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
//        if ($this->session->userdata('type') == "REGULAR") {
//            redirect('user_authentication/blocked', 'location');
//        }
    }

    // Load Dashboard view
    public function index(){
        $data['userData'] = $this->user->get_malicious_users();
        $this->load->view('admin/header');
//        $this->load->view('admin/malicious_users', $data);
        $this->load->view('admin/footer');
        //$this->load->view('user/dashboard', $data);
    }
    
    public function malicious_users(){
        $data['userData'] = $this->user->get_malicious_users();
        $this->load->view('admin/header');
        $this->load->view('admin/malicious_users', $data);
        //$this->load->view('admin/footer');
        //$this->load->view('user/dashboard', $data);
    }
    
    public function view_users(){
        $data['userData'] = $this->user->get_users();
        $this->load->view('admin/header');
        $this->load->view('admin/users', $data);
        //$this->load->view('admin/footer');
        //$this->load->view('user/dashboard', $data);
    }
    
    public function make_admins(){
        $data['userData'] = $this->user->get_users();
        $this->load->view('admin/header');
        $this->load->view('admin/make_admins', $data);
        //$this->load->view('admin/footer');
        //$this->load->view('user/dashboard', $data);
    }
    
    public function view_blocked_users(){
        $data['userData'] = $this->user->get_blocked_users();
        $this->load->view('admin/header');
        $this->load->view('admin/users', $data);
        //$this->load->view('admin/footer');
        //$this->load->view('user/dashboard', $data);
    }
    
    public function view_suspected_users(){
        $data['userData'] = $this->user->get_suspected_users();
        $this->load->view('admin/header');
        $this->load->view('admin/users', $data);
        //$this->load->view('admin/footer');
        //$this->load->view('user/dashboard', $data);
    }
    
    public function view_admin_users(){
        $data['userData'] = $this->user->get_admin_users();
        $this->load->view('admin/header');
        $this->load->view('admin/users', $data);
        //$this->load->view('admin/footer');
        //$this->load->view('user/dashboard', $data);
    }
    
    public function block_user(){
        $user_id = $_POST['user_id'];
        $this->user->block_user($user_id);
        echo "TERMINATED";
        //echo $user_id;
    }
    
    public function unblock_user(){
        $user_id = $_POST['user_id'];
        $this->user->unblock_user($user_id);
        echo "SUSPECTED";
        //echo $user_id;
    }
    
    public function make_admin(){
        $user_id = $_POST['user_id'];
        $this->user->make_admin($user_id);
        //echo $user_id;
        echo "ADMIN";
    }
    
    public function downgrade_admin(){
        $user_id = $_POST['user_id'];
        $this->user->downgrade_admin($user_id);
        //echo $user_id;
        echo "MODERATOR";
    }
    
    public function manage_level(){
        $data['levelData'] = $this->level->retrieve_level_data_admin();
        $this->load->view('admin/header');
        $this->load->view('admin/manage_level', $data);
        //$this->load->view('admin/footer');
        //$this->load->view('user/dashboard', $data);
    }
    
    public function enable_question(){
        $level_id = $_POST['level_id'];
        $this->level->enable_question($level_id);
        echo "1";
        //echo $user_id;
    }
    
    public function disable_question(){
        $level_id = $_POST['level_id'];
        $this->level->disable_question($level_id);
        echo "0";
        //echo $user_id;
    }
    
    public function view_malicious_trials_of() {
         $user_id = $_POST['user_id'];
         //echo $user_id;
         $data = $this->trials->get_malicious_trials_of($user_id);
         
         //echo(json_encode($data));
         
         foreach ($data as $dataitem):
             echo $dataitem['user_input']." , ";
         endforeach;
            //echo '<tr>
//                  <td></td>
//                  <td>'.$dataitem['user_id'].'</td>
//                  <td>'.$dataitem['level_no'].'</td>
//                  <td>'.$dataitem['user_input'].'</td>
//                  <td>'.$dataitem['ip'].'</td>
//                  <td>'.$dataitem['date'].'</td>
//                </tr>';
        //endforeach;
         
         
    }
    
}