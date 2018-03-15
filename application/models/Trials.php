<?php

class Trials extends CI_Model {

        public $trial_id;
        public $user_id;
        public $level_id;
        public $user_input;
        public $malicious;
        public $ip;

        public function __construct()
        {
                $this->load->database();
        }

        public function log_user_inputs($user_trials){
                //echo $this->user_id;
                //echo "log user activity";
                //print_r($user_history);
                $this->db->insert('trials',$user_trials);

        }
        
        public function get_accuracy(){
            $userData['id'] = $this->session->userdata('id');
            $userData['level'] = $this->session->userdata('level');
            
            //$this->db->select(count('*'));
            //$this->db->from('trials');
            $this->db->where("user_id", $userData['id']);
            //$query = $this->db->get();
            $result = $this->db->count_all_results('trials');

            //$result = $query->row_array();
            if ($result == 0) {
                return "NA";
            }
            $accuracy = ($userData['level'] / $result) * 100;
            return substr($accuracy,0,4)."%";
        }
        
        
        public function get_malicious_trials_of($data) {
            $this->db->select('*');
            $this->db->from('trials');
            $this->db->where("user_id", $data);
            $this->db->where("malicious", 1);
            
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }
        
        
        
}

