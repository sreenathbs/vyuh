<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Authentication extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->library('facebook');

        $this->load->model('user');
        $this->load->model('history');

        $this->config->load('facebook');

        $this->load->library('session');
        
        $this->load->helper('url');
    }

    public function index(){

        //if not logged in
        if(!$this->session->userdata('email')) {

            $fb = new Facebook\Facebook([
              'app_id' => $this->config->item('facebook_app_id'), // Replace {app-id} with your app id
              'app_secret' => $this->config->item('facebook_app_secret'),
              'default_graph_version' => $this->config->item('facebook_graph_version'),
            ]);
            
            $helper = $fb->getRedirectLoginHelper();
            $permissions = ['email']; // Optional permissions
            $loginUrl = $helper->getLoginUrl('http://'.$_SERVER['SERVER_NAME'].'/vyuh/index.php/user_authentication/login', $permissions);

            $loginURL['loginURL'] = htmlspecialchars($loginUrl);
            $this->load->view('user/header');
            $this->load->view('user/login', $loginURL);
        } else {
            redirect('dashboard', 'location');
        }
    }


    public function login() {

        if($this->session->userdata('email')) {
            echo $this->session->userdata('email');
            echo "<br>logged in already | Login</br>";
            redirect('dashboard', 'location');
        }else {

            $userData = array();
//            $userData['total_levels'] = $this->level->get_total_levels();

            // Check if user is logged in
            if($this->facebook->is_authenticated()){

                // Get user facebook profile details
                $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

                //echo "auth success<br>",$userProfile['email'];

                $userData['name'] = $userProfile['first_name'] . " " . $userProfile['last_name'];
                $userData['email'] = $userProfile['email'];
                $userData['profile_picture'] = $userProfile['picture']['data']['url'];
                $userData['coins'] = 100;
                $userData['type'] = "REGULAR";
                
                //$history = {"Status : LOGIN", "email" : $userData['email']};
                
                // If already registered
                $userData = $this->user->user_registered($userData);
                //print_r($userData);
                if($userData['regn_status']) {//['email']

                    $user_history['user_id'] = $userData['id'];
                    $user_history['type'] = "LOGIN";
                    $user_history['date'] = date("Y-m-d H:i:s");
                    $user_history['current_level'] = "0";
                    $user_history['ip'] = $_SERVER['REMOTE_ADDR'];
                    
                    $this->history->log_user_activity($user_history);

                    $this->session->set_userdata($userData);
                    if ($this->session->userdata('status') == "TERMINATED") {
                        redirect('user_authentication/blocked', 'location');
                    }
                    if ($this->session->userdata('type') == "ADMIN") {
                        redirect('admin/index', 'location');
                    }
                    redirect('dashboard', 'location');

            } else {
                $user_history['user_id'] = $userData['id'];
                $user_history['type'] = "SIGNUP";
                $user_history['date'] = date("Y-m-d H:i:s");
                $user_history['current_level'] = "0";
                $user_history['ip'] = $_SERVER['REMOTE_ADDR'];
                
                $this->history->log_user_activity($user_history);
                
                $this->session->set_userdata($userData);
                redirect('profile', 'location');
            }
            
            }else{
                $user_history['type'] = "LOGIN_FAILED";
                $user_history['date'] = date("Y-m-d H:i:s");
                $user_history['ip'] = $_SERVER['REMOTE_ADDR'];

                $this->history->log_user_activity($user_history);
                echo "auth failed";
            }
        }
    }

    public function blocked() {
        $this->load->view('user/blocked');
    }
    
    public function logout() {
        $user_history['user_id'] = $this->session->userdata('id');
        $user_history['type'] = "LOGOUT";
        $user_history['date'] = date("Y-m-d H:i:s");
        $user_history['current_level'] = "0";
        $user_history['ip'] = $_SERVER['REMOTE_ADDR'];
        
        $this->history->log_user_activity($user_history);
        
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('profile_picture');

        // Check if session deleted
        // echo $this->session->userdata('email');

        // Redirect to login page
        redirect('/user_authentication');
    }

}
