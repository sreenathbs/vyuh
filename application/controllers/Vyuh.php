<?php 
//defined('BASEPATH') OR exit('No direct script access allowed');
class Vyuh extends CI_Controller
{
    private $email;
    function __construct() {
        parent::__construct();
        $this->load->model('level');
        $this->load->model('history');
        $this->load->model('trials');
        $this->load->model('user');
        $this->load->helper('url');
        
//        $user_history['user_id'] = $this->session->userdata('id');
//        $user_history['current_level'] = $this->session->userdata('level');
//        $user_history['date'] = date("Y-m-d H:i:s");
//        $user_history['ip'] = $_SERVER['REMOTE_ADDR'];
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
    
    public function index() {
        //$this->load->view('user/login');
        redirect('user_authentication', 'location');
    }

    function dashboard() {
    	$this->load->view('user/dashboard');
    }
    
    function game(){
        if (total_levels > $this->session->userdata('level')) {

            $email = $this->session->userdata('email');
            $data = $this->level->get_next_question_for_user($email);
            
            if (!$data) {
                $this->load->view('user/header');
                $this->load->view('user/wait_for_question');
            } else {
    //        print_r($data);
            $user_history['user_id'] = $this->session->userdata('id');
            $user_history['current_level'] = $this->session->userdata('level');
            $user_history['date'] = date("Y-m-d H:i:s");
            $user_history['ip'] = $_SERVER['REMOTE_ADDR'];

            $user_history['type'] = "PLAY_GAME";
            $user_history['details'] = json_encode($data);

            $this->history->log_user_activity($user_history);

    //        $this->load->view('user/game');
            $this->load->view('user/header');
            $this->load->view('game', $data);
            }
        } else {
            $this->load->view('user/header');
            $this->load->view('game_finish');
        }
        
    }
    
    function answer(){
        if (isset($_POST['answer'])) {
            $input['answer'] = preg_replace("/[^a-zA-Z0-9]+/", "", $_POST['answer']);
            $input['level'] = $this->session->userdata('level')+1;
            $pm = $_POST['submit'];

            $user_trials['user_id'] = $this->session->userdata('id');
            $re = '/[$&+,:;=?@#|\'<>~`.-^*()%!]/';
            preg_match_all($re, $input['answer'], $matches, PREG_SET_ORDER, 0);

            if (sizeof($matches) == 0) {
                $user_trials['malicious'] = 0;
                //echo sizeof($matches);
            } else {
                $user_trials['malicious'] = 1;
                $sql = "UPDATE `user` SET malicious = malicious + 1 WHERE id = ".$user_trials['user_id'];
                $query = $this->db->query($sql);    
                //echo sizeof($matches);
            }

            //print_r($input);
            $data['percentage'] = $this->level->get_next_answer_for_user($input);
            //echo $data;

            $user_trials['level_no'] = $this->session->userdata('level');
            $user_trials['date'] = date("Y-m-d H:i:s");
            $user_trials['ip'] = $_SERVER['REMOTE_ADDR'];
            $user_trials['user_input'] = escapeshellarg($input['answer']);

            $this->trials->log_user_inputs($user_trials);

            $coins = $this->session->userdata('coins');

            if ($data['percentage'] == 100) {//$data->
                //echo "Right Answer!";
                //echo $data['percentage'];
                $level = $this->session->userdata('level');
                if (($level+1) % 5 == 0) {
                    echo "done";
                    $this->user->reward_coins();
                }
                $this->session->set_userdata('level',$level+1);
                $userData['level'] = $this->session->userdata('level');
                $userData['level_pass_time'] = date("Y-m-d H:i:s");
                $this->user->level_up($userData);
                $user_history['type'] = "LEVEL_UP";
                $user_history['current_level'] = $userData['level'];
                $this->history->log_user_activity($user_history);
                if ($pm == 0){
//                    echo $level;
                    redirect('vyuh/right_answer', 'location');
                }
                if ($pm == 1 && $coins-10 > -1) {
                    $this->user->update_coins();
                    $this->load->view('user/header');
                    $this->load->view('user/proximity', $data);
                }

            } else if ($data['percentage'] >= 0 && $pm == 1  && $coins-10 > -1) {
               // echo "Wrong Answer!";
                //echo "prox";
                $this->user->update_coins();
                $this->load->view('user/header');
                $this->load->view('user/proximity', $data);
            } else {
                redirect('vyuh/wrong_answer', 'location');
            }
            //$this->load->view('success', $data);
    //        $this->load->view('error', $data);
        }
        

    }
    
    function right_answer(){
        
        $this->load->view('user/header');
        $this->load->view('user/right_answer');
        
        header('Refresh:2; url= '. base_url().'/index.php/vyuh/game'); 
        
    }
    
    function wrong_answer(){
        
        $this->load->view('user/header');
        $this->load->view('user/wrong_answer');

        header('Refresh:2; url= '. base_url().'/index.php/vyuh/game'); 
        
    }
}

